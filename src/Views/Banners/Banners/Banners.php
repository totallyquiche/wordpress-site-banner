<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Views\Banners\Banners;

use TotallyQuiche\WordPressSiteBanner\Plugin;

class Banners
{
    /**
     * Enqueue styles.
     *
     * @return void
     */
    public function enqueueStyles() : void
    {
        wp_enqueue_style(
            Plugin::$prefix . '_banners',
           plugin_dir_url(__FILE__) . 'css/default.css'
        );
    }
}