import { registerBlockType } from '@wordpress/blocks';

registerBlockType('gutenberg-block-hello/js', {
  title: 'Hello JS',
  icon: 'smiley',
  category: 'common',
  edit: () => <div>Hello from JS (edit)!</div>,
  save: () => <div>Hello from JS (save)!</div>,
});
