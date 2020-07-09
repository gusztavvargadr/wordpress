import { registerBlockType } from '@wordpress/blocks';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, PanelRow, TextControl, RangeControl } from '@wordpress/components';
import md5 from 'md5';

registerBlockType('gutenberg-block-gravatar/image', {
  title: 'Gutenberg Block Gravatar Image',
  icon: 'universal-access-alt',
  category: 'common',
  attributes: {
    email: {
      type: 'string',
      default: 'mail@gusztavvargadr.me'
    },
    size: {
      type: 'number',
      default: 80,
    }
  },
  example: {
    attributes: {
      email: 'mail@gusztavvargadr.me',
      number: 80,
    },
  },
  edit: (props) => {
    const { attributes: { email, size }, setAttributes } = props;

    const onChangeEmail = (newEmail) => {
      setAttributes({ email: newEmail });
    };

    const onChangeSize = (newSize) => {
      setAttributes({ size: newSize });
    };

    const imageUri = getImageUri(email, size);
    const profileUri = getProfileUri(email);

    return (
      <div>
        <InspectorControls>
          <PanelBody title="Gravatar settings">
            <PanelRow>
              <TextControl
                label='Email address'
                help='An email address registered with Gravatar'
                value={email}
                onChange={onChangeEmail}
              />
            </PanelRow>
            <PanelRow>
              <RangeControl
                label='Size'
                help='The size of the image'
                value={size}
                onChange={onChangeSize}
                min={5}
                max={1000}
                step={5}
                withInputField={false}
              />
            </PanelRow>
          </PanelBody>
        </InspectorControls>

        <div>
          <img src={imageUri} />
        </div>

        <div>
          {size}
        </div>

        <div>
          <a href={imageUri}>Image</a>
        </div>

        <div>
          <a href={profileUri}>Profile</a>
        </div>
      </div >
    );
  },
  save: (props) => {
    const imageUri = getImageUri(props.attributes.email, props.attributes.size);
    const profileUri = getProfileUri(props.attributes.email);

    return (
      <div>
        <a href={profileUri}>
          <img src={imageUri} />
        </a>
      </div>
    );
  },
});

const getImageUri = (email, size) => 'https://www.gravatar.com/avatar/' + getEmailHash(email) + '?s=' + size;
const getProfileUri = (email) => 'https://www.gravatar.com/' + getEmailHash(email);
const getEmailHash = (email) => md5(email.trim().toLowerCase());
