<?php

function createSingleHTML($content) {

    // VARIABLES
    $beginingOfPost = '0';
    $endOfPost = '1';
    $rightFixed = '2';
    $leftFixed = '3';
    $rightPost = '4';
    $leftPost = '5';


    if(get_option('asmsl_title_choice')) {
        $title = esc_html(get_option('asmsl_title_choice'));
    } else {
        if(!empty(get_the_title())) {
            $title = esc_html(get_the_title());
        } else {
            $title = "...";
        }
        
    }

    if(get_option('asmsl_content_choice')) {
        $contentshared = get_option('asmsl_content_choice');
    } else {
        if(has_excerpt()) {
            $contentshared = esc_html(get_the_excerpt());
        } else {
            $contentshared = "...";
        }
        
    }

    if(get_option('asmsl_url_choice')) {
        $url = esc_html(get_option('asmsl_url_choice'));
    } else {
        $url = get_the_permalink();
    }

    


    switch(esc_html(get_option('asmslp_location'))) {
        case $beginingOfPost:
            $allDivSocialMedia = "asmsl_div_begining_end_post";
            break;
        case $endOfPost:
            $allDivSocialMedia = "asmsl_div_begining_end_post";
            break; 
        case $rightFixed:
            $allDivSocialMedia = "asmsl_div_fixed-right";
            break;
        case $leftFixed:
            $allDivSocialMedia = "asmsl_div_fixed-left";
            break;
        case $leftPost:
            $allDivSocialMedia = "asmsl_div_fixed-left";
            break;
        case $rightPost:
            $allDivSocialMedia = "asmsl_div_fixed-right";
            break;                
        default:
            $allDivSocialMedia = "";
    }

    
    $html = wichRSToDisplay($allDivSocialMedia, $title, $contentshared, $url);

    if(is_singular('post')) {
        if(esc_html(get_option('asmslp_location', '0')) == $beginingOfPost) {
            return 
            $display = '<div class="">
                <div class="">'. $html .'</div>
                <div>'. $content .'</div>
            </div>';
            
        } else if (esc_html(get_option('asmslp_location', '1')) == $endOfPost) {
            return 
            $display = '<div class="">
                <div>'. $content .'</div>
                <div class="">'. $html .'</div> 
            </div>';
        } else if (esc_html(get_option('asmslp_location', '2')) == $rightFixed) {
            return 
            $display = '<div class="fixed-right">
                <div class="rs_div_fixed">'. $html .'</div>
                <div>'. $content .'</div>
            </div>';
        } else if (esc_html(get_option('asmslp_location', '3')) == $leftFixed) {
            return 
            $display = '<div class="fixed-left">
                <div class="rs_div_fixed">'. $html .'</div>
                <div>'. $content .'</div>
            </div>';
        } else if (esc_html(get_option('asmslp_location', '4')) == $rightPost) {
            return 
            $display = '<div class="right-of-post">
                <div class="rs_div_fixed">'. $html .'</div>
                <div>'. $content .'</div>
            </div>';
        } else if (esc_html(get_option('asmslp_location', '5')) == $leftPost) {
            return 
            $display = '<div class="left-of-post">
                <div class="rs_div_fixed">'. $html .'</div>
                <div>'. $content .'</div>
            </div>';
        }
        return $display = $content . $html;
    } else {
        return $content;
    }

}