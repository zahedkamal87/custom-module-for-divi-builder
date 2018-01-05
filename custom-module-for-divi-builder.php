<?php

/**
 * Plugin Name: DP Custom Modules
 * Plugin URI: 
 * Description: 
 * Version: 1.0
 * Author: DiviPlugins
 * Author URI: http://www.diviplugins.com
 * */
add_action('et_builder_ready', 'dp_load_the_module');

function dp_load_the_module() {
    require 'dp_custom_module_example_1.php';
}
