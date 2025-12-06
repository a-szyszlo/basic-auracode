<?php

// Basic theme setup
function auracode_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'auracode_theme_setup');


// Enqueue styles and scripts
function auracode_enqueue()
{
    wp_enqueue_style('auracode-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script('auracode-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('auracode-customizer', get_stylesheet_directory_uri() . '/assets/js/customizer.js', array('jquery', 'customize-controls'), null, true);
}
add_action('wp_enqueue_scripts', 'auracode_enqueue');
add_action('customize_controls_enqueue_scripts', 'auracode_enqueue');

function hex2rgba($hex, $alpha = 0.8)
{
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) === 3) {
        $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
        $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
        $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }

    return "rgba($r, $g, $b, $alpha)";
}
// =========================
//  Customizer Text Editor Toolbar
// =========================
function auracode_customizer_toolbar_assets()
{
    wp_enqueue_script('customizer-toolbar', get_template_directory_uri() . '/assets/js/customizer-toolbar.js', array('jquery', 'customize-controls'), false, true);
    wp_enqueue_style('customizer-toolbar-style', get_template_directory_uri() . '/assets/css/customizer-toolbar.css');
}
add_action('customize_controls_enqueue_scripts', 'auracode_customizer_toolbar_assets');


function auracode_enqueue_trumbowyg()
{
    $path = get_template_directory_uri() . '/assets/trumbowyg/';

    wp_enqueue_style('trumbowyg', $path . 'trumbowyg.min.css');

    wp_enqueue_script('trumbowyg', $path . 'trumbowyg.min.js', array('jquery'), null, true);
    wp_enqueue_script('trumbowyg-plugin-link', $path . 'plugins/link/trumbowyg.link.min.js', array('trumbowyg'), null, true);
    wp_enqueue_script('trumbowyg-plugin-fontsize', $path . 'plugins/fontsize/trumbowyg.fontsize.min.js', array('trumbowyg'), null, true);
    wp_enqueue_script('trumbowyg-plugin-cleanpaste', $path . 'plugins/cleanpaste/trumbowyg.cleanpaste.min.js', array('trumbowyg'), null, true);

    wp_enqueue_script('auracode-customizer-trumbowyg', get_template_directory_uri() . '/js/customizer-trumbowyg.js', array('jquery', 'customize-controls', 'trumbowyg'), null, true);
}
add_action('customize_controls_enqueue_scripts', 'auracode_enqueue_trumbowyg');

// Customizer fields
function auracode_customize_register($wp_customize)
{

    // === SEKCJA: Kolory i czcionki ===
    $wp_customize->add_section('global_styles', array(
        'title' => 'Ustawienia stylu',
        'priority' => 5,
    ));

    // === Kolor marki ===
    $wp_customize->add_setting('brand_color', array('default' => '#bc6d61'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'brand_color', array(
        'label' => 'Kolor marki',
        'section' => 'global_styles',
        'settings' => 'brand_color'
    )));

    $wp_customize->add_setting('color_secondary', array('default' => '#f4efee'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_secondary', array(
        'label' => 'Kolor dodatkowy (Secondary)',
        'section' => 'global_styles',
        'settings' => 'color_secondary',
    )));

    // === Kolory globalne ===
    $wp_customize->add_setting('color_bg', array('default' => '#ffffff'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_bg', array(
        'label' => 'Kolor tła',
        'section' => 'global_styles',
        'settings' => 'color_bg',
    )));

    $wp_customize->add_setting('color_text', array('default' => '##3f3f3f'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_text', array(
        'label' => 'Kolor tekstu',
        'section' => 'global_styles',
        'settings' => 'color_text',
    )));
    // Kolor tła nagłówka
    $wp_customize->add_setting('color_bg_header', array('default' => '#f7f7f7'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_bg_header', array(
        'label' => 'Kolor tła nagłówka',
        'section' => 'global_styles',
        'settings' => 'color_bg_header',
    )));
    // Kolor tła stopki
    $wp_customize->add_setting('color_bg_footer', array('default' => '#f9f9f9'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_bg_footer', array(
        'label' => 'Kolor tła stopki',
        'section' => 'global_styles',
        'settings' => 'color_bg_footer',
    )));



    // === Czcionki ===
    $google_fonts = array(
        'Roboto' => 'Roboto',
        'Open Sans' => 'Open Sans',
        'Poppins' => 'Poppins',
        'Lato' => 'Lato',
        'Montserrat' => 'Montserrat',
        'Raleway' => 'Raleway',
        'Nunito' => 'Nunito',
        'Playfair Display' => 'Playfair Display',
        'Merriweather' => 'Merriweather',
        'Inter' => 'Inter',
        'Libre Baskerville' => 'Libre Baskerville',
    );

    $wp_customize->add_setting('font_heading', array(
        'default' => 'Merriweather',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('font_heading', array(
        'label' => 'Czcionka nagłówków',
        'section' => 'global_styles',
        'type' => 'select',
        'choices' => $google_fonts,
    ));

    $wp_customize->add_setting('font_body', array(
        'default' => 'Lato',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('font_body', array(
        'label' => 'Czcionka tekstu',
        'section' => 'global_styles',
        'type' => 'select',
        'choices' => $google_fonts,
    ));
    // ----------------- Social Media -----------------
    $wp_customize->add_section('social_section', array(
        'title' => 'Sekcja: Social Media',
        'priority' => 85,
    ));

    // Facebook
    $wp_customize->add_setting('social_facebook', array('default' => 'https://facebook.com/auracodepl'));
    $wp_customize->add_control('social_facebook_control', array(
        'label' => 'Facebook URL',
        'section' => 'social_section',
        'settings' => 'social_facebook',
    ));

    // Instagram
    $wp_customize->add_setting('social_instagram', array('default' => 'https://instagram.com/auracodepl'));
    $wp_customize->add_control('social_instagram_control', array(
        'label' => 'Instagram URL',
        'section' => 'social_section',
        'settings' => 'social_instagram',
    ));

    // LinkedIn
    $wp_customize->add_setting('social_linkedin', array('default' => ''));
    $wp_customize->add_control('social_linkedin_control', array(
        'label' => 'LinkedIn URL',
        'section' => 'social_section',
        'settings' => 'social_linkedin',
    ));

    // Własny link 1
    $wp_customize->add_setting('social_custom1_icon', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'social_custom1_icon', array(
        'label' => 'Ikona niestandardowa 1 (SVG lub PNG)',
        'section' => 'social_section',
        'settings' => 'social_custom1_icon',
    )));

    $wp_customize->add_setting('social_custom1_url', array('default' => ''));
    $wp_customize->add_control('social_custom1_url_control', array(
        'label' => 'Link niestandardowy 1',
        'section' => 'social_section',
        'settings' => 'social_custom1_url',
    ));

    // Własny link 2
    $wp_customize->add_setting('social_custom2_icon', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'social_custom2_icon', array(
        'label' => 'Ikona niestandardowa 2 (SVG lub PNG)',
        'section' => 'social_section',
        'settings' => 'social_custom2_icon',
    )));

    $wp_customize->add_setting('social_custom2_url', array('default' => ''));
    $wp_customize->add_control('social_custom2_url_control', array(
        'label' => 'Link niestandardowy 2',
        'section' => 'social_section',
        'settings' => 'social_custom2_url',
    ));


    // ----------------- Hero Section ----------------- 
    $wp_customize->add_section('hero_section', array('title' => 'Sekcja: Hero', 'priority' => 30));
    $wp_customize->add_setting('hero_title', array('default' => 'Odzyskaj równowagę ciała i umysłu'));
    $wp_customize->add_control('hero_title_control', array('label' => 'Tytuł (H1)', 'section' => 'hero_section', 'settings' => 'hero_title'));
    $wp_customize->add_setting('hero_desc', array(
        'default' => '<p>Zanurz się w świecie <strong>spokoju </strong>i <strong>harmonii</strong>.</p><p>Nauczę Cię, jak poprzez ruch i oddech odzyskać <strong>kontakt ze swoim ciałem</strong>, uwolnić napięcia i wprowadzić więcej <strong>uważności do codzienności.</strong></p>',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('hero_desc_control', array(
        'label' => 'Opis',
        'section' => 'hero_section',
        'settings' => 'hero_desc',
        'type' => 'textarea',
        'input_attrs' => array(
            'class' => 'customizer-richtext'
        ),
    ));
    $wp_customize->add_setting('hero_btn1', array('default' => 'Skontaktuj się'));
    $wp_customize->add_control('hero_btn1_control', array('label' => 'Przycisk 1', 'section' => 'hero_section', 'settings' => 'hero_btn1'));
    $wp_customize->add_setting('hero_btn2', array('default' => 'Dowiedz się więcej'));
    $wp_customize->add_control('hero_btn2_control', array('label' => 'Przycisk 2', 'section' => 'hero_section', 'settings' => 'hero_btn2'));
    $wp_customize->add_setting('hero_image', array(
        'default' => get_template_directory_uri() . '/assets/img/default_img/yogaflow.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', array('label' => 'Obrazek w banerze', 'section' => 'hero_section', 'settings' => 'hero_image')));

    // ----------------- About ----------------- 
    $wp_customize->add_section('about_section', array('title' => 'Sekcja: O mnie', 'priority' => 40));
    $wp_customize->add_setting('about_title', array('default' => 'Tytuł o mnie'));
    $wp_customize->add_control(
        'about_title_control',
        array(
            'label' => 'Tytuł o mnie',
            'section' => 'about_section',
            'settings' => 'about_title',
            'type' => 'textarea'
        )
    );
    $wp_customize->add_setting('about_text', array('default' => '<p>Nazywam się Anna Lewicka i od ponad 10 lat uczę<strong> jogi</strong>,<strong> medytacji </strong>i <strong>pracy z oddechem</strong>.
Swoją praktykę rozpoczęłam, kiedy sama szukałam spokoju w intensywnym tempie życia.&nbsp;</p><p><strong>Dziś pomagam innym odnaleźć ten sam balans</strong> – niezależnie od wieku i doświadczenia.

Moje zajęcia łączą elementy jogi klasycznej, vinyasy i stretchingu, dzięki czemu każdy może znaleźć coś dla siebie.&nbsp;</p><p>Wierzę, że joga nie jest tylko ruchem –<strong> to sposób na życie,</strong> który pomaga odnaleźć <em>lekkość</em> i <em>wdzięczność </em>w codziennych chwilach.</p>', 'sanitize_callback' => 'wp_kses_post',));
    $wp_customize->add_control(
        'about_text_control',
        array(
            'label' => 'Tekst o mnie',
            'section' => 'about_section',
            'settings' => 'about_text',
            'type' => 'textarea',
            'input_attrs' => array(
                'class' => 'customizer-richtext'
            ),

        )
    );
    $wp_customize->add_setting('about_image', array(
        'default' => get_template_directory_uri() . '/assets/img/default_img/yogaflov_studio_jogi.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image_control', array('label' => 'Zdjęcie (O mnie)', 'section' => 'about_section', 'settings' => 'about_image')));

    // ----------------- Numbers Section ----------------- 
    $wp_customize->add_section('numbers_section', array(
        'title'    => 'Sekcja: Liczniki',
        'priority' => 70,
    ));

    $default_numbers = [14000, 100, 10];
    $default_prefixes = ['+', '', '+'];
    $default_suffixes = ['', '%', ''];
    $default_labels = ['uczestników zajęć', 'pozytywnych opinii', 'lat doświadczenia'];


    for ($i = 1; $i <= 3; $i++) {
        // Liczba
        $wp_customize->add_setting("number_$i", array('default' => $default_numbers[$i - 1]));
        $wp_customize->add_control("number_{$i}_control", array(
            'label'    => "Liczba $i",
            'section'  => 'numbers_section',
            'settings' => "number_$i",
            'type'     => 'number',
        ));

        // Prefix
        $wp_customize->add_setting("number_prefix_$i", array('default' => $default_prefixes[$i - 1]));
        $wp_customize->add_control("number_prefix_{$i}_control", array(
            'label'    => "Prefix $i (np. +)",
            'section'  => 'numbers_section',
            'settings' => "number_prefix_$i",
            'type'     => 'text',
        ));

        // Suffix
        $wp_customize->add_setting("number_suffix_$i", array('default' => $default_suffixes[$i - 1]));
        $wp_customize->add_control("number_suffix_{$i}_control", array(
            'label'    => "Suffix $i (np. %)",
            'section'  => 'numbers_section',
            'settings' => "number_suffix_$i",
            'type'     => 'text',
        ));

        // Label
        $wp_customize->add_setting("number_label_$i", array('default' => $default_labels[$i - 1]));
        $wp_customize->add_control("number_label_{$i}_control", array(
            'label'    => "Etykieta $i",
            'section'  => 'numbers_section',
            'settings' => "number_label_$i",
            'type'     => 'text',
        ));
    }
    // ----------------- CTA Section ----------------- 
    $wp_customize->add_section('cta_section', array(
        'title' => 'Sekcja: CTA',
        'priority' => 70,
    ));

    // Tytuł i opis
    $wp_customize->add_setting('cta_title', array('default' => 'Gotowa, by zacząć?'));
    $wp_customize->add_control('cta_title_control', array(
        'label' => 'Tytuł',
        'section' => 'cta_section',
        'settings' => 'cta_title',
    ));

    $wp_customize->add_setting('cta_desc', array('default' => '<p><strong>Skontaktuj się ze mną</strong> i rozpocznij swoją podróż ku większemu spokojowi i równowadze.
Razem znajdziemy praktykę, która najlepiej odpowie <strong>Twoim potrzebom</strong>.</p>', 'sanitize_callback' => 'wp_kses_post',));
    $wp_customize->add_control('cta_desc_control', array(
        'label' => 'Opis',
        'section' => 'cta_section',
        'settings' => 'cta_desc',
        'type' => 'textarea',
        'input_attrs' => array(
            'class' => 'customizer-richtext'
        ),
    ));

    // Obrazek
    $wp_customize->add_setting('cta_image', array(
        'default' => get_template_directory_uri() . '/assets/img/default_img/kontakt_joga.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_image_control', array(
        'label' => 'Obrazek (prawa kolumna)',
        'section' => 'cta_section',
        'settings' => 'cta_image'
    )));

    // Przycisk 1
    $wp_customize->add_setting('cta_btn1_text', array('default' => 'Skontaktuj się'));
    $wp_customize->add_control('cta_btn1_text_control', array(
        'label' => 'Tekst przycisku 1',
        'section' => 'cta_section',
        'settings' => 'cta_btn1_text',
    ));

    $wp_customize->add_setting('cta_btn1_url', array('default' => '#kontakt'));
    $wp_customize->add_control('cta_btn1_url_control', array(
        'label' => 'Link przycisku 1',
        'section' => 'cta_section',
        'settings' => 'cta_btn1_url',
    ));

    // Przycisk 2
    $wp_customize->add_setting('cta_btn2_text', array('default' => 'Zobacz ofertę'));
    $wp_customize->add_control('cta_btn2_text_control', array(
        'label' => 'Tekst przycisku 2',
        'section' => 'cta_section',
        'settings' => 'cta_btn2_text',
    ));

    $wp_customize->add_setting('cta_btn2_url', array('default' => '#uslugi'));
    $wp_customize->add_control('cta_btn2_url_control', array(
        'label' => 'Link przycisku 2',
        'section' => 'cta_section',
        'settings' => 'cta_btn2_url',
    ));

    // ----------------- Services ----------------- 
    $wp_customize->add_section('services_section', array('title' => 'Sekcja: Usługi', 'priority' => 50));
    $default_services = json_encode([
        [
            'title' => 'Zajęcia indywidualne i grupowe',
            'desc' => 'Prowadzę zajęcia dopasowane do Twoich możliwości i potrzeb – zarówno indywidualne, jak i w małych grupach. Podczas spotkań skupiamy się na technice, oddechu i płynnym ruchu. Pomagam osobom początkującym rozpocząć przygodę z jogą, a zaawansowanym pogłębić praktykę.',
            'image' => get_template_directory_uri() . '/assets/img/default_img/Uslugi_1.webp',
            'button_enabled' => false,
            'button_text' => '',
            'button_url'     => ''
        ],
        [
            'title' => 'Kurs online „Joga na dobry dzień”',
            'desc' => 'Nie masz czasu na dojazdy? Ten kurs pozwala Ci praktykować w domu, o dowolnej porze. Zawiera zestaw nagrań z sesjami jogi, relaksacjami i krótkimi praktykami oddechowymi. To świetny sposób, by wprowadzić codzienny rytuał ruchu i spokoju.',
            'image' => get_template_directory_uri() . '/assets/img/default_img/Uslugi_2.webp',
            'button_enabled' => true,
            'button_text' => 'Zobacz kurs',
            'button_url'     => '#kurs-online'
        ],
        [
            'title' => 'Warsztaty mindfulness i relaksacji',
            'desc' => 'Cykl warsztatów dla osób, które chcą nauczyć się odpuszczać stres i napięcia. Łączę elementy jogi, medytacji i uważnego oddechu. Po każdym spotkaniu uczestnicy czują się zrelaksowani, spokojni i bardziej obecni w chwili.',
            'image' => get_template_directory_uri() . '/assets/img/default_img/Uslugi_3.webp',
            'button_enabled' => false,
            'button_text' => '',
            'button_url'     => ''
        ]
    ]);
    $wp_customize->add_setting('services_list', array('default' => $default_services));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'services_list_control', array(
        'label' => 'Lista usług (Dodaj nowe w Customizerze)',
        'section' => 'services_section',
        'settings' => 'services_list',
        'type' => 'hidden'
    )));

    // ----------------- Process ----------------- 
    $wp_customize->add_section('process_section', array(
        'title' => 'Sekcja: Proces',
        'priority' => 70,
    ));

    // Tytuł i opis sekcji
    $wp_customize->add_setting('process_title', array(
        'default' => 'Jak to działa',
    ));
    $wp_customize->add_control('process_title_control', array(
        'label' => 'Tytuł sekcji',
        'section' => 'process_section',
        'settings' => 'process_title',
    ));

    $wp_customize->add_setting('process_desc', array(
        'default' => 'Podczas pierwszego kontaktu ustalamy Twoje potrzeby, poziom zaawansowania i cele. Dzięki temu mogę dobrać odpowiedni styl i tempo praktyki.',
    ));
    $wp_customize->add_control('process_desc_control', array(
        'label' => 'Opis sekcji',
        'section' => 'process_section',
        'settings' => 'process_desc',
        'type' => 'textarea',
    ));

    // Trzy etapy
    $default_step_nums = [".I", ".II", ".III"];
    $default_step_titles = [
        'Pierwsze spotkanie i konsultacja',
        'Indywidualny plan praktyki',
        'Wspólna praktyka i rozwój'
    ];
    $default_step_descs = [
        'Tutaj analizujemy potrzeby klienta i zbieramy wszystkie wymagania.',
        'Na podstawie rozmowy przygotowuję plan zajęć – dopasowany do Twojego rytmu życia. Możesz wybrać praktykę online lub spotkania na żywo w moim studiu.',
        'Krok po kroku wprowadzamy nowe techniki, uczymy się uważności i świadomego ruchu. Po kilku tygodniach zauważysz, że nie tylko Twoje ciało, ale i umysł stają się bardziej elastyczne.'
    ];
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("process_step_num_$i", array(
            'default' => $default_step_nums[$i - 1],
        ));
        $wp_customize->add_control("process_step_num_{$i}_control", array(
            'label' => "Etap $i – numer",
            'section' => 'process_section',
            'settings' => "process_step_num_$i",
        ));

        $wp_customize->add_setting("process_step_title_$i", array(
            'default' => $default_step_titles[$i - 1],
        ));
        $wp_customize->add_control("process_step_title_{$i}_control", array(
            'label' => "Etap $i – tytuł",
            'section' => 'process_section',
            'settings' => "process_step_title_$i",
        ));

        $wp_customize->add_setting("process_step_desc_$i", array(
            'default' => $default_step_descs[$i - 1],
        ));
        $wp_customize->add_control("process_step_desc_{$i}_control", array(
            'label' => "Etap $i – opis",
            'section' => 'process_section',
            'settings' => "process_step_desc_$i",
            'type' => 'textarea',
        ));
    }
    // ----------------- Contact ----------------- 
    $wp_customize->add_section('contact_section', array(
        'title' => 'Sekcja: Kontakt',
        'priority' => 80,
    ));

    // Nagłówek
    $wp_customize->add_setting('contact_title', array('default' => 'Skontaktuj się ze mną'));
    $wp_customize->add_control('contact_title_control', array(
        'label' => 'Tytuł (H2)',
        'section' => 'contact_section',
        'settings' => 'contact_title',
    ));

    // Opis
    $wp_customize->add_setting('contact_desc', array('default' => 'Masz pytania? Skontaktuj się przez poniższe dane.'));
    $wp_customize->add_control('contact_desc_control', array(
        'label' => 'Opis',
        'section' => 'contact_section',
        'settings' => 'contact_desc',
        'type' => 'textarea',
    ));

    // Telefon
    $wp_customize->add_setting('contact_phone', array('default' => '+48 600 000 000'));
    $wp_customize->add_control('contact_phone_control', array(
        'label' => 'Telefon',
        'section' => 'contact_section',
        'settings' => 'contact_phone',
    ));

    // E-mail
    $wp_customize->add_setting('contact_email', array('default' => 'kontakt@twojadomena.pl'));
    $wp_customize->add_control('contact_email_control', array(
        'label' => 'E-mail',
        'section' => 'contact_section',
        'settings' => 'contact_email',
    ));

    // Adres
    $wp_customize->add_setting('contact_address', array('default' => 'ul. Przykładowa 12, 00-000 Warszawa'));
    $wp_customize->add_control('contact_address_control', array(
        'label' => 'Adres',
        'section' => 'contact_section',
        'settings' => 'contact_address',
        'type' => 'textarea',
    ));

    // Sekcja: Stopka
    $wp_customize->add_section('footer_section', array(
        'title' => 'Sekcja: Stopka',
        'priority' => 90,
    ));

    // Logo
    $wp_customize->add_setting('footer_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo_control', array(
        'label' => 'Logo w stopce',
        'section' => 'footer_section',
        'settings' => 'footer_logo',
    )));

    // Dane firmy (edytor)

    $wp_customize->add_setting('footer_company_info', array('default' => '<strong>Nazwa firmy</strong><br>ul. Przykładowa 1<br>00-000 Miasto<br>NIP: 000-000-00-00', 'sanitize_callback' => 'wp_kses_post',));
    $wp_customize->add_control('footer_company_info_control', array(
        'label' => 'Dane firmy',
        'section' => 'footer_section',
        'settings' => 'footer_company_info',
        'type' => 'textarea',
        'input_attrs' => array(
            'class' => 'customizer-richtext'
        ),
    ));

    // SEO Sekcja
    $wp_customize->add_section('seo_section', array(
        'title' => 'Ustawienia SEO i Schema',
        'priority' => 95,
    ));

    $wp_customize->add_setting('seo_title', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seo_title_control', array(
        'label' => 'Meta Title',
        'section' => 'seo_section',
        'settings' => 'seo_title',
    ));

    $wp_customize->add_setting('seo_desc', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seo_desc_control', array(
        'label' => 'Meta Description',
        'section' => 'seo_section',
        'settings' => 'seo_desc',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('seo_keywords', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seo_keywords_control', array(
        'label' => 'Słowa kluczowe (keywords)',
        'section' => 'seo_section',
        'settings' => 'seo_keywords',
    ));

    $wp_customize->add_setting('seo_schema', array(
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('seo_schema_control', array(
        'label' => 'Schema JSON-LD (np. LocalBusiness)',
        'section' => 'seo_section',
        'settings' => 'seo_schema',
        'type' => 'textarea',
    ));



    // ----------------- Contact
    /*  $wp_customize->add_section('contact_section', array('title' => 'Sekcja: Kontakt', 'priority' => 60));
    $wp_customize->add_setting('contact_text', array('default' => 'Masz pytania? Napisz!'));
    $wp_customize->add_control('contact_text_control', array('label' => 'Tekst kontaktowy', 'section' => 'contact_section', 'settings' => 'contact_text', 'type' => 'textarea')); */

    // Selective Refresh
    if (isset($wp_customize->selective_refresh)) {
        // ----------------- Hero ------------------
        $wp_customize->selective_refresh->add_partial('hero_title', array(
            'selector' => '.hero-text h1',
            'render_callback' => function () {
                return get_theme_mod('hero_title');
            },
        ));
        $wp_customize->selective_refresh->add_partial('hero_desc', array(
            'selector' => '.hero-text p',
            'render_callback' => function () {
                return get_theme_mod('hero_desc');
            },
        ));
        $wp_customize->selective_refresh->add_partial('hero_btn1', array(
            'selector' => '.hero-buttons .btn:first-child',
            'render_callback' => function () {
                return get_theme_mod('hero_btn1');
            },
        ));
        $wp_customize->selective_refresh->add_partial('hero_btn2', array(
            'selector' => '.hero-buttons .btn:last-child',
            'render_callback' => function () {
                return get_theme_mod('hero_btn2');
            },
        ));
        $wp_customize->selective_refresh->add_partial('hero_image', array(
            'selector' => '.hero-image img',
            'render_callback' => function () {
                $img = get_theme_mod('hero_image');
                return $img ? '<img src="' . esc_url($img) . '" alt="">' : '';
            },
        ));

        // ----------------- About ----------------------------
        $wp_customize->selective_refresh->add_partial('about_title', array(
            'selector' => '.about-title',
            'render_callback' => function () {
                return get_theme_mod('about_title');
            },
        ));
        $wp_customize->selective_refresh->add_partial('about_text', array(
            'selector' => '.about-text',
            'render_callback' => function () {
                return get_theme_mod('about_text');
            },
        ));
        $wp_customize->selective_refresh->add_partial('about_image', array(
            'selector' => '.about-image img',
            'render_callback' => function () {
                $img = get_theme_mod('about_image');
                return $img ? '<img src="' . esc_url($img) . '" alt="">' : '';
            },
        ));

        // ----------------- Numbers ----------------- 
        $default_numbers  = [14000, 100, 10];
        $default_prefixes = ['+', '', '+'];
        $default_suffixes = ['', '%', ''];
        $default_labels   = ['uczestników zajęć', 'pozytywnych opinii', 'lat doświadczenia'];
        for ($i = 1; $i <= 3; $i++) {
            // Separator / nagłówek dla licznika
            $wp_customize->add_setting("number_group_$i", array(
                'default' => '',
            ));
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, "number_group_{$i}_control", array(
                'label' => "Licznik $i",
                'section' => 'numbers_section',
                'settings' => "number_group_$i",
                'type' => 'hidden', // nie edytowalne, służy jako nagłówek w Customizerze
            )));

            // Liczba
            $wp_customize->add_setting("number_$i", array('default' => $default_numbers[$i - 1]));
            $wp_customize->add_control("number_{$i}_control", array(
                'label'    => "Liczba $i",
                'section'  => 'numbers_section',
                'settings' => "number_$i",
                'type'     => 'number',
                'description' => 'Wpisz główną wartość licznika',
            ));

            // Prefix
            $wp_customize->add_setting("number_prefix_$i", array('default' => $default_prefixes[$i - 1]));
            $wp_customize->add_control("number_prefix_{$i}_control", array(
                'label'    => "Prefix $i",
                'section'  => 'numbers_section',
                'settings' => "number_prefix_$i",
                'type'     => 'text',
                'description' => 'Tekst lub znak przed liczbą (np. +)',
            ));

            // Suffix
            $wp_customize->add_setting("number_suffix_$i", array('default' => $default_suffixes[$i - 1]));
            $wp_customize->add_control("number_suffix_{$i}_control", array(
                'label'    => "Suffix $i",
                'section'  => 'numbers_section',
                'settings' => "number_suffix_$i",
                'type'     => 'text',
                'description' => 'Tekst lub znak po liczbie (np. %)',
            ));

            // Label
            $wp_customize->add_setting("number_label_$i", array('default' => $default_labels[$i - 1]));
            $wp_customize->add_control("number_label_{$i}_control", array(
                'label'    => "Etykieta $i",
                'section'  => 'numbers_section',
                'settings' => "number_label_$i",
                'type'     => 'text',
                'description' => 'Tekst pod liczbą',
            ));
        }
        // ----------------- process ----------------- 
        $wp_customize->selective_refresh->add_partial('process_title', array(
            'selector' => '.process-section .section-title',
            'render_callback' => function () {
                return get_theme_mod('process_title');
            },
        ));
        $wp_customize->selective_refresh->add_partial('process_desc', array(
            'selector' => '.process-section .section-desc',
            'render_callback' => function () {
                return get_theme_mod('process_desc');
            },
        ));
        for ($i = 1; $i <= 3; $i++) {
            $wp_customize->selective_refresh->add_partial("process_step_title_$i", array(
                'selector' => ".process-step:nth-child($i) .step-title",
                'render_callback' => function () use ($i) {
                    return get_theme_mod("process_step_title_$i");
                },
            ));
            $wp_customize->selective_refresh->add_partial("process_step_desc_$i", array(
                'selector' => ".process-step:nth-child($i) .step-desc",
                'render_callback' => function () use ($i) {
                    return get_theme_mod("process_step_desc_$i");
                },
            ));
            $wp_customize->selective_refresh->add_partial("process_step_num_$i", array(
                'selector' => ".process-step:nth-child($i) .step-num",
                'render_callback' => function () use ($i) {
                    return get_theme_mod("process_step_num_$i");
                },
            ));
        }
        // ----------------- CTA ----------------- 
        $wp_customize->selective_refresh->add_partial('cta_title', array(
            'selector' => '.cta-title',
            'render_callback' => function () {
                return get_theme_mod('cta_title');
            },
        ));

        $wp_customize->selective_refresh->add_partial('cta_desc', array(
            'selector' => '.cta-desc',
            'render_callback' => function () {
                return get_theme_mod('cta_desc');
            },
        ));


        // ----------------- Contact ----------------- 


        $wp_customize->selective_refresh->add_partial('contact_title', array(
            'selector' => '.contact h2',
            'render_callback' => function () {
                return get_theme_mod('contact_title');
            },
        ));
        $wp_customize->selective_refresh->add_partial('contact_desc', array(
            'selector' => '.contact p',
            'render_callback' => function () {
                return get_theme_mod('contact_desc');
            },
        ));
        $wp_customize->selective_refresh->add_partial('contact_phone', array(
            'selector' => '.contact-phone',
            'render_callback' => function () {
                return get_theme_mod('contact_phone');
            },
        ));
        $wp_customize->selective_refresh->add_partial('contact_email', array(
            'selector' => '.contact-email',
            'render_callback' => function () {
                return get_theme_mod('contact_email');
            },
        ));
        $wp_customize->selective_refresh->add_partial('contact_address', array(
            'selector' => '.contact-address',
            'render_callback' => function () {
                return get_theme_mod('contact_address');
            },
        ));
    }
}
add_action('customize_register', 'auracode_customize_register');


function auracode_customizer_styles()
{
    wp_enqueue_style(
        'auracode-customizer-style',
        get_template_directory_uri() . '/css/customizer.css',
        array(),
        filemtime(get_template_directory() . '/css/customizer.css')
    );
}
add_action('customize_controls_enqueue_scripts', 'auracode_customizer_styles');


function auracode_enqueue_google_fonts()
{
    $font_heading = get_theme_mod('font_heading', 'Playfair Display');
    $font_body = get_theme_mod('font_body', 'Nunito');

    $fonts = array_unique([$font_heading, $font_body]);

    $fonts_query_parts = [];
    foreach ($fonts as $font) {
        $fonts_query_parts[] = 'family=' . str_replace(' ', '+', $font) . ':wght@300;400;600;700';
    }
    $fonts_query = implode('&', $fonts_query_parts);

    $fonts_url = "https://fonts.googleapis.com/css2?$fonts_query&display=swap";

    wp_enqueue_style(
        'auracode-google-fonts',
        esc_url($fonts_url),
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'auracode_enqueue_google_fonts');
// Output dynamic CSS for brand color
function auracode_customizer_css()
{ ?>
    <style>
        :root {
            --brand-color: <?php echo esc_html(get_theme_mod('brand_color', '#bc6d61')); ?>;
            --color-bg: <?php echo esc_html(get_theme_mod('color_bg', '#ffffff')); ?>;
            --color-text: <?php echo esc_html(get_theme_mod('color_text', '#3f3f3f')); ?>;
            --color-secondary: <?php echo esc_html(get_theme_mod('color_secondary', '#3c463d')); ?>;
            --color-bg-header: <?php echo hex2rgba(get_theme_mod('color_bg_header', '#f7f7f7'), 0.80); ?>;
            --color-bg-footer: <?php echo esc_html(get_theme_mod('color_bg_footer', '#f4f4f4ff')); ?>;
            --font-heading: '<?php echo esc_html(get_theme_mod('font_heading', 'Merriweather')); ?>', sans-serif;
            --font-body: '<?php echo esc_html(get_theme_mod('font_body', 'Lato')); ?>', sans-serif;
        }

        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: var(--font-body);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-heading);
        }

        h2 {
            font-size: 2.2rem;
        }

        .btn-primary {
            background: var(--color-primary);
            color: #fff;
        }

        .btn-secondary {
            border-color: var(--color-primary);
            color: var(--color-primary);
        }
    </style>
<?php }
add_action('wp_head', 'auracode_customizer_css');

function auracode_output_seo_meta()
{
    $title = get_theme_mod('seo_title');
    $desc = get_theme_mod('seo_desc');
    $keywords = get_theme_mod('seo_keywords');
    $schema = get_theme_mod('seo_schema');

    if ($title) echo '<title>' . esc_html($title) . '</title>';
    if ($desc) echo '<meta name="description" content="' . esc_attr($desc) . '">';
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">';
    if ($schema) echo '<script type="application/ld+json">' . wp_kses_post($schema) . '</script>';
}
add_action('wp_head', 'auracode_output_seo_meta');



// --- REJESTRACJA MENU (header + footer) ---
function simpletheme_register_menus()
{
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'simpletheme'),
        'footer_menu' => __('Footer Menu', 'simpletheme'),
    ));
}
add_action('after_setup_theme', 'simpletheme_register_menus');


// --- AUTOMATYCZNE TWORZENIE OBU MENU ---
function simpletheme_create_default_menus()
{

    /* ----------------------------------
       HEADER MENU 
    ----------------------------------- */
    $header_menu = 'Header Menu';
    if (!wp_get_nav_menu_object($header_menu)) {

        $menu_id = wp_create_nav_menu($header_menu);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => 'O mnie',
            'menu-item-url'   => home_url('/#about'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => 'Usługi',
            'menu-item-url'   => home_url('/#services'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => 'Kontakt',
            'menu-item-url'   => home_url('/#contact'),
            'menu-item-status' => 'publish',
        ]);

        // przypisanie lokalizacji
        $locations = get_theme_mod('nav_menu_locations');
        $locations['header_menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }


    /* ----------------------------------
       FOOTER MENU 
    ----------------------------------- */
    $footer_menu = 'Footer Menu';
    if (!wp_get_nav_menu_object($footer_menu)) {

        $menu_id_footer = wp_create_nav_menu($footer_menu);

        wp_update_nav_menu_item($menu_id_footer, 0, [
            'menu-item-title' => 'Polityka prywatności',
            'menu-item-url'   => home_url('/polityka-prywatnosci'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id_footer, 0, [
            'menu-item-title' => 'Regulamin',
            'menu-item-url'   => home_url('/regulamin'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id_footer, 0, [
            'menu-item-title' => 'Kontakt',
            'menu-item-url'   => home_url('/#contact'),
            'menu-item-status' => 'publish',
        ]);

        // przypisanie do lokalizacji
        $locations = get_theme_mod('nav_menu_locations');
        $locations['footer_menu'] = $menu_id_footer;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'simpletheme_create_default_menus');
