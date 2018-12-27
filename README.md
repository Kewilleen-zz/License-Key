# License-Key
A simple plugin license key checker

### Installation
Initialize the `header("Content-type: application/json; charset=utf-8");` in top your `index` to return a `JSON` format

Put `data/license.class.php` in your files and start de `class`

### Settings

Open the `config.php` and insert the data to connect in database
```php
define("mysql", array('host'=>'YOUR_HOST','user'=>'YOUR_USER', 'pass'=>'YOUR_PASS', 'db'=>'YOUR_DATABASE'));
```

```php
$license = new License();
```

Call the `function` to check has a license by `IP` and `PORT` (need check isset IP and PORT)

```php
if (!$license->hasLicense($_GET['ip'], $_GET['port'])) {
  die('{"error":"IP/Port no has a license!"}');
}
```

### Examples

Connect a URL `http://yourwebsite.com/?ip=127.0.0.1&port=25565`

#### Java

```java
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;

import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

try {
  String link = "http://yourwebsite.com/?ip=127.0.0.1&port=25565";
  URL url = new URL(link);
  URLConnection conn = url.openConnection(); //Open connection with the URL
  BufferedReader br = new BufferedReader(new InputStreamReader(conn.getInputStream()));
  JSONParser parse = new JSONParser(); //Instance parse information
  JSONObject json = (JSONObject) parse.parse(br); //parse
  br.close(); //close connection
  boolean error = json.get("error") != null; //check has a error
  if (error) {
    System.out.println("A error has found! " + json.get("error"));
    return;
  }
  String server = (String) json.get("server"); //parse the object Server to String
  System.out.println("Welcome server " + server);
  } catch (IOException | ParseException e) {
    System.out.println(e.getMessage());
}
```

Has a value in database, return format:

```json
{
  "server": "Test",
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
