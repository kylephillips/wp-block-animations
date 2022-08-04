<?php
/*
Plugin Name: Block Animations
Plugin URI: https://github.com/kylephillips/wp-block-animations
Description: Adds basic animations to blocks on scroll. Adds an "Animation" option to core WordPress blocks.
Version: 1.0.1
Author: Kyle Phillips
Author URI: https://github.com/kylephillips
License: GPL
*/
$loader = require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/app/Bootstrap.php');
new BlockAnimations\Bootstrap;