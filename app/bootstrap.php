<?php

// Load Config
require_once 'config/config.php';

// Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

// Load Libraries
// require_once 'libraries/core.php';
// require_once 'libraries/controller.php';
// require_once 'libraries/database.php';

// Autoload Core Libraries - This will replace the above and we won't need to add every time we add a new library
spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});
