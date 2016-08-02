# SilverStripe ImageUploadField
[![Build Status](https://travis-ci.org/dynamic/silverstripe-imageuploadfield.svg?branch=master)](https://travis-ci.org/dynamic/silverstripe-imageuploadfield)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dynamic/silverstripe-imageuploadfield/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-imageuploadfield/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/dynamic/silverstripe-imageuploadfield/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-imageuploadfield/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/dynamic/silverstripe-imageuploadfield/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-imageuploadfield/build-status/master)
[![codecov](https://codecov.io/gh/dynamic/silverstripe-imageuploadfield/branch/master/graph/badge.svg?token=NwnVzhOZlx)](https://codecov.io/gh/dynamic/silverstripe-imageuploadfield)
[![Dependency Status](https://www.versioneye.com/user/projects/57a119373d8eb6004d77429c/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/57a119373d8eb6004d77429c)

SilverStripe UploadField pre-configured for Image uploads. Allows max file size to be set site wide.

## Requirements

- SilverStripe 3.2

## Installation

	composer require dynamic/silverstripe-imageuploadfield

## Example usage

	$imageField = ImageUploadField::create('Image', 'Image');

What it does:

* sets `AllowedMaxFileNumber` to 1
* sets `AllowedFileCategories` to Image
* sets `AllowedMaxFileSize` to 1 MB

You can overwrite the `AllowedMaxFileSize` value in config.yml:

	ImageUploadField:
		max_upload: 512000

## Documentation

See the [docs/en](docs/en/index.md) folder.
