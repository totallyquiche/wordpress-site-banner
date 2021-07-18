<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\PostTypes;

final class Banners
{
    /**
     * The key of this Post Type.
     *
     * @var string
     */
    public static string $key = 'banners';

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
     * The description of this Post Type
     *
     * @var string
     */
    private string $description = 'Banners for displaying messages across your WordPress site.';

    /**
     * Register the Post Type in WordPress.
     *
     * @return void
     */
    public function register() : void
    {
        register_post_type(
            self::$key,
            [
                'description' => $this->description,
                'public' => true,
                'menu_icon' => 'dashicons-megaphone',
                'rewrite' => false,
                'labels' => [
                    'name' => $this->name,
                    'singular_name' => $this->singular_name,
                    'add_new_item' => 'Add New ' . $this->singular_name
                ]
            ]
        );
    }
}