<?php

    // Third Page Verify Form
    function handleStyleForm() { 

        if(wp_verify_nonce($_POST['ourNonce'], 'asmslForm') AND current_user_can('manage_options')) {

            if (
                isset($_POST['asmslp_icon_size']) AND
                esc_html($_POST['asmslp_icon_size']) === 'small' OR
                esc_html($_POST['asmslp_icon_size']) === 'medium' OR
                esc_html($_POST['asmslp_icon_size']) === 'large'
                ) {
                update_option('asmslp_icon_size', $_POST['asmslp_icon_size']);
                $response1 = 'ok';
            } else {
                $response1 = 'nope';
            }
            
            if (
                isset($_POST['asmslp_icon_radius']) AND
                esc_html($_POST['asmslp_icon_radius']) === 'square' OR
                esc_html($_POST['asmslp_icon_radius']) === 'round'
            ) 
            {
                update_option('asmslp_icon_radius', $_POST['asmslp_icon_radius']);
                $response2 = 'ok';
            } else {
                $response2 = 'nope';
            }
        
            if(verify()) {
                if ( 
                    isset($_POST['asmslp_icon_hover']) AND
                    esc_html($_POST['asmslp_icon_hover']) === 'translateY' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'fadeOut' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'scale' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'bounce' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'hiThere' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'flash' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'gelatine' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'shake' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'flip' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'pulse'
                ) {
                    update_option('asmslp_icon_hover', $_POST['asmslp_icon_hover']);
                    $response3 = 'ok';
                } else {
                    $response3 = 'nope';
                } 
            } else if(!verify()) {
                if ( 
                    isset($_POST['asmslp_icon_hover']) AND
                    esc_html($_POST['asmslp_icon_hover']) === 'translateY' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'fadeOut' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'scale' OR
                    esc_html($_POST['asmslp_icon_hover']) === 'pulse'
                ) {
                    update_option('asmslp_icon_hover', $_POST['asmslp_icon_hover']);
                    $response3 = 'ok';
                } else {
                    $response3 = 'nope';
                } 
            }
            
            // Message Verify
            if(
                $response1 === 'ok' AND $response2 ==='ok' AND $response3 ==='ok'
            ) {

                $message = esc_html__('Options saved.', 'asmsl_domain');
            } else {
                $message = esc_html__('Something goes wrong try again.', 'asmsl_domain');
            }
        
            ?>

            <div class="updated">
                <p><?php echo $message; ?></p>
            </div> 
        <?php } else { ?>
            <p><?php echo esc_html__('Sorry, you do not have permission to perform that action.', 'asmsl_domain'); ?></p>
        <?php }

    }

    // Third Page Form
    function styleSubPage() { 
     
        ?>
           <div class="wrap">
            <h1>ASMSL Style</h1>

            <?php if (isset($_POST['justsubmitted']) == 'true') handleStyleForm()
            ?>
            
            <form  method="POST" id="asmsl_form">
            
                <input type="hidden" name="justsubmitted" value="true">
                <?php wp_nonce_field('asmslForm', 'ourNonce'); 
                settings_errors(); 
                ?>
                <div class="asmslp_section_form asmsl_form_mt-45">
                    <h2 class="asmsl_form_label"><?php echo esc_html__('Icon Style', 'asmsl_domain'); ?></h2>
                    <fieldset>
                        <label class="fieldset_label"  for="asmslp_icon_size"><?php echo esc_html__('Choose the size of your icons', 'asmsl_domain'); ?></label>
                        <select name="asmslp_icon_size" id="asmslp_icon_size">
                            <option value="small" <?php selected(get_option('asmslp_icon_size'), 'small'); ?>><?php echo esc_html__('Small', 'asmsl_domain'); ?></option>
                            <option value="medium" <?php selected(get_option('asmslp_icon_size'), 'medium'); ?>><?php echo esc_html__('Medium', 'asmsl_domain'); ?></option>
                            <option value="large" <?php selected(get_option('asmslp_icon_size'), 'large'); ?>><?php echo esc_html__('Large', 'asmsl_domain'); ?></option>
                        </select>
                    </fieldset>

                    <fieldset class="asmslp_flex_center">
                        <?php 
                            $optionsRadius = get_option('asmslp_icon_radius'); 
                            $fieldNameRadius = 'asmslp_icon_radius';
                        ?>
                        <label class="fieldset_label" for="<?php echo $fieldNameRadius; ?>"><?php echo esc_html__('Choose the form of your icons :', 'asmsl_domain'); ?></label>
                        <div>
                            <?php 
                                radioChoice('square', esc_html__('Square', 'asmsl_domain'), $optionsRadius, $fieldNameRadius, 'true'); 
                                radioChoice('round', esc_html__('Round', 'asmsl_domain'), $optionsRadius, $fieldNameRadius, 'false'); 

                            ?>
                        </div>

    
                    </fieldset>
                </div>


                <hr>

                <fieldset class="asmsl_form_mt-45">
                    <h2 class="asmsl_form_label"><?php echo esc_html__('Animation Hover', 'asmsl_domain'); ?></h2>
                    <div class="asmsl_form_mt-45 asmslp_flex_center">
                        <?php 
                            $options = get_option('asmslp_icon_hover'); 
                            $fieldNameHover = 'asmslp_icon_hover';
                        ?>
                        <label class="fieldset_label" for="<?php echo $fieldNameHover; ?>"><?php echo esc_html__('Select an Hover animation :', 'asmsl_domain'); ?></label>
                        <div class="">
                            
                            <?php 
                                radioChoice('translateY', 'Translate Y', $options, $fieldNameHover, 'true'); 
                                radioChoice('fadeOut', 'Fade Out', $options, $fieldNameHover, 'false'); 
                                radioChoice('scale', 'Scale', $options, $fieldNameHover, 'false');
                                radioChoice('pulse', 'Pulse', $options, $fieldNameHover, 'false');
                                radioChoice('bounce', 'Bounce', $options, $fieldNameHover, 'false', !verify());
                                radioChoice('hiThere', 'Hi There !', $options, $fieldNameHover, 'false', !verify());
                                radioChoice('flash', 'Flash', $options, $fieldNameHover, 'false', !verify());
                                radioChoice('gelatine', 'Gelatine', $options, $fieldNameHover, 'false', !verify());
                                radioChoice('shake', 'Shake', $options, $fieldNameHover, 'false', !verify());
                                radioChoice('flip', 'Flip', $options, $fieldNameHover, 'false', !verify());
                            ?>
                            
                        
                        </div>
                    </div>
                </fieldset>

                <input class="asmsl_form_mt-45 asmsl_form_submit btn-primary" type="submit" name="submit" id="submit" value="<?php echo esc_html__('Save Changes', 'asmsl_domain'); ?>">

            </form>
        </div>
    <?php }