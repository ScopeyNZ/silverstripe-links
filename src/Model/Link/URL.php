<?php declare(strict_types=1);

namespace SilverStripe\Links\Model\Link;

use SilverStripe\Links\Model\Link;

/**
 * Represents a link to an arbitrary URL
 *
 * @property string URL
 */
class URL extends Link
{
    private static $db = [
        'URL' => 'Varchar',
    ];

//    public function getURL()
//    {
//        return $this->getField('URL');
//    }
}
