<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\PostTypes;

use TotallyQuiche\WordPressSiteBanner\Plugin;

class Banners
{
    /**
     * The name of this Post Type.
     *
     * @var string
     */
    private string $name = 'Banners';

    /**
     * The singular name of this Post Type.
     *
     * @var string
     */
    private string $singular_name = 'Banner';

    /**
     * Register the Post Type in WordPress.
     *
     * @return void
     */
    public function register() : void
    {
        register_post_type(
            Plugin::$prefix . '_banners',
            [
                'description' => 'Banners for displaying messages across your WordPress site.',
                'public' => true,
                'menu_icon' => 'dashicons-megaphone',
                'labels' => [
                    'name' => $this->name,
                    'singular_name' => $this->singular_name,
                    'add_new_item' => 'Add New ' . $this->singular_name
                ],
                'taxonomies' => [
                    'Banner'
                ],
                'supports' => [
                    'title',
                    'editor'
                ],
                'rewrite' => false
            ]
        );
    }
}