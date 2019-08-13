<?php

namespace Dynamic\ImageUpload\Tests;

use Dynamic\ImageUpload\ImageUploadField;
use Dynamic\ImageUpload\Tests\Field\CustomImageUploadField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Convert;
use SilverStripe\Dev\SapphireTest;

/**
 * Class ImageUploadFieldTest
 */
class ImageUploadFieldTest extends SapphireTest
{

    /**
     *
     */
    public function test__construct()
    {
        $field = ImageUploadField::create('Image');
        $this->assertInstanceOf(UploadField::class, $field);
    }

    /**
     *
     */
    public function testMaxUpload()
    {
        $this->assertEquals(ImageUploadField::config()->get('ImageUploadField', 'max_upload'), 1024000);
        Config::modify()->set(ImageUploadField::class, 'max_upload', 512000);
        $this->assertEquals(ImageUploadField::config()->get('ImageUploadField', 'max_upload'), 512000);
    }

    /**
     *
     */
    public function testINIUploadLimitCheck()
    {
        $iniMax = Convert::memstring2bytes(ini_get('post_max_size'));
        $over = $iniMax * 2;
        $under = $iniMax / 2;

        Config::modify()->set(ImageUploadField::class, 'max_upload', $over);
        $imageField = ImageUploadField::create('testField');
        $this->assertEquals($imageField->getValidator()->getAllowedMaxFileSize(), $iniMax);

        Config::modify()->set(ImageUploadField::class, 'max_upload', $under);
        $imageField2 = ImageUploadField::create('testField2');
        $this->assertEquals($imageField2->getValidator()->getAllowedMaxFileSize(), $under);
    }

    /**
     *
     */
    public function testExtendedField()
    {

        $imageField = CustomImageUploadField::create('testImageField');
        $this->assertEquals($imageField->getValidator()->getAllowedMaxFileSize(), 512000);

        Config::inst()->update('CustomImageUploadField', 'max_upload', 256000);
        $imageField2 = new CustomImageUploadField('testImageField2');
        $this->assertEquals($imageField2->getValidator()->getAllowedMaxFileSize(), 256000);
    }

}

