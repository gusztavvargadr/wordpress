<?php
/*
Plugin Name: Gutenberg Block Hello
*/

function gutenberg_block_hello_enqueue_script() {
  wp_enqueue_script(
      'gutenberg-block-hello-quote',
      plugins_url( 'quote/index.js', __FILE__ ),
      array( 'wp-blocks' )
  );

  $js_asset_file = include( plugin_dir_path( __FILE__ ) . 'js/build/index.asset.php');

  wp_enqueue_script(
      'gutenberg-block-hello-js',
      plugins_url( 'js/build/index.js', __FILE__ ),
      $js_asset_file['dependencies'],
      $js_asset_file['version']
  );
}

function gutenberg_block_hello_enqueue_style() {
  wp_enqueue_style(
    'gutenberg-block-hello-quote',
    plugins_url( 'quote/style.css', __FILE__ )
  );
}

add_action( 'enqueue_block_editor_assets', 'gutenberg_block_hello_enqueue_script' );
add_action( 'enqueue_block_assets', 'gutenberg_block_hello_enqueue_style' );
