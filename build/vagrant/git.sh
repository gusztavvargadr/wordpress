#!/bin/sh

# https://git-scm.com/download/linux
DEBIAN_FRONTEND=noninteractive

sudo add-apt-repository -y ppa:git-core/ppa
sudo apt-get -y update
sudo apt-get -y install git

git --version
