<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Views\Banners\PostNew;

use TotallyQuiche\WordPressSiteBanner\Plugin;

final class PostNew
{
    /**
     * Enqueue styles.
     *
     * @return void
     */
    public function enqueueStyles() : void
    {
        wp_enqueue_style(
            Plugin::$prefix . '_post_new',
           plugin_dir_url(__FILE__) . 'css/default.css'
        );
    }
}