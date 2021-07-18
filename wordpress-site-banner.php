<?php declare(strict_types=1);

/**
 * Plugin Name: WordPress Site Banner
 * Description: Display custom content on every page of your WordPress site.
 * Author:      Brian Dady <bndady@gmail.com>
 * Author URI:  https://briandady.com
 * License:     GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

/*
    WordPress Site Banner is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    WordPress Site Banner is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with WordPress Site Banner. If not, see http://www.gnu.org/licenses/gpl-3.0.html.
*/

require plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

(new TotallyQuiche\WordPressSiteBanner\Plugin)->initialize();