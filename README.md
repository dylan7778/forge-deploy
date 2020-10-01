[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![License][license-shield]][license-url]
<!-- PROJECT LOGO -->
<br />
<p align="center">
	<!-- <a href="https://github.com/dylan7778/forge-deploy">
		<img src="images/logo.png" alt="Logo" width="80" height="80">
	</a> -->
	<h3 align="center">Forge Deploy</h3>
	<p align="center">
		A safer, more robust way to deploy your code to Laravel Forge
		<br />
		<a href="https://github.com/dylan7778/forge-deploy"><strong>Explore the docs »</strong></a>
		<br />
		<br />
		<a href="https://github.com/dylan7778/forge-deploy">View Demo</a>
		·
		<a href="https://github.com/dylan7778/forge-deploy/issues">Report Bug</a>
		·
		<a href="https://github.com/dylan7778/forge-deploy/issues">Request Feature</a>
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
* [Roadmap](#roadmap)
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

* **Important**: This package requires that your project is stored locally in a folder with the *same name* as its github repository. For example, if your github repo is called 'best-repo', your local project will need to be stored in a root folder with the same name (e.g. /Users/user/php/best-repo).

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
* 'environment_type': production/staging, etc.
* 'npm_build_type': production/dev - set this appropriately depending on the environment
* 'deployment_webhook': Your deployment webhook provided in the Laravel Forge dashboard

An example config featuring a production and staging environment is shown below:

	'base_directory' => '/Users/user/php/project-name',
	'environments' => [
        'prod' => [
            'environment_type' => 'production',
            'npm_build_type' => 'production',
            'deployment_webhook' => 'https://forge.laravel.com/servers/1234567/sites/1234567/deploy/...'
        ],
        'staging' => [
            'environment_type' => 'staging',
            'npm_build_type' => 'dev',
            'deployment_webhook' => 'https://forge.laravel.com/servers/4567891/sites/4567891/deploy/...'
        ],

Once you have finished the basic setup, you can now run your deployment code directly from your root folder. The command is:

```sh
php artisan deploy {environment} {run_npm?}
```

There are two flags in this command. The first is the environment name, and the other is a boolean which tells the script whether to execute the <code>npm run</code> code before deploying. In some cases, after modifying only backend PHP files, you won't want to wait for the <code>npm run production</code> command when you deploy, so you can manually override by setting this to false. By omitting this flag or setting it to true, the npm commands will be run. Here are some examples:

* Deploy to production environment and include the npm run command:
```sh
php artisan deploy prod
```

* Deploy to staging environment and do not include the npm run command:
```sh
php artisan deploy staging false
```

<!-- ROADMAP -->
## Roadmap
See the [open issues](https://github.com/dylan7778/forge-deploy/issues) for a list of proposed features (and known issues).

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