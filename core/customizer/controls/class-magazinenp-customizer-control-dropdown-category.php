<?php
/**
 * Custom Controls of theme
 *
 * @package MagazineNP
 */

class MagazineNP_Customizer_Control_Dropdown_Category extends WP_Customize_Control
{
    public $type = 'magazinenp_dropdown_category';


    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {
        parent::__construct($manager, $id, $args);
    }

    public function to_json()
    {
        parent::to_json();

        if (isset($this->default)) {
            $this->json['default'] = $this->default;
        } else {
            $this->json['default'] = $this->setting->default;
        }
        $this->json['value'] = $this->value();
        $this->json['choices'] = $this->choices;
        $this->json['link'] = $this->get_link();
        $this->json['id'] = $this->id;
        $this->json['post_categories'] = get_categories();


        $this->json['inputAttrs'] = '';
        foreach ($this->input_attrs as $attr => $value) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr($value) . '" ';
        }

    }

    protected function content_template()
    {

        ?>
        <# if ( data.label ) { #>
        <span class="customize-control-title">{{{ data.label }}}</span>
        <# } #>
        <# if ( data.description ) { #>
        <span class="description customize-control-description">{{{ data.description }}}</span>
        <# }
        #>
        <select {{{ data.link }}} {{{ data.inputAttrs }}} id="{{{ data.id }}}">
            <#
            if(data.post_categories){
            for ( key in data.post_categories ) {
            #>
            <option value="{{{ data.post_categories[key].term_id }}}">
                {{{ data.post_categories[key].name }}}
            </option>
            <#
            }
            }
            #>
        </select>
        <?php
    }

}