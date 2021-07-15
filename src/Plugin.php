<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner;

use TotallyQuiche\WordPressSiteBanner\PostTypes\Banners;
use TotallyQuiche\WordPressSiteBanner\Taxonomies\Types;
use TotallyQuiche\WordPressSiteBanner\Terms\Types\Standard;

use TotallyQuiche\WordPressSiteBanner\Pages\Banners as BannersPage;

class Plugin
{
    /**
     * A string used as a unique prefix to distinguish this plugin's tables, etc.
     * from others.
     *
     * @var string
     */
    public static string $prefix = 'tqwsb';

    /**
     * Initialize the plugin.
     *
     * @return void
     */
    public function initialize() : void
    {
        add_action(
            'init',
            [
                $this,
                'registerPostTypes'
            ]
        );

        add_action(
            'init',
            [
                $this,
                'registerTaxonomies'
            ]
        );

        add_action(
            'init',
            [
                $this,
                'insertTerms'
            ]
        );

        add_action(
            'admin_menu',
            [
                $this,
                'addMenuPages'
            ]
        );
    }

    /**
     * Add all menu pages.
     *
     * @return void
     */
    public function addMenuPages() {
        (new BannersPage)->add();
    }

    /**
     * Register all Post Types.
     *
     * @return void
     */
    public function registerPostTypes() : void
    {
        (new Banners)->register();
    }

    /**
     * Register all Taxonomies.
     *
     * @return void
     */
    public function registerTaxonomies() : void
    {
        (new Types)->register();
    }

    /**
     * Insert all Terms.
     *
     * @return void
     */
    public function insertTerms() : void
    {
        (new Standard)->insert(Types::$key);
    }
}