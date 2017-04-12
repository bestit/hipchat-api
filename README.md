## bestit/hipchat-api

This a very simple HipChat API optimized for Laravel 5.

## Installation

### Step 1: Composer

From the command line, run:

```
composer require bestit/hipchat-api
```

### Step 2: Publishing config

From the command line, run:

```
php artisan vendor:publish --provider HipChatServiceProvider
```

### Step 3: Service Provider

For your Laravel app, open `config/app.php` and, within the `providers` array, append:

```
Bestit\HipChat\HipChatServiceProvider::class,
```

This will bootstrap the package into Laravel.

### Step 4: Facade

For your Laravel app, open `config/app.php` and, within the `aliases` array, append:

```
'HipChat' => Bestit\HipChat\Facade\HipChat::class,
```

This will add the HipChat Facade into Laravel.

### Step 5: Configuration

Add the following entries to your environment (.env) file:

```
HIPCHAT_SERVER_URL // This is optional, defaults to 'https://api.hipchat.com'
HIPCHAT_API_TOKEN // This is required, use a user personal token.
```

### Usage within Laravel

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

### Usage outside of Laravel

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