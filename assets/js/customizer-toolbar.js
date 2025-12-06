/* jQuery(document).ready(function($) {


  $('textarea').each(function() {
    const textarea = $(this);


    if (textarea.prev('.customizer-toolbar').length) return;

    const toolbar = $(`
      <div class="customizer-toolbar">
        <button type="button" data-tag="strong" title="Pogrubienie (B)">B</button>
        <button type="button" data-tag="em" title="Kursywa (I)">I</button>
        <button type="button" data-insert="<br>" title="Nowa linia">↵</button>
        <button type="button" data-insert="<ul><li>Element listy</li></ul>" title="Lista punktowana">•</button>
        <button type="button" data-insert="<ol><li>Element listy</li></ol>" title="Lista numerowana">1.</button>
      </div>
    `);

    textarea.before(toolbar);

    toolbar.on('click', 'button', function() {
      const tag = $(this).data('tag');
      const insert = $(this).data('insert');
      const text = textarea.val();
      const start = textarea[0].selectionStart;
      const end = textarea[0].selectionEnd;
      let newText;

      if (tag) {
        newText = text.substring(0, start) + `<${tag}>` + text.substring(start, end) + `</${tag}>` + text.substring(end);
      } else if (insert) {
        newText = text.substring(0, start) + insert + text.substring(end);
      }

      textarea.val(newText).trigger('change'); 
    });
  });
}); */
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