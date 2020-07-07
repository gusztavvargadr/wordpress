<?php
/*
Plugin Name: Gutenberg Block Hello
*/

function gutenberg_block_hello_enqueue() {
  wp_enqueue_script(
      'gutenberg-block-hello-script',
      plugins_url( 'index.js', __FILE__ ),
      array( 'wp-blocks' )
  );
}

add_action( 'enqueue_block_editor_assets', 'gutenberg_block_hello_enqueue' );

function gutenberg_block_hello_stylesheet() {
  wp_enqueue_style(
    'gutenberg-block-hello-style',
    plugins_url( 'style.css', __FILE__ )
  );
}

add_action( 'enqueue_block_assets', 'gutenberg_block_hello_stylesheet' );
