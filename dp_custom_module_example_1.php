<?php

class ET_Builder_Module_Divi_Custom_Module extends ET_Builder_Module {

    function init() {
        $this->name = 'My Custom Module';
        $this->slug = 'et_pb_my_custom_module';

        $this->main_css_element = '%%order_class%%';
        $this->whitelisted_fields = array(
            'text_field',
        );
        $this->fields_defaults = array(
            'text_field' => array('Default value for the text field', 'add_default_setting'),
        );
        $this->options_toggles = array(
            'general' => array(
                'toggles' => array(
                    'sg1' => 'Content Tab Subgroup',
                ),
            ),
        );
        $this->advanced_options = array(
            'fonts' => array(
                'text_field' => array(
                    'label' => 'Text Field',
                    'css' => array(
                        'main' => "%%order_class%% .our_custom_text_field_class",
                    ),
                    'line_height' => array('default' => '1em',),
                    'font_size' => array('default' => '14px',),
                ),
            ),
        );
        $this->custom_css_options = array(
            'text_field_css' => array(
                'label' => 'Text Field Custom CSS',
                'selector' => '.our_custom_text_field_class',
            ),
        );
    }

    function get_fields() {
        $fields = array(
            'text_field' => array(
                'label' => 'Text Field',
                'type' => 'text',
                'description' => 'Enter your text here',
                'toggle_slug' => 'sg1',
            ),
        );
        return $fields;
    }

    function shortcode_callback($atts, $content = null, $function_name) {
        $text_field = $this->shortcode_atts['text_field'];
        $module_class = ET_Builder_Element::add_module_order_class('', $function_name);
        ob_start();
        ?>
        <p class="our_custom_text_field_class"><?php echo $text_field; ?></p>
        <?php
        $output = ob_get_contents();
        ob_clean();
        $output = sprintf(
                '<div class="et_pb_module %1$s">%2$s</div>', ( '' !== $module_class ? sprintf(' %1$s', esc_attr($module_class)) : ''), $output
        );
        

        return $output;
    }

}

new ET_Builder_Module_Divi_Custom_Module;

