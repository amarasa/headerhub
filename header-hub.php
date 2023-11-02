<?php

/**
 * Plugin Name: HeaderHub
 * Description: A plugin to easily select custom header templates for each page.
 * Version: 1.0
 * Author: Angelo Marasa
 */

/* -------------------------------------------------------------------------------------- */
// Updated
require 'puc/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/amarasa/headerhub',
    __FILE__,
    'header-hub'
);

//Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');

//Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('your-token-here');

/* -------------------------------------------------------------------------------------- */

require 'inc/meta-box.php';
require 'inc/header-handler.php';
