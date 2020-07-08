<?php

function gutenberg_block_hello_quote_style_enqueue_script() {
  wp_enqueue_script(
      'gutenberg-block-hello-quote-style',
      plugins_url( 'index.js', __FILE__ ),
      array( 'wp-blocks' )
  );
}

function gutenberg_block_hello_quote_style_enqueue_style() {
  wp_enqueue_style(
    'gutenberg-block-hello-quote-style',
    plugins_url( 'style.css', __FILE__ )
  );
}

add_action( 'enqueue_block_editor_assets', 'gutenberg_block_hello_quote_style_enqueue_script' );
add_action( 'enqueue_block_assets', 'gutenberg_block_hello_quote_style_enqueue_style' );
