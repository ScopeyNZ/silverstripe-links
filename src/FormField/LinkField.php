<?php declare(strict_types=1);

namespace SilverStripe\Links\FormField;

use InvalidArgumentException;
use SilverStripe\Forms\FormField;
use SilverStripe\Links\Model\Link;

class LinkField extends FormField
{
    protected $schemaDataType = FormField::SCHEMA_DATA_TYPE_CUSTOM;

    protected $schemaComponent = 'LinkField';

    public function setValue($value, $data = null)
    {
        if (!$value instanceof Link) {
            throw new InvalidArgumentException(sprintf(
                '%s can only accept %s as a value',
                __CLASS__,
                Link::class
            ));
        }

        return parent::setValue($value, $data);
    }

    public function getSchemaDataDefaults()
    {
        $data = parent::getSchemaDataDefaults();

        return $data;
    }

    public function getSchemaStateDefaults()
    {
        $state = parent::getSchemaStateDefaults();

        return $state;
    }
}
