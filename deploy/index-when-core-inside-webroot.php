<?php

/**
 * Alternatif: "core" klasörü WEB KÖKÜNÜN İÇİNDE ise (public_html/core/).
 * Güvenlik: core/.htaccess ile dış erişimi kapatın veya core'u web dışına taşıyın (üstteki index önerilir).
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$core = __DIR__.'/core';

if (! is_dir($core) || ! is_file($core.'/vendor/autoload.php')) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    exit('Laravel core bulunamadi: '.$core);
}

if (file_exists($maintenance = $core.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $core.'/vendor/autoload.php';

/** @var Application $app */
$app = require_once $core.'/bootstrap/app.php';

$app->handleRequest(Request::capture());
