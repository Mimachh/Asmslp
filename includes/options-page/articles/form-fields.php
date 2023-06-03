<?php

function singleSection() { ?>
    <p class="description"><?php echo esc_html__('Here you can change the content (Title / Content / Link) that your Posts\'s buttons will share.', 'asmsl_domain') ?></p>
<?php }

// Do you want display on artice page ?

function displaySingleChoiceHTML() { ?>
    <select name="asmsl_display_choice">
        <option value="0" <?php selected(esc_html(get_option('asmsl_display_choice'))); ?>><?php echo esc_html__('No', 'asmsl_domain') ?></option>
        <option value="1" <?php selected(esc_html(get_option('asmsl_display_choice'))); ?>><?php echo esc_html__('Yes', 'asmsl_domain') ?></option>
    </select>
<?php }

function urlChoiceHTML() { ?>
    <input type="text" name="asmsl_url_choice" value="<?php echo esc_attr(get_option('asmsl_url_choice', '')) ?>">
    <p class="description"><?php echo esc_html__('Leaving blank will use the default Post URL.', 'asmsl_domain') ?></p>
<?php }

function contentChoiceHTML() { ?>
    <input type="text" name="asmsl_content_choice" value="<?php echo esc_attr(get_option('asmsl_content_choice', '')) ?>">
    <p class="description"><?php echo esc_html__('Leaving blank will use the default Post Excerpt.', 'asmsl_domain') ?></p>
<?php }

function titleChoiceHTML() { ?>
    <input type="text" name="asmsl_title_choice" value="<?php echo esc_attr(get_option('asmsl_title_choice', '')) ?>">
    <p class="description"><?php echo esc_html__('Leaving blank will use the default Post Title.', 'asmsl_domain') ?></p>
<?php }