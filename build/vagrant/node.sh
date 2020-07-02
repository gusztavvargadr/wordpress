#!/bin/sh

# https://github.com/nodejs/help/wiki/Installation
NODE_VERSION=v12.18.1
NODE_DISTRO=linux-x64

curl -sO https://nodejs.org/dist/$NODE_VERSION/node-$NODE_VERSION-$NODE_DISTRO.tar.xz
sudo mkdir -p /usr/local/lib/nodejs
sudo tar -xJf node-$NODE_VERSION-$NODE_DISTRO.tar.xz -C /usr/local/lib/nodejs
rm node-$NODE_VERSION-$NODE_DISTRO.tar.xz

echo export PATH=/usr/local/lib/nodejs/node-$NODE_VERSION-$NODE_DISTRO/bin:$PATH >> ~/.profile
. ~/.profile

node --version
npm version
