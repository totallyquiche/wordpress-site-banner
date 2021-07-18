<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Views\Banners\Post;

use TotallyQuiche\WordPressSiteBanner\Plugin;
use TotallyQuiche\WordPressSiteBanner\Taxonomies\Presets;

final class Post
{
    /**
     * Enqueue styles.
     *
     * @return void
     */
    public function enqueueStyles() : void
    {
        wp_enqueue_style(
            Plugin::$prefix . '_post',
           plugin_dir_url(__FILE__) . 'css/default.css'
        );
    }

    /**
     * Add custom metaboxes.
     *
     * @return void
     */
    public function addMetaBoxes() : void
    {
        add_meta_box(
            'custom-meta-box-id',
            Presets::$name,
            [
                $this,
                'renderPresetsMetaBoxHtml'
            ],
            'banners'
        );
    }

    /**
     * Get the HTML for the Presets meta box.
     *
     * @return void
     */
    public function renderPresetsMetaBoxHtml() : void
    {
        $presets = get_terms([
            'taxonomy' => Presets::$key,
            'hide_empty' => false,
            'orderby' => 'term_id'
        ]);

        $preset_radio_list_items = [];

        $term = wp_get_post_terms($_GET['post'], Presets::$key)[0];

        $i = 0;

        foreach ($presets as $preset) {
            $checked = ($term->term_id === $preset->term_id || (empty($term) && $i === 0)) ? 'checked' : '';

            $preset_radio_list_items[] = '<input type="radio" name="preset" value="' . $preset->term_id . '" ' .
                                         $checked . '>&nbsp;' . $preset->name;

            $i++;
        }

        $preset_radio_list_items_html = implode('<br/>', $preset_radio_list_items);

        echo '<div id="presets-radio-list">' . $preset_radio_list_items_html . '</div>';
    }

    /**
     * Update the post based on the form submission.
     *
     * @return void
     */
    public function updatePost() : void
    {
        if (isset($_POST['post_ID']) && isset($_POST['preset'])) {
            wp_set_post_terms(
                (int) $_POST['post_ID'],
                (int) $_POST['preset'],
                'presets'
            );
        }
    }
}