<?php

    function postShortcodeSection() { ?>
        <p class="description"><?php echo esc_html__('For more customisation you can copy and paste the shortcode on the Post or Page you want.', 'asmsl_domain') ?></p>
    <?php }

    function postShortCodeHTML() { 
            
        $phpCode = "&lt;?php echo do_shortcode('[asmslp_single_shortcode]'); ?&gt;";
        ?>
        <input style="width: 300px;" name="asmsl_post_shortcode" type="text" disabled value="[asmslp_single_shortcode]">
        <p class="description"><?php echo esc_html__('You can add it to your code using :', 'asmsl_domain') ?> <?php echo $phpCode; ?></p>
    <?php }

    function pageShortCodeHTML() { 
        $phpCode = "&lt;?php echo do_shortcode('[asmslp_page_shortcode]'); ?&gt;";
        ?>
        <input style="width: 300px;" name="asmsl_page_shortcode" type="text" disabled value="[asmslp_page_shortcode]">
        <p class="description"><?php echo esc_html__('You can add it to your code using :', 'asmsl_domain') ?> <?php echo $phpCode; ?></p>
    <?php }


    // Forth Page Shortcode
    function shortcodeSubPage() { ?>
        <div class="wrap">
            <h1>ASMSL ShortCode</h1>
                <form action="" method="">
                    <?php
                        settings_fields('shortcodePage');
                        do_settings_sections('asmsl-shortcode');
                        
                    ?> 
                </form>       
        </div>
    <?php }