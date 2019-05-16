# Simple S3 Client

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/c131920fb28d46ce8ee0a629099d2bdf)](https://app.codacy.com/app/mauretto78_2/simple-s3?utm_source=github.com&utm_medium=referral&utm_content=mauretto78/simple-s3&utm_campaign=Badge_Grade_Settings)
[![license](https://img.shields.io/github/license/mauretto78/simple-s3.svg)]()
[![Packagist](https://img.shields.io/packagist/v/mauretto78/simple-s3.svg)]()

**Simple S3 Client** is a simple wrapper of the official SDK PHP Client.

## Basic Usage

To instantiate the Client do the following:

```php
use SimpleS3\Client;

$s3Client = new Client(
    $access_key_id,
    $secret_key,
    $config = [
        'version' => $verion,
        'region' => $region,
    ]
);
```

You MUST provide your ```$access_key_id``` and ```$secret_key```, plus an optional ```$config``` array.

Please refer to the official AWS SDK'documentation:

[Configuration for the AWS SDK for PHP Version 3](https://docs.aws.amazon.com/en_us/sdk-for-php/v3/developer-guide/guide_configuration.html#credentials)

## Methods

Here is the list of Client's public methods:

* `clearBucket` - clear a bucket from all files
* `createBucketIfItDoesNotExist` . create a bucket if it does not exists
* `deleteBucket` - delete a bucket
* `deleteFile` - delete a file
* `getFile` - get all informations for a file
* `getFilesFromABucket` get an array of files in a bucket
* `getPublicFileLink` - get the public link to download the file

## Bucket name restrictions and limitations

Please refer to the official AWS policy:

[Bucket Restrictions and Limitations](https://docs.aws.amazon.com/en_us/AmazonS3/latest/dev/BucketRestrictions.html)

The Client comes with a ```S3BucketNameValidator``` class which throws you an ```InvalidS3BucketNameException``` if the name is not compliant with the AWS rule conventions. 

## Logging

If you want to log Client errors, you can inject your logger. Please note that your logger MUST be PSR-3 compliant:

```php
...

// $logger MUST implement Psr\Log\LoggerInterface

$s3Client->addLogger($logger); 
```

## Support

If you found an issue or had an idea please refer [to this section](https://github.com/mauretto78/simple-s3/issues).

## Authors

* **Mauro Cassani** - [github](https://github.com/mauretto78)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details