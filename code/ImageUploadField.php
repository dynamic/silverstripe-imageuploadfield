<?php

/**
 * Class ImageUploadField
 */
class ImageUploadField extends UploadField
{
    /**
     * @var int
     */
    private static $max_upload = 1024000;

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
        $maxUpload = self::config()->max_upload;
        $maxPost = File::ini2bytes(ini_get('post_max_size'));
        $this->getValidator()->setAllowedMaxFileSize(min($maxUpload, $maxPost));

        // other image specific options
        $this->setAllowedMaxFileNumber(1);
        $this->setAllowedFileCategories('image');
    }
}
