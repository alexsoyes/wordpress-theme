<?php

function display_category_extra_field($tag)
{
    $content = get_term_meta($tag->term_id, 'category_extra_field', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="category_extra_field">Category Extra Field</label></th>
        <td>
            <?php wp_editor($content, 'category_extra_field', array('textarea_rows' => 5)); ?>
            <p class="description">Enter the extra field content for this category.</p>
        </td>
    </tr>
    <?php
}

add_action('category_edit_form_fields', 'display_category_extra_field');
add_action('category_add_form_fields', 'display_category_extra_field');

function save_category_extra_field($term_id)
{
    if (isset($_POST['category_extra_field'])) {
        update_term_meta($term_id, 'category_extra_field', $_POST['category_extra_field']);
    }
}

add_action('edited_category', 'save_category_extra_field');
add_action('create_category', 'save_category_extra_field');