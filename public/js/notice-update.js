jQuery(document).on( 'click', '.wpch-install-notice .notice-dismiss, .wpch-install-notice .notice-dismiss-2', function() {

  var data = {
        action: 'wpch_install_notice_dismiss',
    };

    jQuery.post(ajaxurl, data, function(response) {} );

});