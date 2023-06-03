<?php

/*
    Plugin Name: ASMSL
    Description: The simplest and most complete way to include Social Share Links to your website.
    Version: 1
    Author: MimacH
    Text Domain: asmsl_domain
    Domain Path: /languages

*/

if( ! defined( 'ABSPATH') ) exit;


// require_once dirname(dirname(__FILE__)) . '/includes/settings.php';

require_once('licence/verification.php');


require_once('includes/reusable-functions/radio-button.php');
require_once('includes/reusable-functions/social-articles-links.php');
require_once('includes/reusable-functions/social-pages-links.php');
require_once('includes/reusable-functions/html-public-icons.php');


require_once('includes/first-page/form.php');
require_once('includes/options-page/global-form.php');
require_once('includes/options-page/articles/createHTML.php');
require_once('includes/options-page/articles/form-fields.php');
require_once('includes/options-page/pages/createHTML.php');
require_once('includes/options-page/pages/form-fields.php');
require_once('includes/style-page/form.php');
require_once('includes/shortcode-page/form.php');
require_once('includes/custom-post-type-page/form.php');

require_once('includes/layout/ifWrap.php');



class ASMSL2Plugin {
    function __construct() {
        add_action('admin_menu', array($this, 'mainMenu'));
        add_action('admin_init', array($this, 'settings'));
        
        add_action('init', array($this, 'languages'));
        add_filter('the_content', 'ifWrap');
        add_action( 'wp_enqueue_scripts', array($this, 'asmsl_load_plugin_css') );

        add_action( 'wp_enqueue_scripts', array($this, 'asmsl_load_plugin_js') );

        add_shortcode('asmslp_single_shortcode', 'createSingleHTML');


        // ShortCode For Pages
        add_shortcode('asmslp_page_shortcode', 'createPageHTML');
    }


    function languages() {
        load_plugin_textdomain('asmsl_domain', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    function settings() {
        add_settings_section('asmsl-options-section', esc_html__('Posts and Single', 'asmsl_domain'), 'singleSection', 'asmsl-options');


        register_setting('sharingChoice', 'asmsl_display_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "1"));
        add_settings_field('display-single-choice', esc_html__('Do you want to display Social Media on Post ?', 'asmsl_domain'), 'displaySingleChoiceHTML', 'asmsl-options', 'asmsl-options-section');

        register_setting('sharingChoice', 'asmsl_title_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
        add_settings_field('title-choice', esc_html__('Custom the shared Title', 'asmsl_domain'), 'titleChoiceHTML', 'asmsl-options', 'asmsl-options-section');

        register_setting('sharingChoice', 'asmsl_content_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
        add_settings_field('content-choice', esc_html__('Custom the shared Content', 'asmsl_domain'), 'contentChoiceHTML', 'asmsl-options', 'asmsl-options-section');

        register_setting('sharingChoice', 'asmsl_url_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
        add_settings_field('url-choice', esc_html__('Custom the shared URL', 'asmsl_domain'), 'urlChoiceHTML', 'asmsl-options', 'asmsl-options-section');

    
 

        add_settings_section('asmsl-options-last-section', esc_html__('Pages', 'asmsl_domain'), 'pageSection', 'asmsl-options');
        
        register_setting('sharingChoice', 'asmsl_display_page_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "0"));
        add_settings_field('display-page-choice', esc_html__('Do you want to display Social Media on Pages ?', 'asmsl_domain'), 'displayPageChoiceHTML', 'asmsl-options', 'asmsl-options-last-section');

        register_setting('sharingChoice', 'asmsl_title_page_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
        add_settings_field('title-page-choice', esc_html__('Custom the shared Title', 'asmsl_domain'), 'titlePageChoiceHTML', 'asmsl-options', 'asmsl-options-last-section');
        
        register_setting('sharingChoice', 'asmsl_content_page_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
        add_settings_field('content-page-choice', esc_html__('Custom the shared Content', 'asmsl_domain'), 'contentPageChoiceHTML', 'asmsl-options', 'asmsl-options-last-section');

        register_setting('sharingChoice', 'asmsl_url_page_choice', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
        add_settings_field('url-page-choice', esc_html__('Custom the shared URL', 'asmsl_domain'), 'urlPageChoiceHTML', 'asmsl-options', 'asmsl-options-last-section');



        add_settings_section('asmsl-shortcode-single', esc_html__('Posts Shortcode', 'asmsl_domain'), 'postShortcodeSection', 'asmsl-shortcode');

        register_setting('shortcodePage', 'asmsl_post_shortcode', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
        add_settings_field('shortcode-post', esc_html__('Retrieve the Posts\'s Shortcode', 'asmsl_domain'), 'postShortCodeHTML', 'asmsl-shortcode', 'asmsl-shortcode-single');

        add_settings_section('asmsl-shortcode-page', esc_html__('Pages Shortcode', 'asmsl_domain'), 'postShortcodeSection', 'asmsl-shortcode');

        register_setting('shortcodePage', 'asmsl_page_shortcode', array('sanitize_callback' => 'sanitize_text_field', 'default' =>  "Empty"));
        add_settings_field('shortcode-page', esc_html__('Retrieve the Pages\'s Shortcode', 'asmsl_domain'), 'pageShortCodeHTML', 'asmsl-shortcode', 'asmsl-shortcode-page');


        // Page for Custom Post Type
        add_settings_section('asmsl-custom-post-type_first_section',  esc_html__('Custom Post Type', 'asmsl_domain'), 'customPostTypeSection', 'asmsl-custom-post-type');
        register_setting('customPostTypePage', 'asmsl_custom_post_type_page');
        add_settings_field('asmsl_custom_post_type_page', esc_html__('Choose where to display your Social media', 'asmsl_domain'), 'customPostTypeHTML', 'asmsl-custom-post-type', 'asmsl-custom-post-type_first_section');
    }


    function mainMenu() {
        $mainPageHook = add_menu_page('ASMSL',  esc_html__('ASMSL Settings', 'asmsl_domain'), 'manage_options', 'asmsl', 'asmslPage', "data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIKIHdpZHRoPSIxMDI0LjAwMDAwMHB0IiBoZWlnaHQ9IjEwMjQuMDAwMDAwcHQiIHZpZXdCb3g9IjAgMCAxMDI0LjAwMDAwMCAxMDI0LjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgoKPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsMTAyNC4wMDAwMDApIHNjYWxlKDAuMTAwMDAwLC0wLjEwMDAwMCkiCmZpbGw9IiMwMDAwMDAiIHN0cm9rZT0ibm9uZSI+CjxwYXRoIGQ9Ik00ODEwIDg2MjMgYy03MDkgLTc0IC0xMjk1IC0zMDYgLTE4MzQgLTcyNSAtNTk3IC00NjQgLTEwNTAgLTExOTAKLTEyMTUgLTE5NDUgLTU4IC0yNjQgLTc1IC00MzUgLTc1IC03NDggMCAtMzQ5IDI2IC01NjYgMTA1IC04NjIgMTYxIC02MDYgNDYzCi0xMTI3IDkwOSAtMTU3MyAyNTEgLTI1MCA1MDYgLTQzNSA4MzQgLTYwNSAzNTcgLTE4NiA3NTEgLTMwNiAxMTcxIC0zNTcgMTY0Ci0yMCA2NTQgLTE3IDgxOCA1IDY3OSA5MSAxMjc0IDM0OCAxNzc3IDc2OSA1MTMgNDMwIDkxMCAxMDQxIDEwOTUgMTY4MyA1MQoxNzggODYgMzUyIDExMSA1NDEgMjEgMTYwIDI1IDU5NiA2IDc1OSAtMTEwIDk2MyAtNjAwIDE4MjQgLTEzNjggMjQwMSAtNDgxCjM2MiAtMTAzNyA1NzcgLTE2NzQgNjQ5IC0xMjMgMTQgLTU1NSAxOSAtNjYwIDh6IG0zMzMgLTkxMSBjMjYgLTU5IDQ3IC0xMTEKNDcgLTExNSAwIC00IDEzIC0zNSAyOSAtNjkgMTUgLTM1IDQ1IC0xMDMgNjUgLTE1MyAyMSAtNDkgNDEgLTk5IDQ2IC0xMTAgNAotMTEgMTcgLTQwIDI3IC02NSAxMSAtMjUgMjcgLTYyIDM2IC04MyA5IC0yMSAxNyAtNDQgMTcgLTUxIDAgLTggNyAtMTkgMTUKLTI2IDggLTcgMTUgLTE5IDE1IC0yNyAwIC0xNSAzMSAtOTAgNTUgLTEzNSA4IC0xNCAxNSAtMzMgMTUgLTQxIDAgLTkgNiAtMjgKMTQgLTQ0IDcgLTE1IDIwIC00NCAyOCAtNjMgMjEgLTUxIDQyIC05OSA2NyAtMTUxIDExIC0yNSAyMSAtNTEgMjEgLTU4IDAgLTYKNCAtMTkgOSAtMjkgNiAtOSAxOSAtMzkgMzEgLTY3IDEyIC0yNyAyOCAtNjMgMzYgLTc4IDggLTE2IDE0IC0zNyAxNCAtNDcgMAotOSA3IC0yMyAxNSAtMzAgOCAtNyAxNSAtMTkgMTUgLTI3IDAgLTggNiAtMjkgMTQgLTQ2IDQxIC05MCA1NiAtMTI3IDU2IC0xMzYKMCAtNSA2IC0yMiAxNCAtMzggMTkgLTM5IDQwIC04OCA2NSAtMTUzIDEyIC0zMCAyNiAtNjQgMzEgLTc1IDEyIC0yOCA0MyAtMTAxCjY0IC0xNTUgMjUgLTYyIDQ2IC0xMTAgNjIgLTE0MyA4IC0xNiAxNCAtMzMgMTQgLTM4IDAgLTkgMTMgLTQyIDUwIC0xMjQgNQotMTEgMTggLTQyIDI5IC03MCAxMCAtMjcgMjIgLTU3IDI1IC02NSAzIC04IDEwIC0yMiAxNSAtMzAgNSAtOCAxNyAtMzUgMjYKLTYwIDkgLTI1IDIzIC01OCAzMCAtNzUgNyAtMTYgMjIgLTU1IDM1IC04NSAxMyAtMzAgMjkgLTcxIDM4IC05MCA4IC0xOSAyMQotNTEgMjkgLTcwIDggLTE5IDIxIC00OCAyOSAtNjMgOCAtMTYgMTQgLTMzIDE0IC0zOSAwIC01IDYgLTI0IDE0IC00MSA0MSAtOTEKNTYgLTEyNyA1NiAtMTM3IDAgLTUgNCAtMTggMTAgLTI4IDUgLTkgMjYgLTU3IDQ1IC0xMDcgMjAgLTQ5IDQzIC0xMDMgNTEKLTEyMCA3IC0xNiAyNSAtNTkgMzggLTk1IDIwIC01NSA1MiAtMTMxIDk1IC0yMzUgNSAtMTEgMTkgLTQ1IDMxIC03NSAxMSAtMzAKMjUgLTY0IDMwIC03NSAyMCAtNDQgNjQgLTE1NCA5MSAtMjI3IGwyOCAtNzggLTI4MyAwIC0yODMgMCAtNDkgMTE1IGMtMjYgNjQKLTU3IDEyNCAtNjkgMTM0IC0xMSAxMCAtMTAzIDc0IC0yMDUgMTQyIC0yODMgMTkwIC0xMzU2IDkzNyAtMTM3MCA5NTQgLTExIDEzCi01IDE1IDQxIDE1IDMwIDAgMjg1IDAgNTY3IDAgNDEwIDAgNTEyIDIgNTEyIDEyIDAgNyAtMjAgNjAgLTQ0IDExOCAtMjUgNTgKLTY4IDE2MSAtOTYgMjMwIC0yOCA2OSAtNTUgMTM0IC02MCAxNDUgLTIwIDQ0IC00MCA5MyAtNjUgMTU1IC0xNCAzNiAtMzAgNzQKLTM1IDg1IC01IDExIC0zMiA3NiAtNjAgMTQ1IC0xNzkgNDM4IC0yOTQgNzAzIC0zMDggNzA4IC02IDIgLTEyIC0yIC0xMiAtOCAwCi05IC05OSAtMjQ2IC0yMjAgLTUyNSAtMjAgLTQ3IC00MSAtOTcgLTg5IC0yMTAgLTI3IC02NiAtOTUgLTIyOCAtMTUxIC0zNjAKLTU2IC0xMzIgLTEyNCAtMjk0IC0xNTEgLTM2MCAtMjggLTY2IC01NCAtMTI5IC01OSAtMTQwIC01IC0xMSAtNDEgLTk2IC04MAotMTkwIC0zOSAtOTMgLTc1IC0xNzkgLTgwIC0xOTAgLTE3IC0zOSAtNDAgLTkyIC0xMTAgLTI2MCAtMzkgLTkzIC03NSAtMTc5Ci04MCAtMTkwIC0xMyAtMzEgLTMyIC03NCAtMTI1IC0yOTUgLTQ4IC0xMTMgLTkyIC0yMTEgLTk3IC0yMTcgLTggLTEwIC03OQotMTMgLTI5NCAtMTMgbC0yODMgMCAxMyAzOCBjMTIgMzMgMzAgNzMgODIgMTg5IDggMTcgMTQgMzQgMTQgMzcgMCAzIDExIDI5CjI0IDU4IDEzIDI5IDUwIDExNCA4MSAxODggMzIgNzQgNjMgMTQ5IDcxIDE2NSA3IDE3IDQzIDEwMiA3OSAxOTAgMzcgODggNzAKMTY5IDc1IDE4MCA1IDExIDQxIDk3IDgwIDE5MCAzOSA5NCA3NSAxNzkgODAgMTkwIDMwIDcwIDQzIDEwMCA4MCAxOTAgMjMgNTUKNjEgMTQ3IDg1IDIwNSAyNCA1OCA2MCAxNDYgODAgMTk1IDIwIDUwIDQwIDk5IDQ1IDExMCA1IDExIDI1IDYxIDQ1IDExMCAyMAo1MCA0MiAxMDQgNTAgMTIwIDcgMTcgMzYgODYgNjUgMTU1IDUyIDEyMyA2NiAxNTggOTQgMjIzIDcgMTcgMzEgNzMgNTEgMTIyCjIxIDUwIDUxIDExOCA2NyAxNTMgMTUgMzQgMjggNjcgMjggNzMgMCA2IDYgMjMgMTMgMzcgMjMgNDQgNDUgOTQgNjcgMTUyIDEyCjMwIDI1IDYyIDMwIDcxIDQgOCAzNCA3NiA2NSAxNTAgMzEgNzQgNzAgMTYyIDg2IDE5NyAxNiAzNCAyOSA2NiAyOSA3MSAwIDUgNgoyMiAxNCAzOCA4IDE1IDE5IDM5IDI0IDUzIDE2IDM5IDkzIDIyMSAxMDggMjU4IDggMTcgMjAgNDcgMjggNjUgNyAxNyAyMSA0OQozMCA3MCA5IDIxIDE2IDQzIDE2IDUwIDAgMTUgMjggNTcgMzkgNTcgNCAwIDI4IC00OSA1NCAtMTA4eiBtLTI3MDkgLTQzMTQKYy0zIC00IC0xIC04IDQgLTggNSAwIDQyIC00MyA4MiAtOTYgNTQ0IC03MjQgMTMyNiAtMTE3MSAyMjMwIC0xMjc1IDE1NSAtMTgKODAwIC0xNyA4MDAgMSAwIDQgMTggNiAzOSA1IDIxIDAgMzcgLTMgMzQgLTcgLTIgLTUgLTE0IC04IC0yNyAtOCAtMTIgMCAtMjYKLTMgLTMwIC03IC0zOSAtMzkgLTY0OSAtNTMgLTg4NiAtMjAgLTMzNiA0NyAtNjE0IDEyNCAtODkwIDI0NSAtMzcxIDE2NCAtNzAxCjM5MSAtOTkwIDY4MiAtMTI1IDEyNSAtMzMyIDM3MyAtMzM2IDQwMSAtMSA1IC0yIDE0IC0zIDIwIDAgNSAtNiA3IC0xMyAzIC02Ci00IC04IC0zIC00IDQgMyA2IC0yIDE1IC0xMSAyMSAtMTAgNiAtMTQgMTEgLTEwIDExIDQgMCAzIDggLTIgMTggLTcgMTQgLTYKMTkgNCAxOSA4IDAgMTIgLTQgOSAtOXoiLz4KPC9nPgo8L3N2Zz4=", 100);
        add_submenu_page('asmsl', 'Choose your socials medias', esc_html__('Choose your socials medias', 'asmsl_domain'), 'manage_options', 'asmsl', 'asmslPage');
        $optionsPageHook = add_submenu_page('asmsl', 'ASMSL Options', 'Options', 'manage_options', 'asmsl-options', 'optionsSubPage');
        $stylePageHook = add_submenu_page('asmsl', 'ASMSL Style', 'Style', 'manage_options', 'asmsl-style', 'styleSubPage');
        $shortCodePageHook = add_submenu_page('asmsl', 'ASMSL Shortcode', 'Shortcode', 'manage_options', 'asmsl-shortcode', 'shortcodeSubPage');
        $customPostPageHook = add_submenu_page('asmsl', 'ASMSL Custom Post Type', 'Custom Post Type', 'manage_options', 'asmsl-custom-post-type', 'customPostTypeSubPage');
        add_action("load-{$mainPageHook}", array($this, 'mainPageAssets'));
        add_action("load-{$stylePageHook}", array($this, 'mainPageAssets'));
        add_action("load-{$optionsPageHook}", array($this, 'mainPageAssets'));
        add_action("load-{$shortCodePageHook}", array($this, 'mainPageAssets'));
        add_action("load-{$customPostPageHook}", array($this, 'mainPageAssets'));

    }

    function asmsl_load_plugin_js() {
        $plugin_url = plugin_dir_url( __FILE__ );
        wp_enqueue_script( 'js_main', $plugin_url . 'js.js');
    }

    function asmsl_load_plugin_css() {
        $plugin_url = plugin_dir_url( __FILE__ );
        wp_enqueue_style( 'style1', $plugin_url . 'styles/css/style-public.css');
    }

    function mainPageAssets() {
        wp_enqueue_style('asmslAdminCss', plugin_dir_url(__FILE__) . '/styles/css/style-admin.css');
    }

}

$aSMSL2Plugin = new ASMSL2Plugin();