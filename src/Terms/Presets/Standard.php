<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Terms\Presets;

final class Standard
{
    /**
     * The name of this Term.
     *
     * @var string
     */
    public static string $name = 'Standard';

    /**
     * The slug for this Term.
     *
     * @var string
     */
    private string $slug = 'standard';

    /**
     * The description of this Term.
     *
     * @var string
     */
    private string $description = 'A standard display banner.';

    /**
     * The Taxonomy
     */

    /**
     * Create the Term and associate it with the specified Taxonomy.
     *
     * @param string $taxonomy_key
     *
     * @return void
     */
    public function insert(string $taxonomy_key) : void
    {
        $name = self::$name;

        if (!term_exists($name, $taxonomy_key)) {
            wp_insert_term(
                $name,
                $taxonomy_key,
                [
                    'description' => $this->description,
                    'slug' => $this->slug
                ]);
        }
    }
}