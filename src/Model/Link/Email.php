<?php declare(strict_types=1);

namespace SilverStripe\Links\Model\Link;

use SilverStripe\Links\Model\Link;

/**
 * Represents a link to send an email
 *
 * @property string Email
 */
class Email extends Link
{
    private static $db = [
        'Email' => 'Varchar',
    ];

    public function getURL(): string
    {
        return 'mailto:' . $this->Email;
    }

    public function shouldOpenInNewWindow(): bool
    {
        return true;
    }
}
