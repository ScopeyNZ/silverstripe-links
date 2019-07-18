/* global ss */
import jQuery from 'jquery';
import React from 'react';
import ReactDOM from 'react-dom';
import { loadComponent } from 'lib/Injector';

jQuery.entwine('ss', ($) => {
  $('.js-injector-boot [data-field-type="link-field"]').entwine({
    /**
     * Renders the equivalent React component for the BlockLinkField
     */
    onmatch() {
      const cmsContent = this.closest('.cms-content').attr('id');
      const context = (cmsContent)
        ? { context: cmsContent }
        : {};

      const LinkFieldComponent = loadComponent('LinkField', context);
      const schemaData = this.data('schema');
      const stateData = this.data('state');

      const props = {
        ...stateData,
        ...schemaData.data,
        // Don't allow React to re-render the form label when used in Entwine context
        hideLabels: true,
      };

      ReactDOM.render(
        <LinkFieldComponent {...props} />,
        this[0]
      );
    },

    /**
     * Remove the component when unmatching
     */
    onunmatch() {
      ReactDOM.unmountComponentAtNode(this[0]);
    },
  });
});
