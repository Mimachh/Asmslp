<?php

function settings() {
    add_settings_section('asmsl-options-section', esc_html__('Posts and Single', 'asmsl_domain'), array($this, 'singleSection'), 'asmsl-options');


    register_setting('sharingChoice', 'asmsl_display_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "1"));
    add_settings_field('display-single-choice', esc_html__('Do you want to display Social Media on Post ?', 'asmsl_domain'), array($this, 'displaySingleChoiceHTML'), 'asmsl-options', 'asmsl-options-section');

    register_setting('sharingChoice', 'asmsl_title_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
    add_settings_field('title-choice', esc_html__('Custom the shared Title', 'asmsl_domain'), array($this, 'titleChoiceHTML'), 'asmsl-options', 'asmsl-options-section');

    register_setting('sharingChoice', 'asmsl_content_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
    add_settings_field('content-choice', esc_html__('Custom the shared Content', 'asmsl_domain'), array($this, 'contentChoiceHTML'), 'asmsl-options', 'asmsl-options-section');

    register_setting('sharingChoice', 'asmsl_url_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
    add_settings_field('url-choice', esc_html__('Custom the shared URL', 'asmsl_domain'), array($this, 'urlChoiceHTML'), 'asmsl-options', 'asmsl-options-section');




    add_settings_section('asmsl-options-last-section', esc_html__('Pages', 'asmsl_domain'), array($this, 'pageSection'), 'asmsl-options');
    
    register_setting('sharingChoice', 'asmsl_display_page_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "0"));
    add_settings_field('display-page-choice', esc_html__('Do you want to display Social Media on Pages ?', 'asmsl_domain'), array($this, 'displayPageChoiceHTML'), 'asmsl-options', 'asmsl-options-last-section');

    register_setting('sharingChoice', 'asmsl_title_page_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
    add_settings_field('title-page-choice', esc_html__('Custom the shared Title', 'asmsl_domain'), array($this, 'titlePageChoiceHTML'), 'asmsl-options', 'asmsl-options-last-section');
    
    register_setting('sharingChoice', 'asmsl_content_page_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
    add_settings_field('content-page-choice', esc_html__('Custom the shared Content', 'asmsl_domain'), array($this, 'contentPageChoiceHTML'), 'asmsl-options', 'asmsl-options-last-section');

    register_setting('sharingChoice', 'asmsl_url_page_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
    add_settings_field('url-page-choice', esc_html__('Custom the shared URL', 'asmsl_domain'), array($this, 'urlPageChoiceHTML'), 'asmsl-options', 'asmsl-options-last-section');



    add_settings_section('asmsl-shortcode-single', esc_html__('Posts Shortcode', 'asmsl_domain'), array($this, 'postShortcodeSection'), 'asmsl-shortcode');

    register_setting('shortcodePage', 'asmsl_post_shortcode', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
    add_settings_field('shortcode-post', esc_html__('Retrieve the Posts\'s Shortcode', 'asmsl_domain'), array($this, 'postShortCodeHTML'), 'asmsl-shortcode', 'asmsl-shortcode-single');

    add_settings_section('asmsl-shortcode-page', esc_html__('Pages Shortcode', 'asmsl_domain'), array($this, 'postShortcodeSection'), 'asmsl-shortcode');

    register_setting('shortcodePage', 'asmsl_page_shortcode', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
    add_settings_field('shortcode-page', esc_html__('Retrieve the Pages\'s Shortcode', 'asmsl_domain'), array($this, 'pageShortCodeHTML'), 'asmsl-shortcode', 'asmsl-shortcode-page');


    // Page for Custom Post Type
    add_settings_section('asmsl-custom-post-type_first_section',  esc_html__('Custom Post Type', 'asmsl_domain'), array($this, 'customPostTypeSection'), 'asmsl-custom-post-type');
    register_setting('customPostTypePage', 'asmsl_custom_post_type_page');
    add_settings_field('asmsl_custom_post_type_page', esc_html__('Choose where to display your Social media', 'asmsl_domain'), array($this, 'customPostTypeHTML'), 'asmsl-custom-post-type', 'asmsl-custom-post-type_first_section');
}