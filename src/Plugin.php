<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner;

use TotallyQuiche\WordPressSiteBanner\PostTypes\Banners;
use TotallyQuiche\WordPressSiteBanner\Taxonomies\Presets;
use TotallyQuiche\WordPressSiteBanner\Terms\Presets\Standard;
use TotallyQuiche\WordPressSiteBanner\Terms\Presets\Warning;
use TotallyQuiche\WordPressSiteBanner\Terms\Presets\Danger;
use TotallyQuiche\WordPressSiteBanner\Terms\Presets\Success;
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
            'init',
            [
                $this,
                'updatePost'
            ]
        );

        add_action(
            'admin_enqueue_scripts',
            [
                $this,
                'enqueueAdminStyles'
            ]
        );

        add_action(
            'wp_enqueue_scripts',
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

        add_action(
            'add_meta_boxes',
            [
                $this,
                'addMetaBoxes'
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
        (new Presets)->register();
    }

    /**
     * Insert all Terms.
     *
     * @return void
     */
    public function insertTerms() : void
    {
        (new Standard)->insert(Presets::$key);
        (new Warning)->insert(Presets::$key);
        (new Danger)->insert(Presets::$key);
        (new Success)->insert(Presets::$key);
    }

    /**
     * Enqueue all admin styles.
     *
     * @param string $hook_suffix
     *
     * @return void
     */
    public function enqueueAdminStyles(string $hook_suffix) : void
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
     * Enqueue all styles.
     *
     * @param string $hook_suffix
     *
     * @return void
     */
    public function enqueueStyles(string $hook_suffix) : void
    {
        wp_enqueue_style(
            self::$prefix . '_default',
           plugin_dir_url(__FILE__) . 'Assets/css/default.css'
        );
    }

    /**
     * Show all banners.
     *
     * @return void
     */
    public function showBanners() : void
    {
        $banners = get_posts(
            [
                'post_type' => Banners::$key,
                'post_status' => 'publish',
                'numberposts' => -1,
            ]
        );

        $banner_class = Plugin::$prefix . '_banner';

        foreach ($banners as $banner) {
            $terms = wp_get_post_terms(
                $banner->ID,
                Presets::$key
            );

            $term_name = Plugin::$prefix . '_' . $terms[0]->slug;
            $banner_content = $banner->post_content;

            require(plugin_dir_path(__FILE__) . 'templates/Banners/Banner.php');
        }
    }

    /**
     * Add all meta boxes.
     *
     * @return void
     */
    public function addMetaBoxes() : void
    {
        if (
            ($post_type = $_GET['post_type']) === Banners::$key ||
            get_post_type($_GET['post']) === Banners::$key
        ) {
            (new PostView)->addMetaBoxes();
        }
    }

    /**
     * Handle post updates.
     *
     * @return void
     */
    public function updatePost() : void
    {
        (new PostView)->updatePost();
    }
}