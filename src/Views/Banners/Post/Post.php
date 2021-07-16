<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Views\Banners\Post;

use TotallyQuiche\WordPressSiteBanner\Plugin;

class Post
{
    /**
     * Enqueue styles.
     *
     * @return void
     */
    public function enqueueStyles() : void
    {
        wp_enqueue_style(
            Plugin::$prefix . '_post',
           plugin_dir_url(__FILE__) . 'css/default.css'
        );
    }
}