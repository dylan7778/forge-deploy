[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]
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
This package works with Laravel 5+ and PHP 7+, and utilizes package auto-discovery.

This project utilizes the local file system to load your git config file, and is configured to work on Linux style systems, such as Mac. Windows support coming soon.

This package requires that your project is stored locally in a folder with the *same name* as its github repository. For example, if your github repo is called 'best-repo', your local project will need to be stored in a root folder with the same name (e.g. /Users/user/php/best-repo).

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
Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.
_For more examples, please refer to the [Documentation](https://example.com)_

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
Distributed under the MIT License. See `LICENSE` for more information.

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
[license-url]: https://github.com/dylan7778/forge-deploy/LICENSE.md
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=flat-square&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/dylan7778
[product-screenshot]: images/screenshot.png