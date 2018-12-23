# License-Key
A plugin license key checker

### Installation
Initialize the `header("Content-type: application/json; charset=utf-8");` in top your `index` to return a `JSON` format

Put `data/license.class.php` in your files and start de `class`

### Settings

Open the `config.php` and insert the data to connect in database
```php
define('database_host', 'localhost');
define('database_user', 'root');
define('database_pass', '');
define('database_name', 'test');
```

```php
$license = new License();
```

Call the `function` to check has a license by `IP` and `PORT` (need check isset IP and PORT)

```php
if (!$l->hasLicense($_GET['ip'], $_GET['port'])) {
	die('{"error":"IP/Port no has a license!"}');
}
```

### Examples

Connect a URL `http://localhost/license-key/?ip=127.0.0.1&port=25565`

Has a value in database, return format:

```json
{
  "server": "Test"
  "plugin": "KwLicense"
}
```

### Others function

Call the Server by

```php
getServer()
```

Call the Plugin Name by

```php
getPlugin()
```
