# MultiInfo PHP

This package was created to help communicating with Plus MultiInfo API.

# Implemented Endpoints

Package has implementented most Requests, Parsers and Responses of the API

## Sending

* `SendSms` - send short message (up to 160 characters)
* `SendSmsRaw` - send binary message
* `SendSmsLong` - send long message (up to 1377 characters)
* `Package` - send bundle of short messages

## Receiving

* `GetSms` - read received messages

## Status

* `InfoSms` - get the status of sent message
* `PackageInfo` - get the status of sent bundle

# Requirements

| Version | PHP    |
| ------- | ------ |
| 0.x     | >= 7.4 |

# Installation

```sh
composer require nextgen-tech/multiinfo
```

# Usage

First, you need to initiate base classes.

```php
use NGT\MultiInfo\Certificate;
use NGT\MultiInfo\Credentials;
use NGT\MultiInfo\Handler;
use NGT\MultiInfo\Url;
use NGT\MultiInfo\Connections\HttpConnection;

// Create instance of credentials.
$credentials = new Credentials(
    $login,     // Login of API user
    $password,  // Password of API user
    $serviceId  // Service ID
);

// Create instance of certificate.
$certificate = new Certificate(
    $path,            // Path to certificate (CURLOPT_SSLCERT)
    $privateKeyPath,  // Path to certificate private key (CURLOPT_SSLKEY)
    $password,        // Certificate password (CURLOPT_SSLCERTPASSWD)
    $type             // Certificate type - defaults to PEM (CURLOPT_SSLCERTTYPE)
);

// Create instance of API URL.
$url = Url::api1(); // or URL::api2(), depends of service configuration

// Create instance of connection.
$connection = new HttpConnection($url, $certificate);

// Create handler instance.
$handle = new Handler($connection);
```

Then you can create Request, send it through Handler and receive Response.

```php
$request = new \NGT\MultiInfo\Requests\SendSmsRequest($credentials);

$request->setContent('message');                // Required, content of the message
$request->setDestination('48123456789');        // Required, phone number of the recipient
$request->setValidTo(new DateTime('+7 days'));  // Optional, period of validity of the message
$request->setRequestDeliveryNotification(true); // Optional, indicates whether the delivery notification should be requested
$request->setZeroClass(true);                   // Optional, indicates whether the message should be sent as zero class
$request->setAdvancedEncoding(true);            // Optional, indicates whether the message should use advanced encoding
$request->setDeleteWhenProcessed(true);         // Optional, indicates whether the message should be deleted after processing.
$request->setReplyTo(12345);                    // Optional, ID of message to which the message is replying
$request->setOrigin('CUSTOM');                  // Optional, origin (nadpis) of the message.

/** @var \NGT\MultiInfo\Responses\SendSmsResponse */
$response = $handler->handle($request);

$response->getMessageId();     // ID of the message
$response->getSender();        // Phone number of the sender
$response->getReceiver();      // Phone number of the receiver
$response->getContentType();   // Content type of the message
$response->getContent();       // Content of the message
$response->getProtocolId();    // ID of the protocol
$response->getCodingScheme();  // Coding scheme
$response->getServiceId();     // ID of the service
$response->getConnectorId();   // ID of the connector
$response->getReceivedAt();    // Date of receiving message
```

Each endpoint has its own Request, Parser and Response. It is highly recommended to look into `Requests` and `Responses` directories in order to get the list of all available methods.
