<?php
/*
Plugin Name: The Saver
Plugin URI: https://www.mikaeldui.se/the-saver
Description: Just press CTRL+S to save your work.
Version: 1.2
Author: Mikael Dúi Bolinder
Author URI: https://www.mikaeldui.se/
License: GPL2
*/

/*  Copyright 2012  MIKAEL DÚI BOLINDER  (email : dui@outlook.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class mdb_the_saver {
	
	public static function load_admin_javascript_file() {
		wp_enqueue_script( 'shortcut', plugin_dir_url( __FILE__ ) . 'shortcut.js' );
	}

	public static function header_stuff() {
		?>
			<script type="text/javascript">
				function init() {
					shortcut.add("Ctrl+S",function() {
						if ( document.getElementById("submit") ) {
							document.getElementById("submit").click();
						} else if ( document.getElementById("publish") ) {
							document.getElementById("publish").click();
						}
					});
				}
				window.onload=init;
			</script>
		<?php
	}
}
add_action( 'admin_head', array( 'mdb_the_saver', 'header_stuff') ); 
add_action( 'admin_enqueue_scripts', array( 'mdb_the_saver', 'load_admin_javascript_file'));

?>