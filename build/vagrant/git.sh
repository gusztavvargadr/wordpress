#!/bin/sh

# https://git-scm.com/download/linux
DEBIAN_FRONTEND=noninteractive

sudo add-apt-repository -y ppa:git-core/ppa
sudo apt-get -qq update
sudo apt-get -qq install git

git --version
