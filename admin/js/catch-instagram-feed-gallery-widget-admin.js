(function($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    $(function() {
        var welcomePanel = $( '#welcome-panel' );
        var updateWelcomePanel;

        updateWelcomePanel = function( visible ) {
            $.post( ajaxurl, {
                action: 'catch_instagram_feed_gallery_widget_update_welcome_panel',
                visible: visible,
                welcomenonce: $( '#catch-instagram-feed-gallery-widget-welcome-nonce' ).val()
            } );
        };

        $( 'a.welcome-panel-close', welcomePanel ).click( function( event ) {
            event.preventDefault();
            welcomePanel.addClass( 'hidden' );
            updateWelcomePanel( 0 );
        } );

        /* Show More event */
        $('.show-more').on('click', function() {
            $(this).next('.more-options').toggle();
        });

        $(".show-more").toggle(function() {
            $(this).html('Hide Options<i class="dashicons dashicons-arrow-up"></i>')
                .stop();
        }, function() {
            $(this).html('More Options<i class="dashicons dashicons-arrow-down"></i>')
                .stop();
        });
    });

    $(document).on('widget-added', function(e, widget) {

        $('.show-more').on('click', function() {
            $(this).next('.more-options').toggle();
        });

        $(".show-more").toggle(function() {
            $(this).html('Hide Options<i class="dashicons dashicons-arrow-up"></i>')
                .stop();
        }, function() {
            $(this).html('More Options<i class="dashicons dashicons-arrow-down"></i>')
                .stop();
        });
    });

    $(document).on('widget-updated', function(e, widget) {

        $('.show-more').on('click', function() {
            $(this).next('.more-options').toggle();
        });

        $(".show-more").toggle(function() {
            $(this).html('Hide Options<i class="dashicons dashicons-arrow-up"></i>')
                .stop();
        }, function() {
            $(this).html('More Options<i class="dashicons dashicons-arrow-down"></i>')
                .stop();
        });
    });

})(jQuery);