<?php

namespace Dynamic\ImageUpload\Tests\Field;

use Dynamic\ImageUpload\ImageUploadField;
use SilverStripe\Dev\TestOnly;

/**
 * Class CustomImageUploadField
 * @package Dynamic\ImageUpload\Tests\Field
 */
class CustomImageUploadField extends ImageUploadField implements TestOnly
{
    /**
     * @var int
     */
    private static $max_upload = 512000;
}
