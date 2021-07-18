<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Views\Banners\Edit;

use TotallyQuiche\WordPressSiteBanner\Plugin;

final class Edit
{
    /**
     * Enqueue styles.
     *
     * @return void
     */
    public function enqueueStyles() : void
    {
        wp_enqueue_style(
            Plugin::$prefix . '_edit',
           plugin_dir_url(__FILE__) . 'css/default.css'
        );
    }
}