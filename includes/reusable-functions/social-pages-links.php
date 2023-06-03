<?php

    function socialPageLink($link, $svg) { 
        // SIZE
        if(esc_html(get_option('asmslp_icon_size')) == "small") {
            $size = "icons-h-25";
        } else if (esc_html(get_option('asmslp_icon_size')) == "medium") {
            $size = "icons-h-35";  
        } else if (esc_html(get_option('asmslp_icon_size')) == "large") {
            $size = "icons-h-40";
        }
        // BORDER RADIUS
        if(esc_html(get_option('asmslp_icon_radius')) == 'round') {
            $borderRadius = "border-radius";  
        } else if(esc_html(get_option('asmslp_icon_radius')) == 'square') {
            $borderRadius = "square";
        }

        // ANIMATION
        switch (esc_html(get_option('asmslp_icon_hover', ''))) {
            case 'translateY':
                $translateY = 'translateY';
                $deroule ='';
                $animationDuration ='';
                $infinite = '';
                break;
            case 'fadeOut':
                $translateY = '';
                $deroule = 'linear';
                $animationDuration = '1.5s';
                $animationName = 'fadeOut';
                $infinite = 'infinite';
                break;
            case 'scale':
                $translateY = '';
                $deroule = 'ease';
                $animationDuration = '1s';
                $animationName = 'scale';
                $infinite = 'infinite';
                break;
            case 'bounce':
                $translateY = '';
                $deroule = 'ease';
                $animationDuration = '1.2s';
                $animationName = 'bounce';
                $infinite = 'infinite';
                break;
            case 'hiThere':
                $translateY = '';
                $deroule = 'ease';
                $animationDuration = '1s';
                $animationName = 'hiThere';
                $infinite = 'infinite';
                break;
            case 'flash':
                $translateY = '';
                $deroule = 'ease';
                $animationDuration = '500ms';
                $animationName = 'flash';
                $infinite = 'infinite';
                break;
            case 'gelatine':
                $translateY = '';
                $deroule = '';
                $animationDuration = '0.9s';
                $animationName = 'gelatine';
                $infinite = 'infinite';
                break; 
            case 'shake':
                $translateY = '';
                $deroule = 'ease';
                $animationDuration = '2s';
                $animationName = 'shake';
                $infinite = 'infinite';
                break;
            case 'flip':
                $translateY = '';
                $deroule = 'ease';
                $animationDuration = '2s';
                $animationName = 'flip';
                $infinite = 'infinite';
                break; 
            case 'pulse':
                $translateY = '';
                $deroule = 'ease-in-out';
                $animationDuration = '1s';
                $animationName = 'pulse';
                $infinite = 'alternate';
                break;     
            default:
                $translateY = '';
                $animationDuration ='';
                $infinite = '';
        }

        $classes = "'. $size .' . $borderRadius .";



        return '<a id="'. $translateY .'"  class="icons '. $classes .'" href="'. $link . '" style="--animation: '.  esc_html( get_option('asmslp_icon_hover', '')) .'; --animation-duration: '. $animationDuration .'; --deroule: '. $deroule .'; --isInfinite: '. $infinite .' ;" target="_blank">'. $svg. '</a>';
    }