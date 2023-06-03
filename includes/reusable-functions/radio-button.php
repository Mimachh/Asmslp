<?php

function radioChoice($name, $fullName, $options, $fieldName, $isFirstChecked, $disabled = false ) { ?>
    <div>
        <input type="radio" id="<?php echo $name; ?>" name="<?php echo $fieldName; ?>" value="<?php echo $name; ?>"
        <?php if($isFirstChecked === 'true') { echo 'checked'; } ?>
        <?php checked($options, $name); ?>
        <?php if($disabled) { echo 'disabled';} ?>
        >
        
        <label for="<?php echo $name; ?>"><?php echo $fullName; ?></label>
    </div>
<?php }