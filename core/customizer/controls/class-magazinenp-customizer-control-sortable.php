<?php
if (!class_exists('WP_Customize_Control'))
    return;

/**
 * Class to create a custom tags control
 */
class MagazineNP_Customizer_Control_Sortable extends WP_Customize_Control
{
    /**
     * The type of control being rendered
     */
    public $type = 'magazinenp_sortable';

    /**
     * Enqueue our scripts and styles
     */

    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {

        parent::__construct($manager, $id, $args);

        $this->hide_disable_option = isset($args['hide_disable_option']) ? (boolean)($args['hide_disable_option']) : false;
    }

    public function enqueue()
    {

        $script_uri = MAGAZINENP_THEME_URI . 'core/customizer/controls/sortable/';

        wp_enqueue_script('magazinenp-sortable-control-js', $script_uri . 'sortable.js', array('jquery'), MAGAZINENP_THEME_VERSION, true);

        wp_enqueue_style('magazinenp-sortable-control-css', $script_uri . 'sortable.css', array(), MAGAZINENP_THEME_VERSION);


    }


    public function render_content()
    {
        $defaults = isset($this->setting->default) ? $this->setting->default : array();

        $field_value = $this->value();

        $value_array = array();
        try {
            $value_array = is_string($field_value) ? json_decode($field_value, true) : $field_value;

        } catch (Exception $e) {

            $value_array = array();
        }
        $value_array = empty($value_array) ? array_keys($defaults) : $value_array;

        $control_class = 'magazinenp-sortable-control';

        $control_class .= $this->hide_disable_option ? ' hide-disable-option' : '';
        ?>
        <div class="<?php echo esc_attr($control_class); ?>">
            <?php
            echo '<div class="magazinenp-field-header">';
            if (!empty($this->label)) {
                echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
            }
            if (!empty($this->description)) {
                echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
            }
            if (!empty($icon)) {
                echo '<span class="' . esc_attr($icon) . '"></span>';
            }
            echo '</div>';
            ?>
            <div class="magazinenp-sortable-control-field">
                <?php foreach ($value_array as $sortable_index => $sortable_value) {
                    $text = isset($defaults[$sortable_index]['title']) ? $defaults[$sortable_index]['title'] : '';
                    if (!empty($text)) {
                        $data_disable = isset($sortable_value['disable']) ? (boolean)$sortable_value['disable'] : 0;
                        ?>
                        <div class="magazinenp-sortable-item" data-disable="<?php echo(absint($data_disable)) ?>"
                             data-item-id="<?php echo esc_attr($sortable_index) ?>">
                            <div class="magazinenp-sortable-item-heading">
                                <?php if (!$this->hide_disable_option) { ?>
                                    <label class="magazinenp-sortable-show" title="Toggle item show">
                                        <span class="rp-show-icon dashicons dashicons-visibility"></span>
                                        <span class="screen-reader-text"><?php echo esc_html__('Show', 'magazinenp'); ?></span></label>
                                <?php } ?>
                                <span class="magazinenp-sortable-title"><?php echo esc_html($text); ?></span>

                            </div>
                            <i class="dashicons dashicons-menu"></i>
                        </div>
                    <?php }
                }
                ?>

            </div>
            <input type="hidden"
                   id="<?php echo esc_attr($this->id); ?>"
                   name="<?php echo esc_attr($this->id); ?>"
                   class="customize-control-repeator-value" <?php $this->link(); ?>
            />
        </div>
        <?php
    }

}