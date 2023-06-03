<?php

    // First Page Verify Form
    function handleForm() { 
        if(wp_verify_nonce($_POST['ourNonce'], 'asmslForm') AND current_user_can('manage_options')) {

            if (esc_html(isset($_POST['asmslp_location']))) {
                update_option('asmslp_location', $_POST['asmslp_location']);
                $message = esc_html__('Options saved.', 'asmsl_domain');
            }
            
            if (esc_html(isset($_POST['asmslp_headline']))) {
                update_option('asmslp_headline', $_POST['asmslp_headline']);
                $message = esc_html__('Options saved.', 'asmsl_domain');
            }
    
            if (isset($_POST['asmslp_social_choice'])) {
    
                if(isset($_POST['asmslp_social_choice']['fcb']) AND $_POST['asmslp_social_choice']['fcb'] != false AND $_POST['asmslp_social_choice']['fcb'] != '1') {
                    $message = 'Something gone wrong with the Facebook choice.';
                } else if(isset($_POST['asmslp_social_choice']['twt']) AND $_POST['asmslp_social_choice']['twt'] != false AND $_POST['asmslp_social_choice']['twt'] != '2') {
                    $message = 'Something gone wrong with the Twitter choice.';
                } else if(isset($_POST['asmslp_social_choice']['insta']) AND $_POST['asmslp_social_choice']['insta'] != false AND $_POST['asmslp_social_choice']['insta'] != '3') {
                    $message = 'pb avec insta.';
                } else if(isset($_POST['asmslp_social_choice']['digg']) AND $_POST['asmslp_social_choice']['digg'] != false AND $_POST['asmslp_social_choice']['digg'] != '9') {
                    $message = 'Something gone wrong with the Digg choice.';
                }  else if(isset($_POST['asmslp_social_choice']['reddit']) AND $_POST['asmslp_social_choice']['reddit'] != false AND $_POST['asmslp_social_choice']['reddit'] != '10') {
                    $message = 'Something gone wrong with the Reddit choice.';
                } else if(isset($_POST['asmslp_social_choice']['tumblr']) AND $_POST['asmslp_social_choice']['tumblr'] != false AND $_POST['asmslp_social_choice']['tumblr'] != '13') {
                    $message = 'Something gone wrong with the Tumblr choice.';
                } else if(isset($_POST['asmslp_social_choice']['copy_link']) AND $_POST['asmslp_social_choice']['copy_link'] != false AND $_POST['asmslp_social_choice']['copy_link'] != '14') {
                    $message = 'Something gone wrong with the Copy choice.';
                } else if(isset($_POST['asmslp_social_choice']['mail']) AND $_POST['asmslp_social_choice']['mail'] != false AND $_POST['asmslp_social_choice']['mail'] != '5') {
                    $message = 'Something gone wrong with the Mail choice.';
                } else if(isset($_POST['asmslp_social_choice']['messenger']) AND $_POST['asmslp_social_choice']['messenger'] != false AND $_POST['asmslp_social_choice']['messenger'] != '4') {
                    $message = 'Something gone wrong with the Messenger choice.';
                }  else if(isset($_POST['asmslp_social_choice']['telegram']) AND $_POST['asmslp_social_choice']['telegram'] != false AND $_POST['asmslp_social_choice']['telegram'] != '6') {
                    $message = 'Something gone wrong with the Telegram choice.';
                } else if(isset($_POST['asmslp_social_choice']['whatsapp']) AND $_POST['asmslp_social_choice']['whatsapp'] != false AND $_POST['asmslp_social_choice']['whatsapp'] != '7') {
                    $message = 'Something gone wrong with the Whatsapp choice.';
                } else if(isset($_POST['asmslp_social_choice']['pinterest']) AND $_POST['asmslp_social_choice']['pinterest'] != false AND $_POST['asmslp_social_choice']['pinterest'] != '8') {
                    $message = 'Something gone wrong with the Pinterest choice.';
                } else if(isset($_POST['asmslp_social_choice']['linkedin']) AND $_POST['asmslp_social_choice']['linkedin'] != false AND $_POST['asmslp_social_choice']['linkedin'] != '11') {
                    $message = 'Something gone wrong with the Linkedin choice.';
                }  else if(isset($_POST['asmslp_social_choice']['stumbleupon']) AND $_POST['asmslp_social_choice']['stumbleupon'] != false AND $_POST['asmslp_social_choice']['stumbleupon'] != '12') {
                    $message = 'Something gone wrong with the StumbleUpon choice.';
                } 

                else {
                    update_option('asmslp_social_choice', $_POST['asmslp_social_choice']);
                    $message = 'Options saved.';
                }
               
    
                
                
            } else if (!isset($_POST['asmslp_social_choice'])) { 
                $message = esc_html__('You need to choose at least one social media.', 'asmsl_domain');
            }
          
            ?>
    
            <div class="updated">
                <p><?php echo $message; ?></p>
            </div> 
        <?php } else { ?>
            <p><?php echo  esc_html__('Sorry, you do not have permission to perform that action.', 'asmsl_domain'); ?></p>
        <?php }

    }


    // First Page Form
    function asmslPage() { ?>
        <div class="wrap">
            <h1>ASMSL Settings</h1>

            <?php if (isset($_POST['justsubmitted']) == 'true') handleForm() ?>

            <form  method="POST" id="asmsl_form">
                
                <input type="hidden" name="justsubmitted" value="true">
                <?php wp_nonce_field('asmslForm', 'ourNonce'); ?>

                <!-- Location Icons -->
                <div class="asmsl_form_mt-45">
                    <label class="asmsl_form_label" for="asmslp_location"><?php echo esc_html__('Display Location', 'asmsl_domain') ?></label>
                    <select name="asmslp_location" id="asmslp_location">
                        <option value="0" <?php selected(get_option('asmslp_location'), '0'); ?>><?php echo esc_html__('Begining of post', 'asmsl_domain') ?></option>
                        <option value="1" <?php selected(get_option('asmslp_location'), '1'); ?>><?php echo esc_html__('End of post', 'asmsl_domain') ?></option>
                        <option value="2" <?php selected(get_option('asmslp_location'), '2'); ?>><?php echo esc_html__('Right Screen Fixed', 'asmsl_domain') ?></option>
                        <option value="3" <?php selected(get_option('asmslp_location'), '3'); ?>><?php echo esc_html__('Left Screen Fixed', 'asmsl_domain') ?></option>
                        <option value="4" <?php selected(get_option('asmslp_location'), '4'); ?>><?php echo esc_html__('Right of post', 'asmsl_domain') ?></option>
                        <option value="5" <?php selected(get_option('asmslp_location'), '5'); ?>><?php echo esc_html__('Left of post', 'asmsl_domain') ?></option>
                    </select>
                </div>

                <!-- Headline Text -->
                <div class="asmsl_form_mt-45">
                    <label class="asmsl_form_label" for="asmslp_headline"><?php echo esc_html__('Headline Text', 'asmsl_domain') ?></label>
                    <input type="text" name="asmslp_headline" id="asmslp_headline" value="<?php echo esc_attr(get_option('asmslp_headline')); ?>">
                </div>

                <!-- Choose Your Social Media -->
                <div class="asmsl_form_checbox_div asmsl_form_mt-45">
                    <?php 
                        $options = get_option('asmslp_social_choice');
                        $fieldNameSocialMediaChoice = 'asmslp_social_choice';

                        function checkboxSocialMedia($name, $value, $fullName, $options, $dashicon, $verify = true) { ?>
                            <div class="asmslp_checkbox_social_media">
                                <input 
                                type="checkbox" 
                                name="asmslp_social_choice[<?php echo $name; ?>]" 
                                id="<?php echo $name; ?>" 
                                value="<?php echo $value; ?>" 
                                <?php checked(isset($options[$name])); ?>
                                <?php if(!$verify) { echo 'disabled'; } ?>
                                >

                                <label for="<?php echo $name; ?>"><span class="<?php echo $dashicon; ?>"></span> <?php echo $fullName; ?></label> 
                            </div>
                        <?php }
                    ?>
                    <label class="asmsl_form_label" for="<?php echo $fieldNameSocialMediaChoice; ?>"><?php echo esc_html__('Choose your social media', 'asmsl_domain') ?></label>
                    <div class="asmslp_div_all_checkbox">
                        <?php 
                            checkboxSocialMedia('fcb', '1', 'Facebook', $options, 'dashicons dashicons-facebook');
                            checkboxSocialMedia('twt', '2', 'Twitter', $options, 'dashicons dashicons-twitter');
                            checkboxSocialMedia('mail', '5', 'Mail', $options, 'dashicons dashicons-email-alt');
                            checkboxSocialMedia('insta', '3', 'Instagram', $options, 'dashicons dashicons-instagram');
                            checkboxSocialMedia('digg', '9', 'Digg', $options, 'fa-brands fa-digg');
                            checkboxSocialMedia('reddit', '10', 'Reddit', $options, 'dashicons dashicons-reddit');
                            checkboxSocialMedia('tumblr', '13', 'Tumblr', $options, 'fa-brands fa-square-tumblr');
                            checkboxSocialMedia('copy_link', '14', 'Copy to clipboard', $options, 'dashicons dashicons-clipboard');
                            checkboxSocialMedia('messenger', '4', 'Messenger', $options, 'fa-brands fa-facebook-messenger', verify());
                            checkboxSocialMedia('telegram', '6', 'Telegram', $options, 'fa-brands fa-telegram', verify());
                            checkboxSocialMedia('whatsapp', '7', 'Whatsapp', $options, 'dashicons dashicons-whatsapp', verify());
                            checkboxSocialMedia('pinterest', '8', 'Pinterest', $options, 'dashicons dashicons-pinterest', verify());
                            checkboxSocialMedia('linkedin', '11', 'Linkedin', $options, 'dashicons dashicons-linkedin', verify());
                            checkboxSocialMedia('stumbleupon', '12', 'StumbleUpon', $options, 'fa-brands fa-stumbleupon-circle', verify());
                            
                            
                            
                        ?>
                        
                    </div>
                </div>

                <input class="asmsl_form_mt-45 asmsl_form_submit btn-primary" type="submit" name="submit" id="submit" value="<?php echo esc_html__('Save Changes', 'asmsl_domain') ?>">

            </form>
        </div>
    <?php }