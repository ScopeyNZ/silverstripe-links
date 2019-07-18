import Injector from 'lib/Injector';
import LinkField from 'components/LinkField';

export default () => {
  Injector.component.registerMany({
    LinkField,
  });
};
