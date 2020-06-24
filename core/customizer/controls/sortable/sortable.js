/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);

    var magazinenpSortableControl = {
        init: function () {


            this.initSortable();
            this.initDisable();

        },
        initDisable: function () {

            var instance = this;
            $document.on('click', ".magazinenp-sortable-control .rp-show-icon", function () {
                var sortable_item = $(this).closest('.magazinenp-sortable-item');
                var disable = sortable_item.attr('data-disable');
                if (disable == "0") {
                    disable = 1;
                } else {
                    disable = 0;
                }
                sortable_item.attr('data-disable', disable);

                instance.fillSortableValue(sortable_item);
            });
        },
        initSortable: function () {
            var instance = this;
            $.each($(".magazinenp-sortable-control-field"), function () {
                var _that = $(this);
                _that.sortable({
                    stop: function (event, ui) {
                        instance.fillSortableValue(_that);


                    }
                });
            });
        },
        fillSortableValue: function (__obj) {

            var sortable_item = {};
            var parent = __obj.closest('.magazinenp-sortable-control-field');
            $.each(parent.find('.magazinenp-sortable-item'), function () {
                var item_id = $(this).attr('data-item-id');
                var disable = $(this).attr('data-disable');
                var value_obj = {};
                value_obj.disable = disable;
                if (typeof sortable_item[item_id] !== "undefined") {
                    sortable_item[item_id] = {};
                }
                sortable_item[item_id] = value_obj;

            });

            var input = __obj.closest('.magazinenp-sortable-control').find('.customize-control-repeator-value');
            input.val(JSON.stringify(sortable_item)).trigger('change');
        }


    };
    wp.customize.bind('ready', function () {

        magazinenpSortableControl.init();

    })

})(jQuery, wp.customize || null);