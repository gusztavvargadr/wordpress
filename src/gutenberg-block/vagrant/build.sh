#!/bin/bash

cd ~/source/src/gutenberg-block/wordpress/

pushd ./hello/static-esnext/
npm run build
popd

pushd ./hello/editable-esnext/
npm run build
popd
