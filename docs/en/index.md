## Example usage

	$imageField = ImageUploadField::create('Image', 'Image');

What it does:

* sets `AllowedMaxFileNumber` to 1
* sets `AllowedFileCategories` to Image
* sets `AllowedMaxFileSize` to 1 MB

You can overwrite the `AllowedMaxFileSize` value in config.yml:

	ImageUploadField:
		max_upload: 512000
		

## Additional Notes

Remember if your global max file size limit via the config is greater than the allowed `post_max_size` per the server configuration, the server configuration will be used instead of your config setting.