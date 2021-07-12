<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Taxonomies;

class Banner
{
    /**
     * The name of this Taxonomy.
     *
     * @var string
     */
    public static string $name = 'Banner';

    /**
     * Register the Taxonomy in WordPress.
     *
     * @return void
     */
    public function register() : void
    {
        register_taxonomy(
            self::$name,
            'totallyquiche_wordpress_site_banner_banners',
            [
                'rewrite' => false,
            ]
        );
    }
}