<?php declare(strict_types=1);

namespace SilverStripe\Links\Model\Link;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Links\Model\Link;

/**
 * Represents a link to a page from the `silverstripe/cms` module
 *
 * @property SiteTree Page
 * @property string Anchor
 */
class Page extends Link
{
    private static $has_one = [
        'Page' => SiteTree::class
    ];

    private static $db = [
        'Anchor' => 'Varchar',
    ];

    public function getURL(): string
    {
        if (!$this->Page) {
            return parent::getURL();
        }

        $url = $this->Page->getAbsoluteLiveLink(false);

        if ($this->Anchor) {
            $url .= "#{$this->Anchor}";
        }

        return $url;
    }
}
