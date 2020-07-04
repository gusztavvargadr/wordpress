# WordPress

**Samples** 
[WordPress Core] [![Build Status](https://dev.azure.com/gusztavvargadr/wordpress/_apis/build/status/samples.core?branchName=master)](https://dev.azure.com/gusztavvargadr/wordpress/_build/latest?definitionId=298&branchName=master) |
[Gutenberg Editor] [![Build Status](https://dev.azure.com/gusztavvargadr/wordpress/_apis/build/status/samples.core?branchName=master)](https://dev.azure.com/gusztavvargadr/wordpress/_build/latest?definitionId=299&branchName=master) |
[Gutenberg Block] [![Build Status](https://dev.azure.com/gusztavvargadr/wordpress/_apis/build/status/samples.core?branchName=master)](https://dev.azure.com/gusztavvargadr/wordpress/_build/latest?definitionId=300&branchName=master)  

This repository contains [WordPress] [sample environments][Samples] and [experimental extensions][Extensions].

## Overview

For working in a comfortable, platform-agnostic way with proper isolation between different workloads, this repository supports working with [Vagrant], managing separate virtual machines for each environment with [VirtualBox], and connecting to them via [Visual Studio Code]. For ensuring that all the settings work as expected, they are automatically verified with [Azure DevOps].

## Getting started

Follow the steps below to have your host ready to work with this repository.

### Prerequisites

First, make sure you have these dependencies resolved for your platform:

- Clone this repository.
- Install [Vagrant][Vagrant Install].
  - If you have not used Vagrant before, consider taking a look at the [getting started guide][Vagrant Getting Started].
- Install [VirtualBox][VirtualBox Install].
  - Vagrant will manage VirtualBox for you, but in case you want to dig deeper, take a look at the [introduction][VirtualBox Getting Started].
- Install [Visual Studio Code][Visual Studio Code Install].
  - See the [basics of usage][Visual Studio Code Getting Started] for more information on getting around Visual Studio Code.

### Setting up an environment

To verify the installations and create an environment with Vagrant, follow these steps:

- Open a terminal and navigate to the directory of your clone.
- Type `vagrant up gutenberg-block` to create a sample environment, in this case, ready to develop [Gutenberg Blocks][Samples]. Vagrant does the following in turn:
  - First, it downloads a box with Docker installed and configured on Ubuntu.
  - After that, using the downloaded box as a template, it will create and boot a new virtual machine using VirtualBox.
  - Next, it will provision the virtual machine to be ready for WordPress development in general.
  - Finally, still within the virtual machine, it will clone the repository for the environment, build the necessary components, and launch WordPress and all its dependencies.
- Connect directly to the environment and open a terminal by typing `vagrant ssh gutenberg-block`. The environment's repository and the produced artifacts are available in the `~/source` folder in the virtual machine.

### Working with an environment

For a more advanced development experience, you can connect to this environment using Visual Studio Code.

- Type `code .` to open Visual Studio Code from the same terminal and directory that you used for the Vagrant commands.
- Install the recommended extensions, especially `Remote - SSH`.
- Using `Remote Explorer`, connect to the `gutenberg-block` target and open the folder `/home/vagrant/source`. If being asked for it, use the default password `vagrant` when connecting.
- Visual Studio Code automatically forwards the necessary ports from the virtual machine to the host to quickly test your work. Just navigate your browser to http://localhost:9999 to see WordPress running the sample within the virtual machine.

### Cleaning up

Once you're done exploring the sample, you can clean up your environment. Using the same terminal and directory that you've worked with so far:

- Type `vagrant halt gutenberg-block` to shut down the virtual machine.
  - This will preserve the state of your work. Typing `vagrant up gutenberg-block` again will get you back where you've left off.
- Type `vagrant destroy gutenberg-block` to remove the virtual machine.
  - This will permanently delete the state, including any changes to the cloned repositories. Typing `vagrant up gutenberg-block` again will get you a brand new environment.

In case you encounter any issues, take a look at and try to follow the process of the [latest automated build](https://dev.azure.com/gusztavvargadr/wordpress/_build/latest?definitionId=300&branchName=master) in Azure DevOps. If you need any more help, have further questions or feedback, please feel free to [open an issue][Contributing].

[Vagrant Install]: https://www.vagrantup.com/docs/installation
[Vagrant Getting Started]: https://www.vagrantup.com/intro/getting-started
[VirtualBox Install]: https://www.virtualbox.org/manual/ch02.html
[VirtualBox Getting Started]: https://www.virtualbox.org/manual/ch01.html
[Visual Studio Code Install]: https://code.visualstudio.com/download
[Visual Studio Code Getting Started]: https://code.visualstudio.com/docs/introvideos/basics

## Usage

This section quickly described all the samples and extensions that this repository contains.

### Samples

Please see the [samples](./samples/) directory for more details.

[Samples]: #samples

#### WordPress Core

[WordPress Core]: #wordpress-core

#### Gutenberg Editor

[Gutenberg Editor]: #gutenberg-editor

#### Gutenberg Block

[Gutenberg Block]: #gutenberg-block

### Extensions

[Extensions]: #extensions

## Contributing

[Contributing]: #contributing

## References

This repository could not exist without the following great tools and services:

- [WordPress]
- [Vagrant]
- [VirtualBox]
- [Visual Studio Code]
- [Azure DevOps]

[WordPress]: https://www.wordpress.org/
[Vagrant]: https://www.vagrantup.com/
[VirtualBox]: https://www.virtualbox.org/
[Visual Studio Code]: https://code.visualstudio.com/
[Azure DevOps]: https://azure.microsoft.com/en-us/services/devops/
