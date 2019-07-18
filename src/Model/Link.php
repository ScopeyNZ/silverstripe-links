<?php declare(strict_types=1);

namespace SilverStripe\Links\Model;

use SilverStripe\Core\Config\Configurable;
use SilverStripe\ORM\DataObject;

/**
 * Represents a stored link. This class should be considered abstract. Links should extend this for storing specific
 * detail for their type. See the SilverStripe\Links\Model\Link namespace
 *
 * @property string Text
 * @property string Title
 * @property int Flags
 */
class Link extends DataObject
{
    use Configurable;

    /**
     * Indicates that the link should open in a new tab/window
     */
    const FLAG_TARGET_BLANK = 1;

    /**
     * Indicates that the link should be considered "external" - This could influence how the link is displayed
     */
    const FLAG_EXTERNAL = 2;

    private static $db = [
        // The displayed text for the link
        'Text' => 'Varchar',
        // The title to be added to the text (as a title attribute)
        'Title' => 'Varchar',
        // Bitwise flags for this link. See FLAG_* constants
        'Flags' => 'Int',
    ];

    /**
     * Defines the default "null" link if a link has been misconfigured
     *
     * @config
     * @var string
     */
    private static $null_link = '#';

    /**
     * Get a URL for this link
     *
     * @return string
     */
    public function getURL(): string
    {
        return $this->config()->get('null_link');
    }

    /**
     * Indicates that this URL should open in a new window
     *
     * @return bool
     */
    public function shouldOpenInNewWindow(): bool
    {
        return $this->Flags & self::FLAG_TARGET_BLANK > 0;
    }

    /**
     * Indicates that the link is an "external" link
     *
     * @return bool
     */
    public function isExternal()
    {
        return $this->Flags & self::FLAG_EXTERNAL > 0;
    }
}
