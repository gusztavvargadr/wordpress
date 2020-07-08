# WordPress

**Contents** [Overview] | [Getting started] | [Usage] | [Contributing] | [References]  

This repository contains [WordPress] [sample environments][Samples] and [experimental extensions][Extensions].

## Overview

For working in a comfortable, platform-agnostic way with proper isolation between different workloads, this repository supports working with [Vagrant], managing separate virtual machines for each environment with [VirtualBox], and connecting to them via [Visual Studio Code]. For ensuring that all the settings work as expected, they are automatically verified with [Azure DevOps].

[Overview]: #overview

## Getting started

Follow the steps below to have your host ready to work with this repository.

[Getting started]: #getting-started

### Prerequisites

First, make sure you have these dependencies resolved for your platform:

- Clone this repository.
- Install [Vagrant][Vagrant Install].
  - If you have not used Vagrant before, consider taking a look at the [getting started guide][Vagrant Getting Started].
- Install [VirtualBox][VirtualBox Install].
  - Vagrant will manage VirtualBox for you, but in case you want to dig deeper, take a look at the [introduction][VirtualBox Getting Started].
- Install [Visual Studio Code][Visual Studio Code Install].
  - See the [basics of usage][Visual Studio Code Getting Started] for more information on getting around Visual Studio Code.

[Vagrant Install]: https://www.vagrantup.com/docs/installation
[Vagrant Getting Started]: https://www.vagrantup.com/intro/getting-started
[VirtualBox Install]: https://www.virtualbox.org/manual/ch02.html
[VirtualBox Getting Started]: https://www.virtualbox.org/manual/ch01.html
[Visual Studio Code Install]: https://code.visualstudio.com/download
[Visual Studio Code Getting Started]: https://code.visualstudio.com/docs/introvideos/basics

### Setting up an environment

To verify the installations and create an environment with Vagrant, follow these steps:

- Open a terminal and navigate to the directory of your clone.
- Type `vagrant up samples.gutenberg-block` to create a sample environment, in this case, ready to develop a [Gutenberg Block]. Vagrant does the following in turn:
  - First, it [downloads a box][Vagrant Box] with Docker installed and configured on Ubuntu.
  - After that, using the downloaded box as a template, it will [create and boot a new virtual machine][Vagrant Create] using VirtualBox.
  - Next, it will [provision the virtual machine][Vagrant Provision] to be ready for WordPress development in general.
  - Finally, still within the virtual machine, it will [clone the repository][Vagrant Clone] for the environment, build the necessary components, and launch WordPress and all its dependencies.
- Connect directly to the environment and open a terminal by typing `vagrant ssh samples.gutenberg-block`. The environment's repository and the produced artifacts are available in the `~/source` folder in the virtual machine.

[Vagrant Box]: https://app.vagrantup.com/gusztavvargadr/boxes/docker-linux
[Vagrant Create]: ./Vagrantfile
[Vagrant Provision]: ./build/vagrant/
[Vagrant Clone]: ./samples/gutenberg-block/vagrant/

### Working with an environment

For a more advanced development experience, you can connect to this environment using Visual Studio Code.

- Type `code .` to open Visual Studio Code from the same terminal and directory that you used for the Vagrant commands.
- [Install the recommended extensions][Visual Studio Code Recommended Extensions], especially `Remote - SSH`.
- Using `Remote Explorer`, [open the SSH configuration file][Visual Studio Core Remote SSH Config File] under `.ssh/config`. Then [connect to the target][Visual Studio Core Remote SSH Connect Target] `samples.gutenberg-block` and open the folder `/home/vagrant/source`. If being asked for it, use the default password `vagrant` when connecting.
- Visual Studio Code automatically [forwards the necessary ports][Visual Studio Code Remote SSH Forward Port] from the virtual machine to the host to quickly test your work. Just navigate your browser to http://localhost:9999 to see WordPress running the sample within the virtual machine.

[Visual Studio Code Recommended Extensions]: https://code.visualstudio.com/docs/editor/extension-gallery#_workspace-recommended-extensions
[Visual Studio Core Remote SSH Config File]: https://code.visualstudio.com/blogs/2019/10/03/remote-ssh-tips-and-tricks#_ssh-configuration-file
[Visual Studio Core Remote SSH Connect Target]: https://code.visualstudio.com/docs/remote/ssh#_remember-hosts-and-advanced-settings
[Visual Studio Code Remote SSH Forward Port]: https://code.visualstudio.com/docs/remote/ssh#_forwarding-a-port-creating-ssh-tunnel

### Cleaning up

Once you're done exploring the sample, you can clean up your environment. Using the same terminal and directory that you've worked with so far:

- Type `vagrant halt samples.gutenberg-block` to shut down the virtual machine.
  - This will preserve the state of your work. Typing `vagrant up samples.gutenberg-block` again will get you back where you've left off.
- Type `vagrant destroy samples.gutenberg-block` to remove the virtual machine.
  - This will permanently delete the state, including any changes to the cloned repositories. Typing `vagrant up samples.gutenberg-block` again will get you a brand new environment.

In case you encounter any issues, take a look at and try to follow the process of the [latest automated build][Samples Gutenberg Block Build Log] in Azure DevOps. If you need any more help, have further questions or feedback, please feel free to [open an issue][Contributing].

## Usage

This section describes all the [samples] and [extensions] that this repository contains. Follow the [description above][Getting started], with the specifics mentioned at each environment below, to have them up and running.

[Usage]: #usage

### Samples

[Samples]: #samples

#### WordPress Core

[![WordPress Core Build Status]][WordPress Core Build Log]

This is a sample environment for WordPress Core development based on the [getting started description][WordPress Core Getting Started]. Please see the [handbook][WordPress Core Handbook] for more information.

- Vagrant Environment `vagrant up samples.core`
- Visual Studio Code Remote SSH Target `samples.core`
- Visual Studio Code Remote SSH Forwarded Port http://localhost:8889

[WordPress Core]: #wordpress-core

[WordPress Core Build Status]: https://dev.azure.com/gusztavvargadr/wordpress/_apis/build/status/samples.core?branchName=master
[WordPress Core Build Log]: https://dev.azure.com/gusztavvargadr/wordpress/_build/latest?definitionId=298&branchName=master
[WordPress Core Getting Started]: https://github.com/WordPress/wordpress-develop#getting-started
[WordPress Core Handbook]: https://make.wordpress.org/core/handbook/

#### Gutenberg Editor

[![Gutenberg Editor Build Status]][Gutenberg Editor Build Log]

This is a sample environment for Gutenberg Editor development based on the [getting started description][Gutenberg Editor Getting Started]. Please see the [handbook][Gutenberg Editor Handbook] for more information.

- Vagrant Environment `vagrant up samples.gutenberg-editor`
- Visual Studio Code Remote SSH Target `samples.gutenberg-editor`
- Visual Studio Code Remote SSH Forwarded Port http://localhost:8888

[Gutenberg Editor]: #gutenberg-editor

[Gutenberg Editor Build Status]: https://dev.azure.com/gusztavvargadr/wordpress/_apis/build/status/samples.gutenberg-editor?branchName=master
[Gutenberg Editor Build Log]: https://dev.azure.com/gusztavvargadr/wordpress/_build/latest?definitionId=299&branchName=master
[Gutenberg Editor Getting Started]: https://github.com/WordPress/gutenberg/blob/master/docs/contributors/getting-started.md
[Gutenberg Editor Handbook]: https://developer.wordpress.org/block-editor/developers/

#### Gutenberg Block

[![Samples Gutenberg Block Build Status]][Samples Gutenberg Block Build Log]

This is a sample environment for Gutenberg Block development based on the [getting started description][Gutenberg Block Getting Started]. Please see the [handbook][Gutenberg Block Handbook] for more information.

- Vagrant Environment `vagrant up samples.gutenberg-block`
- Visual Studio Code Remote SSH Target `samples.gutenberg-block`
- Visual Studio Code Remote SSH Forwarded Port http://localhost:9999

[Gutenberg Block]: #gutenberg-block

[Samples Gutenberg Block Build Status]: https://dev.azure.com/gusztavvargadr/wordpress/_apis/build/status/samples.gutenberg-block?branchName=master
[Samples Gutenberg Block Build Log]: https://dev.azure.com/gusztavvargadr/wordpress/_build/latest?definitionId=300&branchName=master
[Gutenberg Block Getting Started]: https://github.com/WordPress/gutenberg-examples#development
[Gutenberg Block Handbook]: https://developer.wordpress.org/block-editor/tutorials/block-tutorial/

### Extensions

[Extensions]: #extensions

#### Gutenberg Block

[![Extensions Gutenberg Block Build Status]][Extensions Gutenberg Block Build Log]

This environment contains custom extensions for Gutenberg Block experiments.

- Vagrant Environment `vagrant up src.gutenberg-block`
- Visual Studio Code Remote SSH Target `src.gutenberg-block`
- Visual Studio Code Remote SSH Forwarded Port http://localhost:40080

After launching the environment, walk through the initial WordPress installation and activate the following plugins to to use the blocks.

[Extensions Gutenberg Block Build Status]: https://dev.azure.com/gusztavvargadr/wordpress/_apis/build/status/src.gutenberg-block?branchName=master
[Extensions Gutenberg Block Build Log]: https://dev.azure.com/gusztavvargadr/wordpress/_build/latest?definitionId=301&branchName=master

##### Hello

The plugin `Gutenberg Block Hello` implements the following blocks:

- [Gutenberg Block Hello Quote Style], a style that can be applied to `Quote` blocks.
- [Gutenberg Block Hello Static ESNext], a block showing static text.
- [Gutenberg Block Hello Editable ESNext], a block showing editable text.

[Gutenberg Block Hello Quote Style]: ./src/gutenberg-block/wordpress/hello/quote-style/
[Gutenberg Block Hello Static ESNext]: ./src/gutenberg-block/wordpress/hello/static-esnext/
[Gutenberg Block Hello Editable ESNext]: ./src/gutenberg-block/wordpress/hello/editable-esnext/

## Contributing

If you have any questions or feedback in general, feel free to [open an issue][Issues].

[Pull requests] are also appreciated, but please [open an issue][Issues] first to discuss the details.

See what's going on over at [milestones] and [releases].

[Contributing]: #contributing

[Issues]: https://github.com/gusztavvargadr/wordpress/issues/
[Pull requests]: https://github.com/gusztavvargadr/wordpress/pulls/
[Milestones]: https://github.com/gusztavvargadr/wordpress/milestones/
[Releases]: https://github.com/gusztavvargadr/wordpress/releases/

## References

This repository could not exist without the following great tools and services:

- [WordPress]
- [Vagrant]
- [VirtualBox]
- [Visual Studio Code]
- [Azure DevOps]

[References]: #references

[WordPress]: https://www.wordpress.org/
[Vagrant]: https://www.vagrantup.com/
[VirtualBox]: https://www.virtualbox.org/
[Visual Studio Code]: https://code.visualstudio.com/
[Azure DevOps]: https://azure.microsoft.com/en-us/services/devops/
