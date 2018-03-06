<?php
/**
 * Plugin Name: Netpad cURL Timeout
 * Plugin URI: http://www.netpad.gr
 * Description: Set cURL Timeout
 * Version: 1.0.0
 * Author: George Tsiokos
 * Author URI: http://www.netpad.gr
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright (c) 2015-2016 "gtsiokos" George Tsiokos www.netpad.gr
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @package netpad-curl-timeout
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter('http_request_args', 'ntpd_http_request_args', 100, 1);
function ntpd_http_request_args( $r ) {
	$r['timeout'] = 30;
	return $r;
}
 
add_action('http_api_curl', 'ntpd_http_api_curl', 100, 1);
function ntpd_http_api_curl( $handle ) {
	curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 30 );
	curl_setopt( $handle, CURLOPT_TIMEOUT, 30 );
}