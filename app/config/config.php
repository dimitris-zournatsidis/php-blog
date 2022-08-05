<?php

// DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'prometheus*85');
define('DB_NAME', 'shareposts_db');

// App Root
// echo __FILE__; --> C:\xampp\htdocs\traversymvc\app\config\config.php
// echo dirname(__FILE__); --> C:\xampp\htdocs\traversymvc\app\config
define('APPROOT', dirname(dirname(__FILE__))); // --> from now on, APPROOT will be --> C:\xampp\htdocs\traversymvc\app

// URL Root
define('URLROOT', 'http://localhost/shareposts');

// Site Name
define('SITENAME', 'Info-Space');

// App Version
define('APPVERSION', '1.0.0');
