<?php

    function sanitizeCustomPostType($input) {
        if($input != '0' AND $input != '1') {
            add_settings_error('asmsl_custom_post_type_page', 'asmsl_custom_post_type_page_error', 'Erreur');
            return get_option('asmsl_custom_post_type_page');
        }

        return $input;
    }

    function customPostTypeSection() { ?>
        <p class="description"><?php echo esc_html__('On which Custom Post Page do you want to display Socials Medias?', 'asmsl_domain') ?></p>
    <?php }


    function customPostTypeHTML() { ?> 
        <!-- GET THE CUSTOM POST TYPE  -->
            <?php
                
            $args=array(
                'public'                => true,
                'exclude_from_search'   => false,
                '_builtin'              => false
            ); 
            
            $output = 'names'; // names or objects, note names is the default
            $operator = 'and'; // 'and' or 'or'
            $post_types = get_post_types($args,$output,$operator);
            
            $posttypes_array = array();

            $options = get_option('asmsl_custom_post_type_page');
        

            $fieldNameCustomPostTypeChoice = 'asmsl_custom_post_type_page';

            foreach ($post_types  as $post_type ) {
                $posttypes_array[] = $post_type; ?>

                <div class="">
                    <input type="checkbox" 
                    name="asmsl_custom_post_type_page[<?php echo $post_type; ?>]" 
                    id="<?php echo $post_type; ?>" 
                    value="1" 
                    <?php checked(esc_html(!empty(get_option('asmsl_custom_post_type_page')[$post_type])), '1'); ?>
                    <?php if(!verify()) { echo 'disabled';} ?>
                    >

                    <label for="<?php echo $post_type; ?>"><?php echo ucfirst($post_type); ?></label> 
                </div>
            <?php }
            
        ?>
    <?php }

    // Custom Post Type
    function customPostTypeSubPage() { ?>
        <div class="wrap">
            <h1><?php echo esc_html__('Custom Post Type Settings', 'asmsl_domain') ?></h1>

            <form action="options.php"  method="POST" >
                
            <?php 
                settings_fields('customPostTypePage');
                do_settings_sections('asmsl-custom-post-type');
               
                if(verify()) {
                    submit_button();
                }
            ?>
            </form>
        </div>
    <?php }