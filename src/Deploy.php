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
    protected $signature = 'deploy {environment} {no_npm?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Safely deploy your repository to a Laravel Forge server';

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
        $envString = 'forge-deploy.environments.'.$this->argument('environment');
        if($environment = config($envString)) {
            if(config('forge-deploy.base_directory')) {
                if(config($envString.'.deployment_webhook')) {
                    $branchString = implode('/', array_slice(explode('/', file_get_contents(config('forge-deploy.base_directory').'/.git/HEAD')), 2));
                    if(strpos($branchString, config($envString.'.git_branch')) !== false ) {
                        $output = shell_exec('git status');

                        if(strpos($output, 'modified') !== false) {
                            dd("Whoops! There are modified files in your project. Please stash changes or commit files before deploying.");
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
                                    config($envString.'.deployment_webhook')
                                );
                                $body = json_decode($response->getBody()->getContents());
                                $out = new \Symfony\Component\Console\Output\ConsoleOutput();

                                if($response->getStatusCode()==200) {
                                    $out->writeln("Deployment sent to Forge successfully! Note: This does not guarantee that the deployment itself was successful.");
                                } else {
                                    $out->writeln("Deployment Failure");
                                }
                            }
                        }
                    } else {
                        dd("Whoops! You are not on master branch but trying to deploy to production! Abort!"); 
                    }
                } else {
                    dd("Whoops! You do not have your Forge deploy hook configured in your env file or in the forge-deploy config file! You can get this webhook from your Forge dashboard.");
                }
            } else {
                dd("Whoops! You need to store your user directory in your env file or in the forge-deploy config file. Something like this for Mac users: FD_BASE_DIRECTORY=/Users/username/php/project");
            }
        } else {
            dd("Whoops! You must call a valid environment that has been declared in the forge-deploy config file. For example, 'php artisan deploy prod' where prod is defined in forge-deploy.php");
        }
    }
}
