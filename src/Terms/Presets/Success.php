<?php declare(strict_types=1);

namespace TotallyQuiche\WordPressSiteBanner\Terms\Presets;

final class Success
{
    /**
     * The name of this Term.
     *
     * @var string
     */
    public static string $name = 'Success';

    /**
     * The slug for this Term.
     *
     * @var string
     */
    private string $slug = 'success';

    /**
     * The description of this Term.
     *
     * @var string
     */
    private string $description = 'A success banner.';

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