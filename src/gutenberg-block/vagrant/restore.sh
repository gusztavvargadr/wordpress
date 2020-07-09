#!/bin/bash

sudo npm install --global @wordpress/scripts@9.0

cd ~/source/src/gutenberg-block/wordpress/

pushd ./hello/static-esnext/
npm install --production
popd

pushd ./hello/editable-esnext/
npm install --production
popd

pushd ./gravatar/image/
npm install --production
popd
