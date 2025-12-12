
(function($) {
    wp.customize.bind('ready', function() {
        $('.customizer-richtext').each(function() {
            const $el = $(this);

            if ($el.data('trumbowyg-initialized')) return;
            $el.data('trumbowyg-initialized', true);

            $el.trumbowyg({
                svgPath: '/wp-content/themes/basic-auracode/assets/trumbowyg/icons.svg',
                btns: [
                    ['viewHTML'],
                    ['bold', 'italic', 'underline'],
                    ['unorderedList', 'orderedList'],
                    ['fontsize'],
                    ['removeformat']
                ],
                plugins: {
                    fontsize: {
                        sizeList: ['small', 'normal', 'large']
                    }
                },
                autogrow: true
            });

            $el.on('tbwchange', function() {
                $(this).trigger('change');
            });
        });
    });
})(jQuery);