<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Taxonomies;

use TotallyQuiche\WordPressSiteBanner\PostTypes\Banners;

class Types
{
    /**
     * The key of this Taxonomy.
     *
     * @var string
     */
    public static string $key = 'types';

    /**
     * The name of this Taxonomy.
     *
     * @var string
     */
    private string $name = 'Types';

    /**
     * The singular name of this Taxonomy.
     *
     * @var string
     */
    private string $singular_name = 'Type';

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
                'hierarchical' => true,
            ]
        );
    }
}