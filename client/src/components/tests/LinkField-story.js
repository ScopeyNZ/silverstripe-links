import React from 'react';
import { storiesOf } from '@storybook/react';
import LinkField from '../LinkField';

storiesOf('Links/LinkField', module)
  .add('Simple Example', () => (
    <LinkField />
  ))
;
