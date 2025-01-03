<!doctype html>
<link rel="apple-touch-icon" sizes="180x180" href="https://ggads.live/apple-touch-icon.png?v=14">
<link rel="icon" type="image/png" sizes="32x32" href="https://ggads.live/favicon-32x32.png?v=14">
<link rel="icon" type="image/png" sizes="16x16" href="https://ggads.live/favicon-16x16.png?v=14">
<link rel="manifest" href="https://ggads.live/site.webmanifest?v=14">
<link rel="shortcut icon" href="https://ggads.live/favicon.ico?v=14">


<?php

if(defined('VERSION'))
    define('version', VERSION);
defined('version') OR die('Direct access is not allowed.');

global $Wcms;

// Add the logo to the left side of the same row as the social bar
$Wcms->addListener('contentEnd', 'addLogo');

function addLogo($args) {
    $script = <<<EOT
    <div class="header-bar">
        <div class="logo-container">
            <a href="/" class="logo-link">
                <img src="{$Wcms->url('themes/your-theme-name/logo.png')}" alt="Logo" class="site-logo">
            </a>
        </div>
        <div class="social-container">
            <!-- Social Bar Placeholder -->
            {$args[0]}
        </div>
    </div>
    <style>
        .header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #0f3528;
        }
        .logo-container {
            flex: 0 0 auto;
        }
        .site-logo {
            height: 50px;
        }
        .social-container {
            flex: 1;
            text-align: right;
        }
    </style>
EOT;

    if(version < '2.0.0')
        array_push($args[0], $script);
    else
        $args[0] .= $script;

    return $args;
}
