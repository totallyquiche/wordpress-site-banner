<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Pages;

use TotallyQuiche\WordPressSiteBanner\Plugin;

class Banners
{
    /**
     * The page title.
     *
     * @var string
     */
    public static string $title = 'Banners';

    /**
     * The page slug.
     *
     * @var string
     */
    public static string $slug = 'banners';

    /**
     * Add this page.
     *
     * @return void
     */
    public function add() : void
    {
        add_menu_page(
            self::$title,
            self::$title,
            'read',
            Plugin::$prefix . '_' . self::$slug,
            [
                $this,
                'getContent'
            ],
            'dashicons-megaphone'
        );
    }

    /**
     * Prints an HTML representation of the page content.
     *
     * @return string
     */
    public function getContent() : void
    {
        echo 'Hello, World!';
    }
}