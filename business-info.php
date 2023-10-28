<?php
/**
 * Plugin Name: Business Info
 * Description: Adds an options page to edit business informations.
 * Author: Jannik Baranczyk
 * Version: 1.0
 */
require __DIR__.'/vendor/autoload.php';

$plugin = new \JannBar\BusinessInfo\Plugin();
$plugin->init();
