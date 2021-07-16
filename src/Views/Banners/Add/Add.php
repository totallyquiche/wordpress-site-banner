<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Views\Banners\Add;

use TotallyQuiche\WordPressSiteBanner\Plugin;

class Add
{
    /**
     * Enqueue styles.
     *
     * @return void
     */
    public function enqueueStyles() : void
    {
        wp_enqueue_style(
            Plugin::$prefix . '_add',
           plugin_dir_url(__FILE__) . 'css/default.css'
        );
    }
}