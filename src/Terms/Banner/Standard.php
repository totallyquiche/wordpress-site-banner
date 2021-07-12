<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Terms\Banner;

use TotallyQuiche\WordPressSiteBanner\Taxonomies\Banner;

class Standard
{
    /**
     * The name of this Term.
     *
     * @var string
     */
    private string $name = 'Standard';

    /**
     * The Taxonomy
     */

    /**
     * Create the Term.
     *
     * @return void
     */
    public function insert() : void
    {
        $name = $this->name;
        $taxonomy_name = Banner::$name;

        if (!term_exists($name, $taxonomy_name)) {
            wp_insert_term($name, $taxonomy_name);
        }
    }
}