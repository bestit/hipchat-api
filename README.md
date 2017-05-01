## bestit/hipchat-api

This a very simple HipChat API optimized for Laravel & Lumen version 5.

## Installation

### Install via Composer

From the command line, run:

```
composer require bestit/hipchat-api
```

### Laravel 5

### Step 1: Publishing config

From the command line, run:

```
php artisan vendor:publish --provider HipChatServiceProvider
```

### Step 2: Service Provider

For your Laravel app, open `config/app.php` and, within the `providers` array, append:

```
Bestit\HipChat\HipChatServiceProvider::class,
```

This will bootstrap the package into Laravel.

### Step 3: Facade

For your Laravel app, open `config/app.php` and, within the `aliases` array, append:

```
'HipChat' => Bestit\HipChat\Facade\HipChat::class,
```

This will add the HipChat Facade into Laravel.

### Step 4: Configuration

Add the following entries to your environment (.env) file:

```
HIPCHAT_SERVER_URL // This is optional, defaults to 'https://api.hipchat.com'
HIPCHAT_API_TOKEN // This is required, use a user personal token.
```

### Lumen 5

### Step 1: Service provider

Inside your bootstrap/app.php file, add:

```
$app->register(Bestit\HipChat\HipChatLumenServiceProvider::class);
```

### Step 2: Configuration

Copy the ```vendor/bestit/hipchat-api/src/config/hipchat.php``` file to your local config directory (if not exists must create) and don't forget add the entries to your environment (.env) file described in Step 4 of the Laravel Configuration. 


### Usage

- Notification in a Room

    ```php
    HipChat::room('RoomNameOrRoomId')->notify('Some Cool Message');

    // you have three optional parameters, `color`, `alert` and `notify`
    ```
    Read more: [here](https://www.hipchat.com/docs/apiv2/method/send_room_notification)

- Notification to a user

    ```php
    HipChat::user('UserEmailOrId')->notify('Some Cool Message');

    // you have two optional parameters, `alert` and `format`
    ```
     Read more: [here](https://www.hipchat.com/docs/apiv2/method/private_message_user)

### Usage outside of Laravel / Lumen

```php
$url = 'https://company.hipchat.com'; // Can be left empty, default to https://api.hipchat.com
$token = 'some_api_token';
$client = new \Bestit\HipChat\Client($token, $url);

$client->room('RoomNameOrRoomId')->notify('Some Cool Message');

$client->user('UserEmailOrId')->notify('Some Cool Message');
```

### Todo
- Cover more API Endpoints
- Tests
- Cleanup/Interfaces etc.
- Travis CI