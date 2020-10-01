[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![License][license-shield]][license-url]
<!-- PROJECT LOGO -->
<br />
<p align="center">
	<a href="https://dandillon.dev">
		<img src="images/logo.jpg" alt="Logo" width="100" height="100">
	</a>
	<h3 align="center">Forge Deploy</h3>
	<p align="center">
		A safer, more robust way to deploy your code to Laravel Forge
	</p>
</p>
<p align="center"><a href="https://dandillon.dev" target="_blank">DanDillon.dev</a></p>

<!-- TABLE OF CONTENTS -->
## Table of Contents
* [About the Project](#about-the-project)
* [Getting Started](#getting-started)
* [Prerequisites](#prerequisites)
* [Installation](#installation)
* [Usage](#usage)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)

<!-- ABOUT THE PROJECT -->
## About The Project
Forge Deploy is a lightweight package meant to help you make safe deployments to multiple Forge environments. It is not meant as a replacement for a fully featured CI, but rather as a simple tool to run some sanity checks and basic npm operations before pushing your code live. For example, this package will check to make sure you are pushing the correct branch to the correct origin, run the appropriate NPM command for that environment, check for any uncommitted changes, and even verify that you are in the proper repository before allowing you to push the code.

<!-- GETTING STARTED -->
## Getting Started
To get up and running, follow these simple steps:

### Prerequisites
* This package works with Laravel 5+ and PHP 7+, and utilizes package auto-discovery.

* This package utilizes the local file system to read your git config file, so you can only use this in a git-controlled project. It is currently configured to work on Linux style systems, such as Mac. Windows support is coming soon.

### Installation
1. Add the package to your project using composer

```sh
composer require dylan7778/forge-deploy --dev
```
2. Publish config file

```sh
php artisan vendor:publish
```

<!-- USAGE EXAMPLES -->
## Usage
To use the package, you will first need to set up some basic paramters in the published config file. We recommend you store these paramaters in your ENV file, but you can store them directly in the config file if you wish. You will have the option to set up multiple environments, each stored as an array of paramters for that specific deployment target.

Global Parameters:
* 'base_directory': The absolute path to your project on your local filesystem (e.g. /Users/user/php/project-name)

Environment Specific Parameters:
* 'npm_build_type': production/dev - set this appropriately depending on the environment
* 'deployment_webhook': Your deployment webhook provided in the Laravel Forge dashboard
* 'git_branch': The branch you wish to deploy for this environment (e.g. 'master','dev' or 'staging')

An example config featuring a production and staging environment is shown below:

	'base_directory' => '/Users/user/php/project-name',
	'environments' => [
        'production' => [
            'npm_build_type' => 'production',
            'deployment_webhook' => 'https://forge.laravel.com/servers/1234567/sites/1234567/deploy/...',
            'git_branch' => 'master',
        ],
        'staging' => [
            'npm_build_type' => 'dev',
            'deployment_webhook' => 'https://forge.laravel.com/servers/4567891/sites/4567891/deploy/...',
            'git_branch' => 'staging',
        ],
    ]

Once you have finished the basic setup, you can now run your deployment code directly from your root folder. The command is:

```sh
php artisan deploy {environment} {run_npm?}
```

There are two flags in this command. The first is the environment name, and the other is an optional paramter which tells the script whether to execute the <code>npm run</code> build code before deploying. In some cases, like when modifying only backend PHP files, you may not want to have to wait for the <code>npm run production</code> command when you deploy, so you can manually override by adding this option. By default, the npm commands will always be run if you do not specify the 'no_npm' flag. Here are some examples:

* Deploy to production environment and include the npm build command:
```sh
php artisan deploy production
```

* Deploy to staging environment and do not include the npm build command:
```sh
php artisan deploy staging no_npm
```

<!-- CONTRIBUTING -->
## Contributing
Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.
1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->
## License
Distributed under the MIT License. See `LICENSE.md` for more information.

<!-- CONTACT -->
## Contact
Dan Dillon - [@dandillondev](https://twitter.com/dandillondev) - dan@dandillon.dev

Project Link: [https://github.com/dylan7778/forge-deploy](https://github.com/dylan7778/forge-deploy)

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/dylan7778/forge-deploy.svg?style=flat-square
[contributors-url]: https://github.com/dylan7778/forge-deploy/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/dylan7778/forge-deploy.svg?style=flat-square
[forks-url]: https://github.com/dylan7778/forge-deploy/network/members
[stars-shield]: https://img.shields.io/github/stars/dylan7778/forge-deploy.svg?style=flat-square
[stars-url]: https://github.com/dylan7778/forge-deploy/stargazers
[issues-shield]: https://img.shields.io/github/issues/dylan7778/forge-deploy.svg?style=flat-square
[issues-url]: https://github.com/dylan7778/forge-deploy/issues
[license-shield]: https://img.shields.io/github/license/dylan7778/forge-deploy.svg?style=flat-square
[license-url]: https://github.com/dylan7778/forge-deploy/blob/master/LICENSE.md
[product-screenshot]: images/screenshot.png