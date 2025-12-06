<?php
// Modularized version of auracode_customize_register from functions.php

if (!function_exists('auracode_customize_register')) {
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

    $wp_customize->add_setting('color_bg_header', array('default' => '#f7f7f7'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_bg_header', array(
        'label' => 'Kolor tła nagłówka',
        'section' => 'global_styles',
        'settings' => 'color_bg_header',
    )));

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

    $wp_customize->add_setting('social_facebook', array('default' => 'https://facebook.com/auracodepl'));
    $wp_customize->add_control('social_facebook_control', array(
        'label' => 'Facebook URL',
        'section' => 'social_section',
        'settings' => 'social_facebook',
    ));

    $wp_customize->add_setting('social_instagram', array('default' => 'https://instagram.com/auracodepl'));
    $wp_customize->add_control('social_instagram_control', array(
        'label' => 'Instagram URL',
        'section' => 'social_section',
        'settings' => 'social_instagram',
    ));

    $wp_customize->add_setting('social_linkedin', array('default' => ''));
    $wp_customize->add_control('social_linkedin_control', array(
        'label' => 'LinkedIn URL',
        'section' => 'social_section',
        'settings' => 'social_linkedin',
    ));

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
        'input_attrs' => array('class' => 'customizer-richtext'),
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
    $wp_customize->add_control('about_title_control', array(
        'label' => 'Tytuł o mnie',
        'section' => 'about_section',
        'settings' => 'about_title',
        'type' => 'textarea'
    ));

    $wp_customize->add_setting('about_text', array('default' => '<p>Nazywam się Anna Lewicka i od ponad 10 lat uczę<strong> jogi</strong>,<strong> medytacji </strong>i <strong>pracy z oddechem</strong>.
Swoją praktykę rozpoczęłam, kiedy sama szukałam spokoju w intensywnym tempie życia.&nbsp;</p><p><strong>Dziś pomagam innym odnaleźć ten sam balans</strong> – niezależnie od wieku i doświadczenia.

Moje zajęcia łączą elementy jogi klasycznej, vinyasy i stretchingu, dzięki czemu każdy może znaleźć coś dla siebie.&nbsp;</p><p>Wierzę, że joga nie jest tylko ruchem –<strong> to sposób na życie,</strong> który pomaga odnaleźć <em>lekkość</em> i <em>wdzięczność </em>w codziennych chwilach.</p>', 'sanitize_callback' => 'wp_kses_post',));
    $wp_customize->add_control('about_text_control', array(
        'label' => 'Tekst o mnie',
        'section' => 'about_section',
        'settings' => 'about_text',
        'type' => 'textarea',
        'input_attrs' => array('class' => 'customizer-richtext'),
    ));

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
        $wp_customize->add_setting("number_$i", array('default' => $default_numbers[$i - 1]));
        $wp_customize->add_control("number_{$i}_control", array(
            'label'    => "Liczba $i",
            'section'  => 'numbers_section',
            'settings' => "number_$i",
            'type'     => 'number',
        ));

        $wp_customize->add_setting("number_prefix_$i", array('default' => $default_prefixes[$i - 1]));
        $wp_customize->add_control("number_prefix_{$i}_control", array(
            'label'    => "Prefix $i (np. +)",
            'section'  => 'numbers_section',
            'settings' => "number_prefix_$i",
            'type'     => 'text',
        ));

        $wp_customize->add_setting("number_suffix_$i", array('default' => $default_suffixes[$i - 1]));
        $wp_customize->add_control("number_suffix_{$i}_control", array(
            'label'    => "Suffix $i (np. %)",
            'section'  => 'numbers_section',
            'settings' => "number_suffix_$i",
            'type'     => 'text',
        ));

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
        'input_attrs' => array('class' => 'customizer-richtext'),
    ));

    $wp_customize->add_setting('cta_image', array(
        'default' => get_template_directory_uri() . '/assets/img/default_img/kontakt_joga.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_image_control', array(
        'label' => 'Obrazek (prawa kolumna)',
        'section' => 'cta_section',
        'settings' => 'cta_image'
    )));

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
    $wp_customize->add_setting('services_list', array(
        'default' => $default_services,
        'sanitize_callback' => function($value) {
            // Basic JSON validation
            json_decode($value, true);
            return (json_last_error() === JSON_ERROR_NONE) ? $value : '[]';
        }
    ));
    $wp_customize->add_control('services_list_control', array(
        'label' => 'Lista usług (JSON)',
        'description' => "Użyj pól: title, desc, image, button_enabled (bool), button_text, button_url.",
        'section' => 'services_section',
        'settings' => 'services_list',
        'type' => 'textarea'
    ));

    // ----------------- Process -----------------
    $wp_customize->add_section('process_section', array(
        'title' => 'Sekcja: Proces',
        'priority' => 70,
    ));

    $wp_customize->add_setting('process_title', array('default' => 'Jak to działa'));
    $wp_customize->add_control('process_title_control', array(
        'label' => 'Tytuł sekcji',
        'section' => 'process_section',
        'settings' => 'process_title',
    ));

    $wp_customize->add_setting('process_desc', array('default' => 'Podczas pierwszego kontaktu ustalamy Twoje potrzeby, poziom zaawansowania i cele. Dzięki temu mogę dobrać odpowiedni styl i tempo praktyki.',));
    $wp_customize->add_control('process_desc_control', array(
        'label' => 'Opis sekcji',
        'section' => 'process_section',
        'settings' => 'process_desc',
        'type' => 'textarea',
    ));

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
        $wp_customize->add_setting("process_step_num_$i", array('default' => $default_step_nums[$i - 1]));
        $wp_customize->add_control("process_step_num_{$i}_control", array(
            'label' => "Etap $i – numer",
            'section' => 'process_section',
            'settings' => "process_step_num_$i",
        ));

        $wp_customize->add_setting("process_step_title_$i", array('default' => $default_step_titles[$i - 1]));
        $wp_customize->add_control("process_step_title_{$i}_control", array(
            'label' => "Etap $i – tytuł",
            'section' => 'process_section',
            'settings' => "process_step_title_$i",
        ));

        $wp_customize->add_setting("process_step_desc_$i", array('default' => $default_step_descs[$i - 1]));
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

    $wp_customize->add_setting('contact_title', array('default' => 'Skontaktuj się ze mną'));
    $wp_customize->add_control('contact_title_control', array(
        'label' => 'Tytuł (H2)',
        'section' => 'contact_section',
        'settings' => 'contact_title',
    ));

    $wp_customize->add_setting('contact_desc', array('default' => 'Masz pytania? Skontaktuj się przez poniższe dane.'));
    $wp_customize->add_control('contact_desc_control', array(
        'label' => 'Opis',
        'section' => 'contact_section',
        'settings' => 'contact_desc',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('contact_phone', array('default' => '+48 600 000 000'));
    $wp_customize->add_control('contact_phone_control', array(
        'label' => 'Telefon',
        'section' => 'contact_section',
        'settings' => 'contact_phone',
    ));

    $wp_customize->add_setting('contact_email', array('default' => 'kontakt@twojadomena.pl'));
    $wp_customize->add_control('contact_email_control', array(
        'label' => 'E-mail',
        'section' => 'contact_section',
        'settings' => 'contact_email',
    ));

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

    $wp_customize->add_setting('footer_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo_control', array(
        'label' => 'Logo w stopce',
        'section' => 'footer_section',
        'settings' => 'footer_logo',
    )));

    $wp_customize->add_setting('footer_company_info', array('default' => '<strong>Nazwa firmy</strong><br>ul. Przykładowa 1<br>00-000 Miasto<br>NIP: 000-000-00-00', 'sanitize_callback' => 'wp_kses_post',));
    $wp_customize->add_control('footer_company_info_control', array(
        'label' => 'Dane firmy',
        'section' => 'footer_section',
        'settings' => 'footer_company_info',
        'type' => 'textarea',
        'input_attrs' => array('class' => 'customizer-richtext'),
    ));

    // SEO Sekcja
    $wp_customize->add_section('seo_section', array(
        'title' => 'Ustawienia SEO i Schema',
        'priority' => 95,
    ));

    $wp_customize->add_setting('seo_title', array('sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('seo_title_control', array(
        'label' => 'Meta Title',
        'section' => 'seo_section',
        'settings' => 'seo_title',
    ));

    $wp_customize->add_setting('seo_desc', array('sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('seo_desc_control', array(
        'label' => 'Meta Description',
        'section' => 'seo_section',
        'settings' => 'seo_desc',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('seo_keywords', array('sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('seo_keywords_control', array(
        'label' => 'Słowa kluczowe (keywords)',
        'section' => 'seo_section',
        'settings' => 'seo_keywords',
    ));

    $wp_customize->add_setting('seo_schema', array('sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control('seo_schema_control', array(
        'label' => 'Schema JSON-LD (np. LocalBusiness)',
        'section' => 'seo_section',
        'settings' => 'seo_schema',
        'type' => 'textarea',
    ));

    // Selective Refresh
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('hero_title', array(
            'selector' => '.hero-text h1',
            'render_callback' => function () { return get_theme_mod('hero_title'); },
        ));
        $wp_customize->selective_refresh->add_partial('hero_desc', array(
            'selector' => '.hero-text p',
            'render_callback' => function () { return get_theme_mod('hero_desc'); },
        ));
        $wp_customize->selective_refresh->add_partial('hero_btn1', array(
            'selector' => '.hero-buttons .btn:first-child',
            'render_callback' => function () { return get_theme_mod('hero_btn1'); },
        ));
        $wp_customize->selective_refresh->add_partial('hero_btn2', array(
            'selector' => '.hero-buttons .btn:last-child',
            'render_callback' => function () { return get_theme_mod('hero_btn2'); },
        ));
        $wp_customize->selective_refresh->add_partial('hero_image', array(
            'selector' => '.hero-image img',
            'render_callback' => function () {
                $img = get_theme_mod('hero_image');
                return $img ? '<img src="' . esc_url($img) . '" alt="">' : '';
            },
        ));

        $wp_customize->selective_refresh->add_partial('about_title', array(
            'selector' => '.about-title',
            'render_callback' => function () { return get_theme_mod('about_title'); },
        ));
        $wp_customize->selective_refresh->add_partial('about_text', array(
            'selector' => '.about-text',
            'render_callback' => function () { return get_theme_mod('about_text'); },
        ));
        $wp_customize->selective_refresh->add_partial('about_image', array(
            'selector' => '.about-image img',
            'render_callback' => function () {
                $img = get_theme_mod('about_image');
                return $img ? '<img src="' . esc_url($img) . '" alt="">' : '';
            },
        ));

        $default_numbers  = [14000, 100, 10];
        $default_prefixes = ['+', '', '+'];
        $default_suffixes = ['', '%', ''];
        $default_labels   = ['uczestników zajęć', 'pozytywnych opinii', 'lat doświadczenia'];
        for ($i = 1; $i <= 3; $i++) {
            $wp_customize->add_setting("number_group_$i", array('default' => ''));
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, "number_group_{$i}_control", array(
                'label' => "Licznik $i",
                'section' => 'numbers_section',
                'settings' => "number_group_$i",
                'type' => 'hidden',
            )));

            $wp_customize->add_setting("number_$i", array('default' => $default_numbers[$i - 1]));
            $wp_customize->add_control("number_{$i}_control", array(
                'label'    => "Liczba $i",
                'section'  => 'numbers_section',
                'settings' => "number_$i",
                'type'     => 'number',
                'description' => 'Wpisz główną wartość licznika',
            ));

            $wp_customize->add_setting("number_prefix_$i", array('default' => $default_prefixes[$i - 1]));
            $wp_customize->add_control("number_prefix_{$i}_control", array(
                'label'    => "Prefix $i",
                'section'  => 'numbers_section',
                'settings' => "number_prefix_$i",
                'type'     => 'text',
                'description' => 'Tekst lub znak przed liczbą (np. +)',
            ));

            $wp_customize->add_setting("number_suffix_$i", array('default' => $default_suffixes[$i - 1]));
            $wp_customize->add_control("number_suffix_{$i}_control", array(
                'label'    => "Suffix $i",
                'section'  => 'numbers_section',
                'settings' => "number_suffix_$i",
                'type'     => 'text',
                'description' => 'Tekst lub znak po liczbie (np. %)',
            ));

            $wp_customize->add_setting("number_label_$i", array('default' => $default_labels[$i - 1]));
            $wp_customize->add_control("number_label_{$i}_control", array(
                'label'    => "Etykieta $i",
                'section'  => 'numbers_section',
                'settings' => "number_label_$i",
                'type'     => 'text',
                'description' => 'Tekst pod liczbą',
            ));
        }

        $wp_customize->selective_refresh->add_partial('process_title', array(
            'selector' => '.process-section .section-title',
            'render_callback' => function () { return get_theme_mod('process_title'); },
        ));
        $wp_customize->selective_refresh->add_partial('process_desc', array(
            'selector' => '.process-section .section-desc',
            'render_callback' => function () { return get_theme_mod('process_desc'); },
        ));
        for ($i = 1; $i <= 3; $i++) {
            $wp_customize->selective_refresh->add_partial("process_step_title_$i", array(
                'selector' => ".process-step:nth-child($i) .step-title",
                'render_callback' => function () use ($i) { return get_theme_mod("process_step_title_$i"); },
            ));
            $wp_customize->selective_refresh->add_partial("process_step_desc_$i", array(
                'selector' => ".process-step:nth-child($i) .step-desc",
                'render_callback' => function () use ($i) { return get_theme_mod("process_step_desc_$i"); },
            ));
            $wp_customize->selective_refresh->add_partial("process_step_num_$i", array(
                'selector' => ".process-step:nth-child($i) .step-num",
                'render_callback' => function () use ($i) { return get_theme_mod("process_step_num_$i"); },
            ));
        }

        $wp_customize->selective_refresh->add_partial('cta_title', array(
            'selector' => '.cta-title',
            'render_callback' => function () { return get_theme_mod('cta_title'); },
        ));
        $wp_customize->selective_refresh->add_partial('cta_desc', array(
            'selector' => '.cta-desc',
            'render_callback' => function () { return get_theme_mod('cta_desc'); },
        ));

        $wp_customize->selective_refresh->add_partial('contact_title', array(
            'selector' => '.contact h2',
            'render_callback' => function () { return get_theme_mod('contact_title'); },
        ));
        $wp_customize->selective_refresh->add_partial('contact_desc', array(
            'selector' => '.contact p',
            'render_callback' => function () { return get_theme_mod('contact_desc'); },
        ));
        $wp_customize->selective_refresh->add_partial('contact_phone', array(
            'selector' => '.contact-phone',
            'render_callback' => function () { return get_theme_mod('contact_phone'); },
        ));
        $wp_customize->selective_refresh->add_partial('contact_email', array(
            'selector' => '.contact-email',
            'render_callback' => function () { return get_theme_mod('contact_email'); },
        ));
        $wp_customize->selective_refresh->add_partial('contact_address', array(
            'selector' => '.contact-address',
            'render_callback' => function () { return get_theme_mod('contact_address'); },
        ));
    }
}
}
add_action('customize_register', 'auracode_customize_register');
