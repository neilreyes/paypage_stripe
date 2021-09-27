# Pay page

Simple pay page using PHP, MySQL PDO, and Stripe API

Instruction before you start:

1. Create ./js/config.js

```js
const PUBLIC_KEY = "your_stripe_public_key_here";
```

2. Create ./config/db.php

```php
<?php
    // DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', "database_username");
    define('DB_PASS', 'database_password');
    define('DB_NAME', 'database_name');
?>
```

3. Create ./config/stripe

```php
<?php
    define('SECRET_KEY', 'your_stripe_secret_key');
?>
```
