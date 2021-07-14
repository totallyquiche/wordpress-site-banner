<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner;

use TotallyQuiche\WordPressSiteBanner\PostTypes\Banners;
use TotallyQuiche\WordPressSiteBanner\Taxonomies\Types;
use TotallyQuiche\WordPressSiteBanner\Terms\Types\Standard;

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
        add_action('init', $this->registerPostTypes());
        add_action('init', $this->registerTaxonomies());
        add_action('init', $this->insertTerms());
    }

    /**
     * Register all Post Types.
     *
     * @return void
     */
    private function registerPostTypes() : void
    {
        (new Banners)->register();
    }

    /**
     * Register all Taxonomies.
     *
     * @return void
     */
    private function registerTaxonomies() : void
    {
        (new Types)->register();
    }

    /**
     * Insert all Terms.
     *
     * @return void
     */
    private function insertTerms() : void
    {
        (new Standard)->insert(Types::$key);
    }
}