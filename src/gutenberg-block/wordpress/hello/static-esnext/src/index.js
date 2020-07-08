import { registerBlockType } from '@wordpress/blocks';

registerBlockType('gutenberg-block-hello/static-esnext', {
  title: 'Gutenberg Block Hello Static ESNext',
  icon: 'smiley',
  category: 'common',
  edit: () => <div>Hello from Static ESNext (edit)!</div>,
  save: () => <div>Hello from Static ESNext (save)!</div>,
});
