(function ($) {
    wp.customize.bind('ready', function () {
        var $section = $('#customize-control-services_list_control');
        if ($section.length) {
            var $container = $('<div id="services-repeater"></div>');
            var services = [];

            function render() {
                $container.empty();
                services.forEach(function (item, index) {
                    var $row = $('<div class="service-row" style="margin-bottom:10px; border:1px solid #ddd; padding:10px; border-radius:6px;"></div>');

                    var $title = $('<input type="text" class="widefat" placeholder="Tytuł usługi">').val(item.title);
                    var $desc = $('<textarea class="widefat" placeholder="Opis usługi"></textarea>').val(item.desc);

                    // === Pola obrazka ===
                    var $imagePreview = $('<div class="service-image-preview" style="margin:6px 0;">' +
                        (item.image ? '<img src="' + item.image + '" style="max-width:100%;height:auto;border-radius:4px;">' : '') +
                        '</div>');
                    var $imageInput = $('<input type="text" class="widefat" placeholder="URL obrazka">').val(item.image);
                    var $uploadBtn = $('<button type="button" class="button">Wybierz z mediów</button>');
                    var $remove = $('<button type="button" class="button remove-service" style="margin-top:6px;">Usuń</button>');

                    // === Obsługa zmian ===
                    $title.on('input', function () {
                        services[index].title = $(this).val();
                        save();
                    });

                    $desc.on('input', function () {
                        services[index].desc = $(this).val();
                        save();
                    });

                    $imageInput.on('input', function () {
                        services[index].image = $(this).val();
                        $imagePreview.html(item.image ? '<img src="' + item.image + '" style="max-width:100%;height:auto;border-radius:4px;">' : '');
                        save();
                    });

                    // === Obsługa media uploader ===
                    $uploadBtn.on('click', function (e) {
                        e.preventDefault();
                        var frame = wp.media({
                            title: 'Wybierz obrazek',
                            button: { text: 'Użyj tego obrazka' },
                            multiple: false
                        });
                        frame.on('select', function () {
                            var attachment = frame.state().get('selection').first().toJSON();
                            services[index].image = attachment.url;
                            $imageInput.val(attachment.url);
                            $imagePreview.html('<img src="' + attachment.url + '" style="max-width:100%;height:auto;border-radius:4px;">');
                            save();
                        });
                        frame.open();
                    });
                    // === Przycisk CTA ===
                    var $hasButton = $('<label style="display:block;margin-top:10px;">' +
                        '<input type="checkbox" class="service-has-button"> Dodaj przycisk</label>');
                    var $buttonLink = $('<input type="text" class="widefat service-button-link" placeholder="Link do przycisku" style="margin-top:6px;">');

                    $hasButton.find('input').prop('checked', item.hasButton || false);
                    $buttonLink.val(item.buttonLink || '').toggle(item.hasButton);

                    // === Obsługa zmian CTA ===
                    $hasButton.find('input').on('change', function () {
                        services[index].hasButton = $(this).is(':checked');
                        if ($(this).is(':checked')) {
                            $buttonLink.show();
                        } else {
                            $buttonLink.hide();
                            services[index].buttonLink = '';
                        }
                        save();
                    });

                    $buttonLink.on('input', function () {
                        services[index].buttonLink = $(this).val();
                        save();
                    });

                    $remove.on('click', function () {
                        services.splice(index, 1);
                        render();
                        save();
                    });

                    $row.append(
                        $('<label><strong>Tytuł:</strong></label>'), $title,
                        $('<label><strong>Opis:</strong></label>'), $desc,
                        $('<label><strong>Obrazek:</strong></label>'), $imagePreview, $imageInput, $uploadBtn,
                        $('<label><strong>Przycisk:</strong></label>'),
                        $hasButton,
                        $buttonLink,

                        $remove
                    );
                    $container.append($row);
                });
            }

            function save() {
                var json = JSON.stringify(services);
                $('#customize-control-services_list_control input[type=hidden]').val(json);
                wp.customize('services_list').set(json);
            }

            var $addBtn = $('<button type="button" class="button button-primary">+ Dodaj usługę</button>').css({
                marginTop: '10px'
            });

            $addBtn.on('click', function () {
                services.push({
                    title: '',
                    desc: '',
                    image: '',
                    button_enabled: false,
                    button_text: '',
                    button_url: ''
                });
                render();
                save();
            });

            $section.append($container, $addBtn);

            // === Wczytanie istniejących danych ===
            var initial = wp.customize('services_list')();
            if (initial) {
                try { services = JSON.parse(initial); }
                catch (e) { services = []; }
            }
            render();
        }
    });
})(jQuery);