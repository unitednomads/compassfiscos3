<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// AWS Info
$keyName = 'fisco/sample.txt';
$filePath = 'sample.txt'; // The file path of the file on your local machine

// S3 client
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $_ENV['AWS_REGION'],
    'credentials' => [
        'key'    => $_ENV['AWS_ACCESS_KEY_ID'],
        'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
    ],
]);

// Upload a file. The file size, file type, and MD5 hash are automatically calculated by the SDK.
try {
    $result = $s3->putObject([
        'Bucket' => $_ENV['AWS_BUCKET'],
        'Key'    => $keyName,
        'Body'   => fopen($filePath, 'r'),
        'ACL'    => 'private',
    ]);

    echo "File uploaded successfully.";
} catch (AwsException $e) {
    // Display error message
    echo $e->getMessage();
}
?>