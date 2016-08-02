<?php

class ImageUploadFieldTest extends SapphireTest
{
    public function test__construct()
    {
        $field = new ImageUploadField('Image');
        $this->assertInstanceOf('UploadField', $field);
    }
}
