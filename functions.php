<!doctype html>
<link rel="apple-touch-icon" sizes="180x180" href="https://ggads.live/apple-touch-icon.png?v=14">
<link rel="icon" type="image/png" sizes="32x32" href="https://ggads.live/favicon-32x32.png?v=14">
<link rel="icon" type="image/png" sizes="16x16" href="https://ggads.live/favicon-16x16.png?v=14">
<link rel="manifest" href="https://ggads.live/site.webmanifest?v=14">
<link rel="shortcut icon" href="https://ggads.live/favicon.ico?v=14">


<?php

if (defined('VERSION'))
    define('version', VERSION);
defined('version') or die('Direct access is not allowed.');

global $Wcms;

// Add the header bar (logo + social icons)
$Wcms->addListener('css', 'addHeaderBar');

function addHeaderBar($args) {
    $fontAwesomeCDN = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";

    $script = <<<EOT
    <link rel="stylesheet" href="{$fontAwesomeCDN}" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <style>
        .header-bar {
            display: flex;
            align-items: top; /* Vertically align items */
            justify-content: space-between; /* Space between logo and social icons */
            padding: 10px 20px;
            width: 100%;
        }
        .logo-container {
            flex: 0 0 auto; /* Ensure the logo doesn't stretch */
        }
        .site-logo {
            height: 100px;
        }
        .social-container {
            flex: 0 0 auto; /* Prevent the social container from stretching */
            text-align: right; /* Align content to the right */
            margin-left: auto; /* Push the social icons to the far right */
        }
        .social-icons {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 10px;
        }
        .social-icons li {
            display: inline-block;
        }
        .social-icons a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
        }
    </style>
    <div class="header-bar">
        <!-- Logo -->
        <div class="logo-container">
                <img src="https://ggads.live/images/logo.png" alt="Logo" class="site-logo">
        </div>

        <!-- Social Icons -->
        <div class="social-container">
            <ul class="social-icons">
                <li>
                    <a href="https://twitter.com/YourUserNameHere" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://instagram.com/YourIG" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="https://youtube.com/c/YourChannelURL" target="_blank">
                        <i class="fa fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitch.tv/yourTwitchUsername" target="_blank">
                        <i class="fa fa-twitch"></i>
                    </a>
                </li>
                <li>
                    <a href="https://facebook.com/YourFacebookURL" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://linkedin.com" target="_blank">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
EOT;

    if (version < '2.0.0')
        array_push($args[0], $script);
    else
        $args[0] .= $script;

    return $args;
}
