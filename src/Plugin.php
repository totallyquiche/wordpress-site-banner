<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner;

use TotallyQuiche\WordPressSiteBanner\PostTypes\Banners;
use TotallyQuiche\WordPressSiteBanner\Taxonomies\Types;
use TotallyQuiche\WordPressSiteBanner\Terms\Types\Standard;
use TotallyQuiche\WordPressSiteBanner\Views\Banners\Add\Add as AddView;
use TotallyQuiche\WordPressSiteBanner\Views\Banners\Banners\Banners as BannersView;
use TotallyQuiche\WordPressSiteBanner\Views\Banners\Post\Post as PostView;

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
            'admin_enqueue_scripts',
            [
                $this,
                'enqueueStyles'
            ]
        );

        add_action(
            'wp_body_open',
            [
                $this,
                'showBanners'
            ]
        );
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

    /**
     * Enqueue all scripts.
     *
     * @param string $hook_suffix
     *
     * @return void
     */
    public function enqueueStyles(string $hook_suffix) : void
    {
        if (
            ($post_type = $_GET['post_type']) === Banners::$key ||
            get_post_type($_GET['post']) === Banners::$key
        ) {
            switch ($hook_suffix) {
                case 'edit.php':
                    (new BannersView)->enqueueStyles();
                    break;
                case 'post-new.php':
                    (new AddView)->enqueueStyles();
                    break;
                case 'post.php':
                    (new PostView)->enqueueStyles();
                    break;
            }
        }
    }

    /**
     * Show all banners.
     *
     * @return void
     */
    public function showBanners() : void
    {
        $banner_id = Plugin::$prefix . '_banner';
        $banner_title = 'Banner Title';
        $banner_content = 'Banner Content';

        require(plugin_dir_path(__FILE__) . 'templates/Banners/Banner.php');
    }
}