<?php

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
        $field = new ImageUploadField('Image');
        $this->assertInstanceOf('UploadField', $field);
    }

    /**
     *
     */
    public function testMaxUpload()
    {
        $this->assertEquals(Config::inst()->get('ImageUploadField', 'max_upload'), 1024000);
        Config::inst()->update('ImageUploadField', 'max_upload', 512000);
        $this->assertEquals(Config::inst()->get('ImageUploadField', 'max_upload'), 512000);
    }

    /**
     *
     */
    public function testINIUploadLimitCheck()
    {
        $iniMax = File::ini2bytes(ini_get('post_max_size'));
        $over = $iniMax * 2;
        $under = $iniMax / 2;

        Config::inst()->update('ImageUploadField', 'max_upload', $over);
        $imageField = ImageUploadField::create('testField');
        $this->assertEquals($imageField->getValidator()->getAllowedMaxFileSize(), $iniMax);

        Config::inst()->update('ImageUploadField', 'max_upload', $under);
        $imageField2 = ImageUploadField::create('testField2');
        $this->assertEquals($imageField2->getValidator()->getAllowedMaxFileSize(), $under);
    }

    /**
     *
     */
    public function testExtendedField()
    {

        $imageField = new CustomImageUploadField('testImageField');
        $this->assertEquals($imageField->getValidator()->getAllowedMaxFileSize(), 512000);

        Config::inst()->update('CustomImageUploadField', 'max_upload', 256000);
        $imageField2 = new CustomImageUploadField('testImageField2');
        $this->assertEquals($imageField2->getValidator()->getAllowedMaxFileSize(), 256000);

    }

}

/**
 * Class CustomImageUploadField
 */
class CustomImageUploadField extends ImageUploadField implements TestOnly
{

    /**
     * @var int
     */
    private static $max_upload = 512000;

}
