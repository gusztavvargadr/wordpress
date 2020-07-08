<?php

function gutenberg_block_hello_static_esnext_enqueue_script() {
  $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php' );

  wp_enqueue_script(
      'gutenberg-block-hello-static-esnext',
      plugins_url( 'build/index.js', __FILE__ ),
      $asset_file['dependencies'],
      $asset_file['version']
  );
}

add_action( 'enqueue_block_editor_assets', 'gutenberg_block_hello_static_esnext_enqueue_script' );
