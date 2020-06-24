<?php
/**
 * Custom Controls of theme
 *
 * @package MagazineNP
 */

class MagazineNP_Customizer_Control_Radio extends WP_Customize_Control
{
    private $has_images = false;

    public $type = 'magazinenp_radio';

    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {

        parent::__construct($manager, $id, $args);

        $this->has_images = isset($args['has_images']) ? (boolean)($args['has_images']) : false;
    }

    public function enqueue()
    {
        $css_uri = MAGAZINENP_THEME_URI . 'core/customizer/controls/radio/';

        wp_enqueue_style('magazinenp-control-radio-style', $css_uri . 'radio.css', null, MAGAZINENP_THEME_VERSION);

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
        $this->json['has_images'] = $this->has_images;

        $this->json['inputAttrs'] = '';
        foreach ($this->input_attrs as $attr => $value) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr($value) . '" ';
        }

    }

    public function content_template()
    {

        ?>
        <#
        var class_name = data.has_images ? 'with-images':'';

        #>
        <div class="mb-radio-control-wrap {{class_name}}">
            <# if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>
            <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
            <ul class="mb-radio-control">
                <# for ( key in data.choices ) {
                var selected_class =   ( key === data.value ) ? 'selected':'';
                #>
                    <li class="{{selected_class}}">
                        <input {{{ data.inputAttrs }}}
                               type="radio" value="{{ key }}"
                               name="_customize-control-radio-{{{ data.id }}}"
                               id="{{ data.id }}{{ key }}"
                               {{{ data.link }}} <# if ( key === data.value ) { #> checked="checked" <# } #>/>

                        <label for="{{data.id}}{{key}}">
                            <#
                            var title = data.choices[key].title!=="undefined" ? data.choices[key].title: data.choices[key];

                            if(data.has_images){

                            var image = data.choices[key].image!=="undefined" ? data.choices[key].image: data.choices[key];
                            #>
                            <img src="{{image}}"/>
                            <#
                                if(title){

                                    #>
                                    <span class="choice-title"> {{{title}}} </span>
                                    <#
                                }
                             }else{
                                #>
                                {{{title}}}
                                <#
                            }#>
                        </label>
                        <span class="checkmark"></span>
                    </li>
                <# } #>
            </ul>
        </div>
        <?php
    }
}
