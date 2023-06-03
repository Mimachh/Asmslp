<?php

    //Modify the content
    function ifWrap($content) {
        // if(is_main_query() AND is_single() AND (
        //     isset(get_option("asmslp_social_choice")['fcb']) == '1' OR
        //     isset(get_option("asmslp_social_choice")['twt']) == '2' OR
        //     isset(get_option("asmslp_social_choice")['insta']) == '3' OR
        //     isset(get_option("asmslp_social_choice")['messenger']) == '4' OR
        //     isset(get_option("asmslp_social_choice")['mail']) == '5' OR
        //     isset(get_option("asmslp_social_choice")['telegram']) == '6' OR
        //     isset(get_option("asmslp_social_choice")['whatsapp']) == '7' OR
        //     isset(get_option("asmslp_social_choice")['pinterest']) == '8' OR
        //     isset(get_option("asmslp_social_choice")['digg']) == '9' OR
        //     isset(get_option("asmslp_social_choice")['reddit']) == '10' OR
        //     isset(get_option("asmslp_social_choice")['linkedin']) == '11' OR
        //     isset(get_option("asmslp_social_choice")['stumbleupon']) == '12' OR
        //     isset(get_option("asmslp_social_choice")['tumblr']) == '13'
        // )) {
        //     return $this->createSingleHTML($content);
        // } else if(get_post_type() === 'page-1') {
        //     return $this->createPageHTML($content);
        // }
    
        // return $content;

        

      

        if(
            // CHECK RS
            isset(get_option("asmslp_social_choice")['fcb']) == '1' OR
            isset(get_option("asmslp_social_choice")['twt']) == '2' OR
            isset(get_option("asmslp_social_choice")['insta']) == '3' OR
            isset(get_option("asmslp_social_choice")['messenger']) == '4' OR
            isset(get_option("asmslp_social_choice")['mail']) == '5' OR
            isset(get_option("asmslp_social_choice")['telegram']) == '6' OR
            isset(get_option("asmslp_social_choice")['whatsapp']) == '7' OR
            isset(get_option("asmslp_social_choice")['pinterest']) == '8' OR
            isset(get_option("asmslp_social_choice")['digg']) == '9' OR
            isset(get_option("asmslp_social_choice")['reddit']) == '10' OR
            isset(get_option("asmslp_social_choice")['linkedin']) == '11' OR
            isset(get_option("asmslp_social_choice")['stumbleupon']) == '12' OR
            isset(get_option("asmslp_social_choice")['tumblr']) == '13' OR 
            isset(get_option("asmslp_social_choice")['copy_link']) == '14'
        ) {
            // ALL SINGLE AND CUSTOM POST
            if(is_main_query() AND is_single() AND is_singular()) {
            
                if (is_singular('post')) {
                    if(esc_html(get_option('asmsl_display_choice') == '1')) {
                        return createSingleHTML($content);
                        
                    } else {
                        return $content;
                    }
                } else if(!empty(get_option('asmsl_custom_post_type_page')) AND verify()) {
                    foreach(get_option('asmsl_custom_post_type_page') as $index => $item) {
                        if($item == 1 AND is_singular($index)) {
                            return createPageHTML($content);
                        }
                    }
                } else {
                    return $content;
                }
            } 
            // ALL PAGES
            else if(is_page()) {
                
                if(esc_html(get_option('asmsl_display_page_choice') == '1')) {
                    return createPageHTML($content);
                } else {
                    return $content;
                }       
            }

        } else {
            return $content;
        }
    }