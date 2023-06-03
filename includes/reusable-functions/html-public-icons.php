<?php

function wichRSToDisplay($allDivSocialMedia, $title, $contentshared, $url) {

    $html = '<div class="'. $allDivSocialMedia .'"><h3>' . esc_html( get_option('asmslp_headline', esc_html__('Share on your social media.', 'asmsl_domain')))  . '</h3>
    <div class="asmsl_rs_div">';


    if(isset(get_option("asmslp_social_choice")['fcb']) == '1') {
        $html .= 
        socialLink(
            'Facebook',
            'https://www.facebook.com/sharer.php?u='. $title .' : '. $contentshared .'.  '. $url .'', 
            '<svg class="" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Facebook-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-200.000000, -160.000000)" fill="#4460A0"> <path d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z" id="Facebook"> </path> </g> </g> </g></svg>'
        );
    }

    if(isset(get_option("asmslp_social_choice")['twt']) == '2') {
        $html .= 
        socialLink(
            'Twitter',
            'https://twitter.com/intent/tweet?text='. $title . ' : '. $contentshared .'&url='. $url .'&via=Mamie_Jacquotte',
            '<svg class="" fill="#1DA1F2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve" stroke="#1DA1F2"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M-143,145v512h512V145H-143z M215.2,361.2c0.1,2.2,0.1,4.5,0.1,6.8c0,69.5-52.9,149.7-149.7,149.7 c-29.7,0-57.4-8.7-80.6-23.6c4.1,0.5,8.3,0.7,12.6,0.7c24.6,0,47.3-8.4,65.3-22.5c-23-0.4-42.5-15.6-49.1-36.5 c3.2,0.6,6.5,0.9,9.9,0.9c4.8,0,9.5-0.6,13.9-1.9C13.5,430-4.6,408.7-4.6,383.2v-0.6c7.1,3.9,15.2,6.3,23.8,6.6 c-14.1-9.4-23.4-25.6-23.4-43.8c0-9.6,2.6-18.7,7.1-26.5c26,31.9,64.7,52.8,108.4,55c-0.9-3.8-1.4-7.8-1.4-12 c0-29,23.6-52.6,52.6-52.6c15.1,0,28.8,6.4,38.4,16.6c12-2.4,23.2-6.7,33.4-12.8c-3.9,12.3-12.3,22.6-23.1,29.1 c10.6-1.3,20.8-4.1,30.2-8.3C234.4,344.5,225.5,353.7,215.2,361.2z"></path> </g></svg>'
        );

    }

    if(verify()) {
        if(isset(get_option("asmslp_social_choice")['messenger']) == '4') {
            $html .= 
            socialLink(
                'Messenger',
                'https://www.facebook.com/dialog/share?text='. $url .'&title='. $title .': '. $contentshared .'',
                '<svg class="icons" xmlns="http://www.w3.org/2000/svg" aria-label="Messenger" role="img" viewBox="0 0 512 512" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect width="512" height="512" rx="15%" fill="#ffffff"></rect><linearGradient id="a" x1="256" x2="256" y1="78.2" y2="441.2" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00B2FF"></stop><stop offset="1" stop-color="#006AFF"></stop></linearGradient><path fill="url(#a)" d="M256 78.2c-102.4 0-181.8 75 -181.8 176.4c0 53 21.7 98.8 57 130.4a14.7 14.7 0 015 10.4l1 32.3a14.6 14.6 0 0020.4 12.9l36-16a14.5 14.5 0 019.8-.7a197.8 197.8 0 0052.6 7c102.4 0 181.8-75 181.8 -176.3S358.4 78.2 256 78.2z"></path><path fill="#ffffff" d="M146.8 306.1l53.4-84.7a27.3 27.3 0 0139.5-7.3l42.5 31.9a11 11 0 0013 0l57.5-43.6c7.6-5.8 17.6 3.4 12.5 11.5l-53.4 84.7a27.3 27.3 0 01-39.4 7.3L229.9 274a11 11 0 00-13.2 0l-57.4 43.6c-7.6 5.8-17.6 -3.4 -12.5 -11.5z"></path></g></svg>'
            );
        } 
    }

    if(isset(get_option("asmslp_social_choice")['insta']) == '3') {
        $html .= 
        socialLink(
            'Instagram',
            'link', 
            '<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint0_radial_87_7153)"></rect> <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint1_radial_87_7153)"></rect> <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint2_radial_87_7153)"></rect> <path d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z" fill="white"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z" fill="white"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z" fill="white"></path> <defs> <radialGradient id="paint0_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)"> <stop stop-color="#B13589"></stop> <stop offset="0.79309" stop-color="#C62F94"></stop> <stop offset="1" stop-color="#8A3AC8"></stop> </radialGradient> <radialGradient id="paint1_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)"> <stop stop-color="#E0E8B7"></stop> <stop offset="0.444662" stop-color="#FB8A2E"></stop> <stop offset="0.71474" stop-color="#E2425C"></stop> <stop offset="1" stop-color="#E2425C" stop-opacity="0"></stop> </radialGradient> <radialGradient id="paint2_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)"> <stop offset="0.156701" stop-color="#406ADC"></stop> <stop offset="0.467799" stop-color="#6A45BE"></stop> <stop offset="1" stop-color="#6A45BE" stop-opacity="0"></stop> </radialGradient> </defs> </g></svg>'
        );
    }

    if(isset(get_option("asmslp_social_choice")['mail']) == '5') {
        $html .= 
        socialLink(
            'Mail',
            'mailto:?subject='. $title .'&body='. $contentshared .': '. $url . '',
            '<svg viewBox="7.086 -169.483 1277.149 1277.149" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="none" d="M1138.734 931.095h.283M1139.017 931.095h-.283"></path><path d="M1179.439 7.087c57.543 0 104.627 47.083 104.627 104.626v30.331l-145.36 103.833-494.873 340.894L148.96 242.419v688.676h-37.247c-57.543 0-104.627-47.082-104.627-104.625V111.742C7.086 54.198 54.17 7.115 111.713 7.115l532.12 394.525L1179.41 7.115l.029-.028z" fill="#e75a4d"></path><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"></stop><stop offset="1" stop-color="#e7e4d6"></stop></linearGradient><path fill="url(#a)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path><path fill="#e7e4d7" d="M148.96 242.419v688.676h989.774V245.877L643.833 586.771z"></path><path fill="#b8b7ae" d="M148.96 931.095l494.873-344.324-2.24-1.586L148.96 923.527z"></path><path fill="#b7b6ad" d="M1138.734 245.877l.283 685.218-495.184-344.324z"></path><path d="M1284.066 142.044l.17 684.51c-2.494 76.082-35.461 103.238-145.219 104.514l-.283-685.219 145.36-103.833-.028.028z" fill="#b2392f"></path><linearGradient id="b" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"></stop><stop offset="1" stop-color="#e7e4d6"></stop></linearGradient><path fill="url(#b)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path><linearGradient id="c" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"></stop><stop offset="1" stop-color="#e7e4d6"></stop></linearGradient><path fill="url(#c)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path><linearGradient id="d" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"></stop><stop offset="1" stop-color="#e7e4d6"></stop></linearGradient><path fill="url(#d)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path><linearGradient id="e" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"></stop><stop offset="1" stop-color="#e7e4d6"></stop></linearGradient><path fill="url(#e)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path><linearGradient id="f" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"></stop><stop offset="1" stop-color="#e7e4d6"></stop></linearGradient><path fill="url(#f)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path><linearGradient id="g" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"></stop><stop offset="1" stop-color="#e7e4d6"></stop></linearGradient><path fill="url(#g)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path><linearGradient id="h" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"></stop><stop offset="1" stop-color="#e7e4d6"></stop></linearGradient><path fill="url(#h)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path><path fill="#f7f5ed" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"></path></g></svg>'
        );
    }

    if(isset(get_option("asmslp_social_choice")['digg']) == '9') {
        $html .= 
        socialLink(
            'Digg',
            'http://www.digg.com/submit?url='. $url .'&text='. $title .'',
            '<svg fill="#000000" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="digg"> <rect x="17" y="15" width="2" height="4"></rect> <rect x="24" y="15" width="2" height="4"></rect> <path d="M29.016,0H2.984C1.336,0,0,1.336,0,2.984v26.031C0,30.664,1.336,32,2.984,32h26.031C30.664,32,32,30.664,32,29.016V2.984 C32,1.336,30.664,0,29.016,0z M11,21H5v-8h4V9h2V21z M14,21h-2v-8h2V21z M14,12h-2v-2h2V12z M21,24h-6v-2h4v-1h-4v-8h6V24z M28,24 h-6v-2h4v-1h-4v-8h6V24z"></path> <rect x="7" y="15" width="2" height="4"></rect> </g> <g id="Layer_1"> </g> </g></svg>'
        );
    }

    if(isset(get_option("asmslp_social_choice")['reddit']) == '10') {
        $html .= 
        socialLink(
            'Reddit',
            'http://reddit.com/submit?url='. $url .'&title='. $title .': '. $contentshared .'',
            '<svg xmlns="http://www.w3.org/2000/svg" aria-label="Reddit" role="img" viewBox="0 0 512 512" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="512" height="512" rx="15%" fill="#f40"></rect> <g fill="#ffffff"> <ellipse cx="256" cy="307" rx="166" ry="117"></ellipse> <circle cx="106" cy="256" r="42"></circle> <circle cx="407" cy="256" r="42"></circle> <circle cx="375" cy="114" r="32"></circle> </g> <g stroke-linecap="round" stroke-linejoin="round" fill="none"> <path d="m256 196 23-101 73 15" stroke="#ffffff" stroke-width="16"></path> <path d="m191 359c33 25 97 26 130 0" stroke="#f40" stroke-width="13"></path> </g> <g fill="#f40"> <circle cx="191" cy="287" r="31"></circle> <circle cx="321" cy="287" r="31"></circle> </g> </g></svg>'
        );
    }

    if(isset(get_option("asmslp_social_choice")['tumblr']) == '13') {
        $html .= 
        socialLink(
            'Tumblr',
            'http://tumblr.com/widgets/share/tool?canonicalUrl='. $url .'',
            '<svg fill="#34526f" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z M185.2,515H185c-11,5.1-20.8,8.8-29.7,10.8c-8.9,2.1-18.5,3.1-28.8,3.1c-11.7,0-22.1-1.5-31-4.4c-9-3-16.7-7.2-23-12.6 c-6.4-5.5-10.8-11.3-13.2-17.5c-2.5-6.2-3.7-15.1-3.7-26.8v-89.8H27.3v-36.2c10.1-3.3,18.7-8,25.9-14.1c7.2-6.1,12.9-13.4,17.3-22 c4.3-8.5,7.3-19.4,9-32.6h36.4v64.7h60.7v40.2h-60.7v65.6c0,14.9,0.8,24.4,2.4,28.6c1.6,4.2,4.5,7.6,8.8,10.1 c5.6,3.4,12.1,5.1,19.4,5.1c13,0,25.8-4.2,38.7-12.6V515z"></path> </g></svg>'
        ); 
    }

    if(isset(get_option("asmslp_social_choice")['copy_link']) == '14') {
        $html .= 
        socialLink(
            'Copy to clickboard',
            get_permalink(),
            '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.23001 18.25C6.17025 18.2535 5.15243 17.8363 4.40001 17.09C3.63614 16.2785 3.22341 15.1983 3.2515 14.0842C3.27958 12.97 3.74622 11.912 4.55001 11.14L8.31001 7.35C9.12729 6.50634 10.2456 6.0209 11.42 6C11.9475 6.00352 12.4692 6.11135 12.9549 6.3173C13.4406 6.52325 13.8807 6.82324 14.25 7.2C15.0243 8.01629 15.4433 9.10627 15.4152 10.231C15.387 11.3557 14.9141 12.4234 14.1 13.2L12.84 14.46C12.7713 14.5337 12.6885 14.5928 12.5965 14.6338C12.5045 14.6748 12.4052 14.6968 12.3045 14.6986C12.2038 14.7004 12.1038 14.6818 12.0104 14.6441C11.917 14.6064 11.8322 14.5503 11.761 14.479C11.6897 14.4078 11.6336 14.323 11.5959 14.2296C11.5582 14.1362 11.5396 14.0362 11.5414 13.9355C11.5432 13.8348 11.5652 13.7355 11.6062 13.6435C11.6472 13.5515 11.7063 13.4687 11.78 13.4L13 12.1C13.5247 11.6076 13.8338 10.9279 13.86 10.2088C13.8862 9.4897 13.6275 8.78933 13.14 8.26C12.6071 7.7953 11.9167 7.55197 11.2102 7.57986C10.5037 7.60774 9.83461 7.90474 9.34001 8.41L5.61001 12.19C5.09513 12.6812 4.79158 13.3535 4.76359 14.0646C4.73559 14.7757 4.98535 15.4698 5.46001 16C5.72088 16.2578 6.03529 16.4551 6.38093 16.5778C6.72657 16.7005 7.09497 16.7456 7.46001 16.71C7.55727 16.7004 7.65547 16.7101 7.74895 16.7386C7.84243 16.7671 7.92934 16.8139 8.00465 16.8762C8.07996 16.9385 8.14218 17.0151 8.18773 17.1015C8.23327 17.188 8.26124 17.2827 8.27001 17.38C8.28956 17.5775 8.23003 17.7747 8.10444 17.9284C7.97885 18.0821 7.79746 18.1798 7.60001 18.2L7.23001 18.25Z" fill="#000000"></path> <path d="M12.58 18C12.0525 17.9965 11.5308 17.8887 11.0451 17.6827C10.5594 17.4768 10.1193 17.1768 9.75 16.8C8.97574 15.9837 8.55674 14.8937 8.58486 13.769C8.61297 12.6443 9.08592 11.5766 9.9 10.8L11.16 9.54C11.2287 9.46632 11.3115 9.40721 11.4035 9.36622C11.4955 9.32523 11.5948 9.30319 11.6955 9.30141C11.7962 9.29964 11.8962 9.31816 11.9896 9.35588C12.083 9.3936 12.1678 9.44975 12.239 9.52097C12.3103 9.59218 12.3664 9.67702 12.4041 9.77041C12.4418 9.86379 12.4604 9.96382 12.4586 10.0645C12.4568 10.1652 12.4348 10.2645 12.3938 10.3565C12.3528 10.4485 12.2937 10.5313 12.22 10.6L11 11.9C10.4753 12.3924 10.1662 13.0721 10.14 13.7912C10.1138 14.5103 10.3726 15.2107 10.86 15.74C11.3929 16.2047 12.0833 16.448 12.7898 16.4201C13.4963 16.3923 14.1654 16.0953 14.66 15.59L18.43 11.81C18.9393 11.3134 19.2355 10.6383 19.256 9.92727C19.2766 9.21626 19.0198 8.52513 18.54 8C18.2791 7.7422 17.9647 7.54495 17.6191 7.42224C17.2734 7.29954 16.905 7.2544 16.54 7.29C16.4427 7.29964 16.3445 7.28992 16.2511 7.2614C16.1576 7.23287 16.0707 7.18612 15.9954 7.12382C15.9201 7.06153 15.8578 6.98493 15.8123 6.89846C15.7667 6.81199 15.7388 6.71735 15.73 6.62C15.7104 6.42248 15.77 6.22527 15.8956 6.07156C16.0212 5.91786 16.2025 5.82021 16.4 5.8C16.9821 5.73967 17.5704 5.80779 18.1233 5.99959C18.6762 6.19138 19.1803 6.50216 19.6 6.91C20.3639 7.72153 20.7766 8.80172 20.7485 9.91585C20.7204 11.03 20.2538 12.088 19.45 12.86L15.69 16.65C14.8727 17.4937 13.7544 17.9791 12.58 18Z" fill="#000000"></path> </g></svg>',
            'button'
        );

    }

    if (verify()) {

        if(isset(get_option("asmslp_social_choice")['telegram']) == '6') {
            $html .= 
            socialLink(
                'Telegram',
                'https://telegram.me/share/url?url='. $url .'&text='. $title .': '. $contentshared .'',
                '<svg xmlns="http://www.w3.org/2000/svg" aria-label="Telegram" role="img" viewBox="0 0 512 512" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect width="512" height="512" rx="15%" fill="#37aee2"></rect><path fill="#c8daea" d="M199 404c-11 0-10-4-13-14l-32-105 245-144"></path><path fill="#a9c9dd" d="M199 404c7 0 11-4 16-8l45-43-56-34"></path><path fill="#f6fbfe" d="M204 319l135 99c14 9 26 4 30-14l55-258c5-22-9-32-24-25L79 245c-21 8-21 21-4 26l83 26 190-121c9-5 17-3 11 4"></path></g></svg>'
            );
        }

        if(isset(get_option("asmslp_social_choice")['whatsapp']) == '7') {
            $html .= 
            socialLink(
                'Whatsapp',
                'whatsapp://send?text='. $title .': '. $contentshared .'. '. $url .'',
                '<svg xmlns="http://www.w3.org/2000/svg" aria-label="WhatsApp" role="img" viewBox="0 0 512 512" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect width="512" height="512" rx="15%" fill="#25d366"></rect><path fill="#25d366" stroke="#ffffff" stroke-width="26" d="M123 393l14-65a138 138 0 1150 47z"></path><path fill="#ffffff" d="M308 273c-3-2-6-3-9 1l-12 16c-3 2-5 3-9 1-15-8-36-17-54-47-1-4 1-6 3-8l9-14c2-2 1-4 0-6l-12-29c-3-8-6-7-9-7h-8c-2 0-6 1-10 5-22 22-13 53 3 73 3 4 23 40 66 59 32 14 39 12 48 10 11-1 22-10 27-19 1-3 6-16 2-18"></path></g></svg>'
            );
        }

        if(isset(get_option("asmslp_social_choice")['pinterest']) == '8') {
            $html .= 
            socialLink(
                'Pinterest',
                'http://pinterest.com/pin/create/button/?url='. $url .'&description='. $title .': '. $contentshared .'',
                '<svg fill="#E60023" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z M113,528.3c-12.6,0-24.8-1.9-36.3-5.3c4.9-7.7,10.2-17.6,12.9-27.4c1.6-5.7,9-35.2,9-35.2c4.4,8.5,17.4,15.9,31.3,15.9 c41.2,0,69.1-37.5,69.1-87.7c0-38-32.2-73.3-81-73.3c-60.8,0-91.5,43.6-91.5,80c0,22,8.3,41.6,26.2,48.9c2.9,1.2,5.5,0,6.4-3.2 c0.6-2.2,2-7.9,2.6-10.3c0.9-3.2,0.5-4.3-1.8-7.1c-5.1-6.1-8.4-13.9-8.4-25.1c0-32.3,24.2-61.3,63-61.3c34.4,0,53.3,21,53.3,49 c0,36.9-16.3,68-40.6,68c-13.4,0-23.4-11.1-20.2-24.6c3.8-16.2,11.3-33.7,11.3-45.4c0-10.5-5.6-19.2-17.3-19.2 c-13.7,0-24.7,14.2-24.7,33.1c0,12.1,4.1,20.2,4.1,20.2s-14,59.4-16.5,69.7c-2.3,9.7-2.6,20.5-2.2,29.4 C16.5,497.8-15,452.7-15,400.3c0-70.7,57.3-128,128-128s128,57.3,128,128S183.7,528.3,113,528.3z"></path> </g></svg>'
            );
        }
      

        if(isset(get_option("asmslp_social_choice")['linkedin']) == '11') {
            $html .= 
            socialLink(
                'Linkedin',
                'http://www.linkedin.com/shareArticle?mini=true&url='. $url .'&title='. $title .'&summary='. $contentshared .'&source='. get_site_url() .'',
                '<svg fill="#0A66C2" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>linkedin</title> <path d="M28.778 1.004h-25.56c-0.008-0-0.017-0-0.027-0-1.199 0-2.172 0.964-2.186 2.159v25.672c0.014 1.196 0.987 2.161 2.186 2.161 0.010 0 0.019-0 0.029-0h25.555c0.008 0 0.018 0 0.028 0 1.2 0 2.175-0.963 2.194-2.159l0-0.002v-25.67c-0.019-1.197-0.994-2.161-2.195-2.161-0.010 0-0.019 0-0.029 0h0.001zM9.9 26.562h-4.454v-14.311h4.454zM7.674 10.293c-1.425 0-2.579-1.155-2.579-2.579s1.155-2.579 2.579-2.579c1.424 0 2.579 1.154 2.579 2.578v0c0 0.001 0 0.002 0 0.004 0 1.423-1.154 2.577-2.577 2.577-0.001 0-0.002 0-0.003 0h0zM26.556 26.562h-4.441v-6.959c0-1.66-0.034-3.795-2.314-3.795-2.316 0-2.669 1.806-2.669 3.673v7.082h-4.441v-14.311h4.266v1.951h0.058c0.828-1.395 2.326-2.315 4.039-2.315 0.061 0 0.121 0.001 0.181 0.003l-0.009-0c4.5 0 5.332 2.962 5.332 6.817v7.855z"></path> </g></svg>'
            ); 
        }

        
        if(isset(get_option("asmslp_social_choice")['stumbleupon']) == '12') {
            $html .= 
            socialLink(
                'StumbleUpon',
                'http://www.stumbleupon.com/submit?url='. $url .'&title='. $title .': '. $contentshared .'',
                '<svg xmlns="http://www.w3.org/2000/svg" aria-label="StumbleUpon" role="img" viewBox="0 0 512 512" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect width="512" height="512" rx="15%" fill="#ea4b24"></rect><path fill="#ffffff" d="M362.2 397c-47.3 0-88.7-37.3-89-83.4v-59.2l29.4 22.6 33.5-24v61.6c0 10.9 14.7 20.6 26 20.6s21.9-9.7 21.9-20.6v-62.2h64v60.4a85 85 0 0 1-85.8 84.2zM256 173.8c-11.2 0-16.3 8.8-16.3 19.8V314c-.8 46.1-42.8 83-89.8 83A85 85 0 0 1 64 312.9v-59.6h63.3v59c0 10.8 11.5 19.8 22.7 19.8 11.3 0 25.2-9 25.2-19.9V190.3C176.7 145 210.7 109 257 109c46.6 0 77.5 36.3 79 81.7v26.8L306.7 236l-33.3-19.1v-23.3c0-11-6.2-19.8-17.4-19.8z"></path></g></svg>'
            );
        }

    }

    $html .= '</div></div>';

    return $html;
}