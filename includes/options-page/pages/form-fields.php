<?php

function pageSection() { ?>
    <p class="description"><?php echo esc_html__('Here you can change the content (Title / Content / Link) that your Pages\'s buttons will share.', 'asmsl_domain') ?></p>
<?php }

function displayPageChoiceHTML() { ?>
    <select name="asmsl_display_page_choice" <?php if(!verify()) { echo 'disabled';} ?> >
        <option value="0" <?php selected(get_option('asmsl_display_page_choice'), '0'); ?>><?php echo esc_html__('No', 'asmsl_domain') ?></option>
        <option value="1" <?php selected(get_option('asmsl_display_page_choice'), '1'); ?>><?php echo esc_html__('Yes', 'asmsl_domain') ?></option>
    </select>
<?php }

function urlPageChoiceHTML() { ?>
    <input type="text" name="asmsl_url_page_choice" 
    value="<?php echo esc_attr(get_option('asmsl_url_page_choice', the_permalink())) ?>"
    <?php if(!verify()) { echo 'disabled';} ?>
    >
    <p class="description"><?php echo esc_html__('Leaving blank will use the default Post URL.', 'asmsl_domain') ?></p>
<?php }

function contentPageChoiceHTML() { ?>
    <input type="text" name="asmsl_content_page_choice" value="<?php echo esc_attr(get_option('asmsl_content_page_choice', '')) ?>"
    <?php if(!verify()) { echo 'disabled';} ?>
    >
    <p class="description"><?php echo esc_html__('Leaving blank will use the default Post Excerpt.', 'asmsl_domain') ?></p>
<?php }

function titlePageChoiceHTML() { ?>
    <input type="text" name="asmsl_title_page_choice" value="<?php echo esc_attr(get_option('asmsl_title_page_choice', '')) ?>"
    <?php if(!verify()) { echo 'disabled';} ?>
    >
    <p class="description"><?php echo esc_html__('Leaving blank will use the default Post Title.', 'asmsl_domain') ?></p>
<?php }