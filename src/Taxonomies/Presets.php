<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Taxonomies;

use TotallyQuiche\WordPressSiteBanner\PostTypes\Banners;

final class Presets
{
    /**
     * The key of this Taxonomy.
     *
     * @var string
     */
    public static string $key = 'presets';

    /**
     * The name of this Taxonomy.
     *
     * @var string
     */
    public static string $name = 'Presets';

    /**
     * The singular name of this Taxonomy.
     *
     * @var string
     */
    public static string $singular_name = 'Preset';

    /**
     * Register the Taxonomy in WordPress.
     *
     * @return void
     */
    public function register() : void
    {
        register_taxonomy(
            self::$key,
            Banners::$key,
            [
                'rewrite' => false,
                'hierarchical' => true,
                'public' => false,
                'labels' => [
                    'name' => $this->name,
                    'singular_name' => self::$singular_name,
                    'search_items' => 'Search ' . self::$name,
                    'parent_item' => 'Parent ' . self::$singular_name,
                    'edit_item' => 'Edit ' . self::$singular_name,
                    'add_new_item' => 'Add New ' . self::$singular_name,
                    'back_to_items' => 'Go to ' . self::$name
                ]
            ]
        );
    }
}