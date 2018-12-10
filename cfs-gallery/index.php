<?php
/*
Plugin Name: CFS - Gallery Add-on
Plugin URI: http://code200.com.br/
Description: Adds a Gallery field type.
Version: 1.0
Author: Robert Zastrich
Author URI: http://zastrich.com.br/
License: GPL2
*/

$cfs_gallery_addon = new cfs_gallery_addon();

class cfs_gallery_addon
{
    function __construct() {
        add_filter('cfs_field_types', array($this, 'cfs_field_types'));
    }

    function cfs_field_types( $field_types ) {
        $field_types['gallery'] = dirname( __FILE__ ) . '/gallery.php';
        return $field_types;
    }
}