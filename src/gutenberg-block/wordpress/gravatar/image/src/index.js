import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';

registerBlockType('gutenberg-block-gravatar/image', {
  title: 'Gutenberg Block Gravatar Image',
  icon: 'universal-access-alt',
  category: 'common',
  attributes: {
    content: {
      type: 'array',
      source: 'children',
      selector: 'p',
    },
  },
  example: {
    attributes: {
      content: 'Gutenberg Block Gravatar Image'
    },
  },
  edit: (props) => {
    const { attributes: { content }, setAttributes, className } = props;
    const onChangeContent = (newContent) => {
      setAttributes({ content: newContent });
    };
    return (
      <RichText
        tagName="p"
        className={className}
        onChange={onChangeContent}
        value={content}
      />
    );
  },
  save: (props) => {
    return <RichText.Content tagName="p" value={props.attributes.content} />;
  },
});
