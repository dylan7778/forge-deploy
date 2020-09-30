<?php

namespace Dylan7778\ForgeDeploy;

use Illuminate\Console\Command;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy {no_npm?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(env('USER_DIRECTORY')) {
            if(env('FORGE_DEPLOY_HOOK')) {
                $branchString = implode('/', array_slice(explode('/', file_get_contents(env('USER_DIRECTORY').'/.git/HEAD')), 2));
                if(strpos($branchString, 'master') !== false ) {

                    $output = shell_exec('git remote -v');
                    $repoName = substr($output, strpos($output, "/") + 1);
                    $repoName = substr($repoName, 0, strpos($repoName, ".git"));

                    $directoryName = explode("/", env('USER_DIRECTORY'));
                    $directoryName = end($directoryName);

                    if($directoryName != $repoName) {
                        dd("Your repo name doesn't match your user directory! Make sure you are in the correct folder!");
                    } else {
                        $output = shell_exec('git status');

                        if(strpos($output, 'modified') !== false) {
                            dd("There are modified files in your directory. Please stash changes or commit files before deploying.");
                        } else {
                            if($this->argument('no_npm')) {
                                $output = "";
                            } else {
                                $output = shell_exec('npm run production');
                            }
                            
                            if(strpos($output, 'ERR') !== false) {
                                dd("There was an error during NPM build: " .$output);
                            } else {
                                system('git add -A');

                                system('git commit -m "Auto Commit for deployment"');

                                system('git push origin master');

                                $client = new \GuzzleHttp\Client();
                                $response = $client->get(
                                    env('FORGE_DEPLOY_HOOK')
                                );
                                $body = json_decode($response->getBody()->getContents());
                                $out = new \Symfony\Component\Console\Output\ConsoleOutput();

                                if($response->getStatusCode()==200) {
                                    $out->writeln("Deployment Success!");
                                } else {
                                    $out->writeln("Deployment Failure");
                                }
                            }
                        }
                    }
                } else {
                    dd("Whoops! You are not on master branch but trying to deploy to production! Abort! Abort!"); 
                }
            } else {
                dd("Whoops! You do not have your Forge Deploy Hook in your env file!");
            }
        } else {
            dd("Whoops! You need to store your user directory in your env file. Something like this for Mac users: USER_DIRECTORY=/Users/username/php/project");
        }
    }
}
