<?php

function gutenberg_block_gravatar_image_register_block() {
  $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

  wp_register_script(
      'gutenberg-block-gravatar-image-editor',
      plugins_url( 'build/index.js', __FILE__ ),
      $asset_file['dependencies'],
      $asset_file['version']
  );

  register_block_type( 'gutenberg-block-gravatar/image', array(
      'editor_script' => 'gutenberg-block-gravatar-image-editor',
  ) );
}

add_action( 'init', 'gutenberg_block_gravatar_image_register_block' );
