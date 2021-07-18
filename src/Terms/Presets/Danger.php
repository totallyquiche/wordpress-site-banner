<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Terms\Presets;

final class Danger
{
    /**
     * The name of this Term.
     *
     * @var string
     */
    public static string $name = 'Danger';

    /**
     * The slug for this Term.
     *
     * @var string
     */
    private string $slug = 'danger';

    /**
     * The description of this Term.
     *
     * @var string
     */
    private string $description = 'A danger banner.';

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