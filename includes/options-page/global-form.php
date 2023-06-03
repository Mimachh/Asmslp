<?php

    // Second Page Form
    function optionsSubPage() { ?>
    
        <div class="wrap">
            <h1>ASMSL Options</h1>
            <form action="options.php" method="POST">
                <?php
                    settings_errors();
                    settings_fields('sharingChoice');
                    do_settings_sections('asmsl-options');
                    submit_button();

                ?>
            </form>
        </div>

    <?php }