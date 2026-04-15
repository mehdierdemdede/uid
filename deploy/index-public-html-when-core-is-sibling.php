<?php

/**
 * Bu dosyayı sunucuda WEB KÖKÜNE (public_html vb.) "index.php" olarak kullanın.
 * Laravel çekirdeği (app, bootstrap, vendor, .env, storage) bir ÜST dizindeki "core" klasöründe olmalı.
 *
 * Örnek yapı:
 *   /home/kullanici/public_html/   ← index.php, .htaccess, build/, images/
 *   /home/kullanici/core/          ← app, bootstrap, config, database, routes, storage, vendor, .env
 *
 * .env dosyası core/ içinde olmalı (Laravel kökü).
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$core = dirname(__DIR__).'/core';

if (! is_dir($core) || ! is_file($core.'/vendor/autoload.php')) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    exit('Laravel core bulunamadi. core/ klasoru ve vendor/ yollarini kontrol edin. Beklenen: '. $core);
}

if (file_exists($maintenance = $core.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $core.'/vendor/autoload.php';

/** @var Application $app */
$app = require_once $core.'/bootstrap/app.php';

$app->handleRequest(Request::capture());
