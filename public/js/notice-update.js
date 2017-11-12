jQuery(document).on( 'click', '.wpch-install-notice .notice-dismiss', function() {

  var data = {
        action: 'wpch_install_notice_dismiss',
    };

    jQuery.post(ajaxurl, data, function(response) {} );

});