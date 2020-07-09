<?php

function gutenberg_block_hello_editable_esnext_register_block() {
  $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

  wp_register_script(
      'gutenberg-block-hello-editable-esnext-editor',
      plugins_url( 'build/index.js', __FILE__ ),
      $asset_file['dependencies'],
      $asset_file['version']
  );

  wp_register_style(
      'gutenberg-block-hello-editable-esnext-editor',
      plugins_url( 'editor.css', __FILE__ ),
      array( 'wp-edit-blocks' ),
      filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
  );

  wp_register_style(
      'gutenberg-block-hello-editable-esnext',
      plugins_url( 'style.css', __FILE__ ),
      array( ),
      filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
  );

  register_block_type( 'gutenberg-block-hello/editable-esnext', array(
      'style' => 'gutenberg-block-hello-editable-esnext',
      'editor_style' => 'gutenberg-block-hello-editable-esnext-editor',
      'editor_script' => 'gutenberg-block-hello-editable-esnext-editor',
  ) );
}

add_action( 'init', 'gutenberg_block_hello_editable_esnext_register_block' );
