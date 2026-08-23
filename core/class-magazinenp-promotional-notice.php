<?php

/**
 * MagazineNP Promotional Notice Class
 * 
 * Handles promotional notices for MagazineNP Pro upgrade
 *
 * @package MagazineNP
 * @since 1.0.0
 */

if (!class_exists('MagazineNP_Promotional_Notice')) {

    class MagazineNP_Promotional_Notice
    {
        /**
         * Single instance of the class
         *
         * @var MagazineNP_Promotional_Notice
         */
        private static $instance = null;

        /**
         * Get single instance of the class
         *
         * @return MagazineNP_Promotional_Notice
         */
        public static function get_instance()
        {
            if (is_null(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Constructor
         */
        public function __construct()
        {
            $this->hooks();
        }

        /**
         * Initialize hooks
         */
        public function hooks()
        {
            // Promotional notice hooks
            add_action('admin_notices', array($this, 'show_promotional_notice'));
            add_action('wp_ajax_magazinenp_dismiss_promo', array($this, 'dismiss_promotional_notice'));
            add_action('admin_enqueue_scripts', array($this, 'enqueue_promotional_scripts'));
        }

        /**
         * Check if promotional notice should be displayed
         */
        private function should_show_promotional_notice()
        {
            // Don't show if MagazineNP Pro is already active
            if (class_exists('MagazineNP_Pro')) {
                return false;
            }

            $dismissed_data = get_option('magazinenp_promo_dismissed', array());
            
            // First time showing notice
            if (empty($dismissed_data)) {
                return true;
            }

            // Check if permanently dismissed
            if (isset($dismissed_data['permanent']) && $dismissed_data['permanent'] === true) {
                return false;
            }

            // Check if 15 days have passed since temporary dismissal
            if (isset($dismissed_data['temporary']) && isset($dismissed_data['dismissed_time'])) {
                $dismissed_time = $dismissed_data['dismissed_time'];
                $days_passed = (current_time('timestamp') - $dismissed_time) / (24 * 60 * 60);
                
                if ($days_passed < 15) {
                    return false;
                }
            }

            return true;
        }

        /**
         * Display promotional notice
         */
        public function show_promotional_notice()
        {
            if (!$this->should_show_promotional_notice()) {
                return;
            }

            $dismissed_data = get_option('magazinenp_promo_dismissed', array());
            $is_second_time = isset($dismissed_data['temporary']) && $dismissed_data['temporary'] === true;
            
            ?>
            <div id="magazinenp-promotional-notice" class="notice notice-success is-dismissible magazinenp-promo-notice" style="position: relative; background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border-left: 4px solid #f59e0b; padding: 20px; margin: 20px 0; border-radius: 0 12px 12px 0; box-shadow: 0 8px 24px rgba(245, 158, 11, 0.12);">
                <div style="display: flex; align-items: center; gap: 24px;">
                    <!-- Left Content -->
                    <div style="flex: 1;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                            <div style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; padding: 4px 12px; border-radius: 16px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">
                                🔥 20% OFF - Limited Time
                            </div>
                            <span style="color: #d97706; font-size: 12px; font-weight: 500;">
                                Premium Upgrade Offer
                            </span>
                        </div>
                        
                        <h3 style="margin: 0 0 8px 0; color: #92400e; font-size: 18px; font-weight: 700;">
                            MagazineNP Pro - Unlock Premium Features
                        </h3>
                        
                        <div style="display: flex; gap: 16px; margin-bottom: 4px;">
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <span style="color: #f59e0b; font-size: 14px;">🎨</span>
                                <span style="color: #78350f; font-size: 12px; font-weight: 500;">Advanced Typography</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <span style="color: #f59e0b; font-size: 14px;">🎨</span>
                                <span style="color: #78350f; font-size: 12px; font-weight: 500;">Advanced Colors</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <span style="color: #f59e0b; font-size: 14px;">🏗️</span>
                                <span style="color: #78350f; font-size: 12px; font-weight: 500;">Layout Options</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <span style="color: #f59e0b; font-size: 14px;">🧩</span>
                                <span style="color: #78350f; font-size: 12px; font-weight: 500;">Premium Widgets</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Side CTA -->
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <div style="text-align: right; margin-right: 8px;">
                            <div style="font-size: 24px; font-weight: 800; color: #d97706; line-height: 1;">20%</div>
                            <div style="color: #92400e; font-size: 11px; font-weight: 600;">DISCOUNT</div>
                        </div>
                        
                        <a href="https://mantrabrain.com/themes/magazinenp-pro/" target="_blank" class="button button-primary" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border: none; padding: 12px 24px; font-size: 14px; font-weight: 700; border-radius: 8px; text-decoration: none; color: white; box-shadow: 0 4px 16px rgba(245, 158, 11, 0.4); transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 6px;">
                            <span style="font-size: 16px;">🚀</span>
                            Upgrade Now
                        </a>
                        
                        <button type="button" class="button button-secondary magazinenp-dismiss-temporary" style="background: transparent; color: #92400e; border: 1px solid #fbbf24; padding: 8px 16px; font-size: 12px; border-radius: 6px; font-weight: 500;">
                            <?php $is_second_time ? esc_html_e('Close', 'magazinenp') : esc_html_e('Skip', 'magazinenp'); ?>
                        </button>
                    </div>
                </div>
            </div>
            
            <style>
            .magazinenp-promo-notice:hover {
                box-shadow: 0 12px 32px rgba(245, 158, 11, 0.18) !important;
                transform: translateY(-2px);
                transition: all 0.3s ease;
            }
            
            .magazinenp-promo-notice .button-primary:hover {
                background: linear-gradient(135deg, #d97706 0%, #b45309 100%) !important;
                transform: translateY(-2px);
                box-shadow: 0 6px 24px rgba(245, 158, 11, 0.5) !important;
            }
            
            .magazinenp-promo-notice .button-secondary:hover {
                background: #fef3c7 !important;
                color: #78350f !important;
                border-color: #f59e0b !important;
            }
            
            /* Hide default WordPress dismiss button */
            .magazinenp-promo-notice .notice-dismiss {
                display: none !important;
            }
            </style>
            <?php
        }

        /**
         * Handle AJAX dismissal of promotional notice
         */
        public function dismiss_promotional_notice()
        {
            check_ajax_referer('magazinenp_promo_nonce', 'nonce');
            
            $dismiss_type = isset($_POST['dismiss_type']) ? sanitize_text_field($_POST['dismiss_type']) : 'temporary';
            $dismissed_data = get_option('magazinenp_promo_dismissed', array());
            
            if ($dismiss_type === 'permanent') {
                $dismissed_data = array(
                    'permanent' => true,
                    'dismissed_time' => current_time('timestamp')
                );
            } else {
                // Check if this is the second temporary dismissal
                if (isset($dismissed_data['temporary']) && $dismissed_data['temporary'] === true) {
                    // Second dismissal - make it permanent
                    $dismissed_data = array(
                        'permanent' => true,
                        'dismissed_time' => current_time('timestamp')
                    );
                } else {
                    // First temporary dismissal
                    $dismissed_data = array(
                        'temporary' => true,
                        'dismissed_time' => current_time('timestamp')
                    );
                }
            }
            
            update_option('magazinenp_promo_dismissed', $dismissed_data);
            wp_die('success');
        }

        /**
         * Enqueue promotional notice scripts
         */
        public function enqueue_promotional_scripts($hook)
        {
            // Only load on admin pages
            if (!is_admin()) {
                return;
            }

            wp_enqueue_script('jquery');
            wp_add_inline_script('jquery', '
                jQuery(document).ready(function($) {
                    $(document).on("click", ".magazinenp-dismiss-temporary, .magazinenp-dismiss-permanent", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        var dismissType = $(this).hasClass("magazinenp-dismiss-permanent") ? "permanent" : "temporary";
                        var notice = $("#magazinenp-promotional-notice");
                        
                        $.ajax({
                            url: ajaxurl,
                            type: "POST",
                            data: {
                                action: "magazinenp_dismiss_promo",
                                dismiss_type: dismissType,
                                nonce: "' . wp_create_nonce('magazinenp_promo_nonce') . '"
                            },
                            success: function(response) {
                                notice.fadeOut(300, function() {
                                    $(this).remove();
                                });
                            }
                        });
                    });
                    
                    // Prevent default WordPress dismiss behavior
                    $(document).on("click", "#magazinenp-promotional-notice .notice-dismiss", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        $(".magazinenp-dismiss-temporary").trigger("click");
                    });
                });
            ');
        }
    }
}

// Initialize the promotional notice class
MagazineNP_Promotional_Notice::get_instance();
