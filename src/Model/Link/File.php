<?php declare(strict_types=1);

namespace SilverStripe\Links\Model\Link;

use SilverStripe\Assets\File as SSFile;
use SilverStripe\Links\Model\Link;

if (!class_exists(SSFile::class)) {
    return;
}

/**
 * Represents a link to a file that has been uploaded using the `silverstripe/assets` module
 *
 * @property SSFile File
 */
class File extends Link
{
    private static $has_one = [
        'File' => SSFile::class,
    ];

    public function getURL(): string
    {
        if (!$this->File) {
            return parent::getURL();
        }

        // Don't give access by default as that should not be expected
        return $this->File->getURL(false) ?? parent::getURL();
    }
}
