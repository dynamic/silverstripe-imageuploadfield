<?php

namespace Dynamic\ImageUpload;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Core\Convert;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\ORM\SS_List;

/**
 * Class ImageUploadField
 * @package Dynamic\SilverStripe\ImageUpload
 */
class ImageUploadField extends UploadField
{
    /**
     * @var int
     */
    private static $max_upload = 1024000;

    /**
     * @var string
     */
    private static $category = 'image/supported';

    /**
     * @var array
     */
    private static $allowed_categories = [
        'image/supported',
        'image',
    ];

    /**
     * ImageUploadField constructor.
     * @param string $name
     * @param null $title
     * @param SS_List|null $items
     */
    public function __construct($name, $title = null, SS_List $items = null)
    {
        parent::__construct($name, $title);

        // set the max upload size
        $maxUpload = $this->config()->get('max_upload');
        $maxPost = Convert::memstring2bytes(ini_get('post_max_size'));
        $this->getValidator()->setAllowedMaxFileSize(min($maxUpload, $maxPost));

        // other image specific options
        $this->setAllowedMaxFileNumber(1);

        $category = static::config()->get('category');

        if (!in_array($category, $this->config()->get('allowed_categories'))) {
            $msg = "{$category} not listed in ImageUploadField::allowed_categories. Defaulting to \"image/supported\"";
            user_error($msg);

            $category = 'image/supported';
        }

        $this->setAllowedFileCategories($category);
    }
}
