<?php

function extra_category_fields($tag)
{
    $t_id = $tag->term_id;
    $term_meta = get_option("taxonomy_term_$t_id");
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra_category_description"><?php _e('Extra Description'); ?></label>
        </th>
        <td>
            <?php
            $content = esc_attr($term_meta['extra_category_description'] ?? '');
            $editor_id = 'term_meta[extra_category_description]';
            wp_editor($content, $editor_id);
            ?>
            <br/>
            <span class="description"><?php _e('Enter additional category description'); ?></span>
        </td>
    </tr>
    <?php
}

add_action('edit_category_form_fields', 'extra_category_fields', 10, 2);


// Save extra taxonomy fields callback function.
function save_extra_category_fields($term_id)
{
    if (isset($_POST['term_meta'])) {
        $t_id = $term_id;
        $term_meta = get_option("taxonomy_term_$t_id");
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        //save the option array
        update_option("taxonomy_term_$t_id", $term_meta);
    }
}

add_action('edited_category', 'save_extra_category_fields', 10, 2);
