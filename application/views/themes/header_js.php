<script src="<?= base_url(); ?>bower_components/jspdf/dist/jspdf.min.js"></script>
<script src="<?= base_url(); ?>bower_components/jspdf-autotable/dist/jspdf.plugin.autotable.js"></script>
<script src="<?= base_url(); ?>bower_components/bootstrap-table/src/bootstrap-table.js"></script>
<script src="<?= base_url(); ?>bower_components/bootstrap-table/dist/extensions/export/bootstrap-table-export.js"></script>
<script src="<?= base_url(); ?>bower_components/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.js"></script>
<script src="<?= base_url(); ?>bower_components/bootstrap-table/dist/extensions/sticky-header/bootstrap-table-sticky-header.js"></script>

<script src="<?= base_url(); ?>bower_components/jspdf-autotable/dist/jspdf.plugin.autotable.js"></script>
<script src="<?= base_url(); ?>bower_components/tableExport.jquery.plugin/tableExport.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>js/manage_tables.js"></script>

<script type="text/javascript">
    "use strict"

    function currencyFormat_(elm) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) {
            event.preventDefault();
        }

        $(elm).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                // .replace(/([0-9])([0-9]{2})$/, '$1,$2')  
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }

    /*$(document).on('change click keyup input paste', 'input.auto-currency', function() {
        $(this).val(function(index, value) {
            var sign = value.charAt(0),
            $return = 0;
            // $return = value.replace(/(?!\.)\D/g, "").replace(/(?:\..*)\./g, "").replace(/\.(\d\d)\d?$/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            $return = value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
            if (sign == '-')
            {
                $return = '-'+$return;
            }

            return $return;
        });
    });*/

    $(document).on('change click paste', 'input.auto-currency', function() {
        $(this).val(function(index, value) {
            if (value !== "") return accounting.formatMoney(accounting.unformat(value, ","), "", 2, ".", ",");
            else return;
        });
    });
</script>
<script src="<?= base_url(); ?>bower_components/moment-2.29.1/moment.min.js"></script>
<script src="<?= base_url(); ?>bower_components/moment-timezone-0.5.33/moment-timezone-with-data.min.js"></script>
<script type="text/javascript">
    const date = moment();

    // Set the timezone using the .tz() method
    const dateWithTimezone = date.tz('Asia/Seoul');
    // live clock
    var clock_tick = function clock_tick() {
        setInterval('update_clock();', 1000);
    }

    // start the clock immediatly
    clock_tick();

    var update_clock = function update_clock() {
        document.getElementById('liveclock').innerHTML = moment().tz('<?= $this->config->item('timezone'); ?>').format("<?php echo dateformat_momentjs($this->config->item('dateformat') . ' ' . $this->config->item('timeformat')) ?>");
    }

    $.notifyDefaults({
        placement: {
            align: "<?php echo $this->config->item('notify_horizontal_position'); ?>",
            from: "<?php echo $this->config->item('notify_vertical_position'); ?>"
        }
    });

    var cookie_name = "<?php echo $this->config->item('csrf_cookie_name'); ?>";

    var csrf_token = function() {
        return Cookies.get(cookie_name);
    };

    var csrf_form_base = function() {
        return {
            <?php echo $this->security->get_csrf_token_name(); ?>: function() {
                return csrf_token();
            }
        };
    };

    var setup_csrf_token = function() {
        $('input[name="<?php echo $this->security->get_csrf_token_name(); ?>"]').val(csrf_token());
    };

    var ajax = $.ajax;

    $.ajax = function() {
        var args = arguments[0];
        if (args['type'] && args['type'].toLowerCase() == 'post' && csrf_token()) {
            if (typeof args['data'] === 'string') {
                args['data'] += '&' + $.param(csrf_form_base());
            } else {
                args['data'] = $.extend(args['data'], csrf_form_base());
            }
        }

        return ajax.apply(this, arguments);
    };

    $(document).ajaxComplete(setup_csrf_token);

    var submit = $.fn.submit;

    $.fn.submit = function() {
        setup_csrf_token();
        submit.apply(this, arguments);
    };
</script>
<script type="text/javascript">
    (function(lang, $) {

        var lines = {
            'common_submit': "<?php echo $this->lang->line('common_submit') ?>",
            'common_close': "<?php echo $this->lang->line('common_close') ?>"
        };

        $.extend(lang, {
            line: function(key) {
                return lines[key];
            }
        });


    })(window.lang = window.lang || {}, jQuery);
</script>