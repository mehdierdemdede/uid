<?php

/**
 * Sunucu yapiniz:
 *   .../public_html/uid/          <- index.php, .htaccess, build/, images/  (URL: /uid)
 *   .../uid_core/                 <- app, bootstrap, config, vendor, storage, .env
 *
 * uid_core, public_html ile AYNI seviyede (public_html'in kardesi) olmali.
 *
 * Bu dosyanin icerigini public_html/uid/index.php olarak kaydedin.
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// public_html/uid -> iki ust (public_html ve onun ustunu degil: uid -> public_html -> HOME)
// __DIR__ = .../public_html/uid
// dirname(__DIR__, 2) = .../ (genelde hesap kok dizini, public_html'in ust dizini)
$core = dirname(__DIR__, 2).'/uid_core';

if (! is_dir($core) || ! is_file($core.'/vendor/autoload.php')) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    exit(
        "Laravel core bulunamadi.\n\n".
        'Aranan yol: '.$core."\n\n".
        'index.php konumu: '.__DIR__."\n".
        'uid_core klasorunun public_html ile ayni seviyede oldugundan emin olun.'
    );
}

if (file_exists($maintenance = $core.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $core.'/vendor/autoload.php';

/** @var Application $app */
$app = require_once $core.'/bootstrap/app.php';

$app->handleRequest(Request::capture());
