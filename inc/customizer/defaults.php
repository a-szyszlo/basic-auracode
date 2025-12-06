<?php
// Populate theme_mods with default values on theme activation

function auracode_set_default_mods()
{
    // Global styles
    $defaults = array(
        'brand_color' => '#bc6d61',
        'color_secondary' => '#f4efee',
        'color_bg' => '#ffffff',
        'color_text' => '#3f3f3f',
        'color_bg_header' => '#f7f7f7',
        'color_bg_footer' => '#f9f9f9',
        'font_heading' => 'Merriweather',
        'font_body' => 'Lato',

        // Social
        'social_facebook' => 'https://facebook.com/auracodepl',
        'social_instagram' => 'https://instagram.com/auracodepl',
        'social_linkedin' => '',
        'social_custom1_icon' => '',
        'social_custom1_url' => '',
        'social_custom2_icon' => '',
        'social_custom2_url' => '',

        // Hero
        'hero_title' => 'Odzyskaj równowagę ciała i umysłu',
        'hero_desc' => '<p>Zanurz się w świecie <strong>spokoju </strong>i <strong>harmonii</strong>.</p><p>Nauczę Cię, jak poprzez ruch i oddech odzyskać <strong>kontakt ze swoim ciałem</strong>, uwolnić napięcia i wprowadzić więcej <strong>uważności do codzienności.</strong></p>',
        'hero_btn1' => 'Skontaktuj się',
        'hero_btn2' => 'Dowiedz się więcej',
        'hero_image' => get_template_directory_uri() . '/assets/img/default_img/yogaflow.png',

        // About
        'about_title' => 'Tytuł o mnie',
        'about_text' => '<p>Nazywam się Anna Lewicka i od ponad 10 lat uczę<strong> jogi</strong>,<strong> medytacji </strong>i <strong>pracy z oddechem</strong>.
Swoją praktykę rozpoczęłam, kiedy sama szukałam spokoju w intensywnym tempie życia.&nbsp;</p><p><strong>Dziś pomagam innym odnaleźć ten sam balans</strong> – niezależnie od wieku i doświadczenia.

Moje zajęcia łączą elementy jogi klasycznej, vinyasy i stretchingu, dzięki czemu każdy może znaleźć coś dla siebie.&nbsp;</p><p>Wierzę, że joga nie jest tylko ruchem –<strong> to sposób na życie,</strong> który pomaga odnaleźć <em>lekkość</em> i <em>wdzięczność </em>w codziennych chwilach.</p>',
        'about_image' => get_template_directory_uri() . '/assets/img/default_img/yogaflov_studio_jogi.png',

        // Numbers
        'number_1' => 14000,
        'number_prefix_1' => '+',
        'number_suffix_1' => '',
        'number_label_1' => 'uczestników zajęć',
        'number_2' => 100,
        'number_prefix_2' => '',
        'number_suffix_2' => '%',
        'number_label_2' => 'pozytywnych opinii',
        'number_3' => 10,
        'number_prefix_3' => '+',
        'number_suffix_3' => '',
        'number_label_3' => 'lat doświadczenia',

        // CTA
        'cta_title' => 'Gotowa, by zacząć?',
        'cta_desc' => '<p><strong>Skontaktuj się ze mną</strong> i rozpocznij swoją podróż ku większemu spokojowi i równowadze.
Razem znajdziemy praktykę, która najlepiej odpowie <strong>Twoim potrzebom</strong>.</p>',
        'cta_image' => get_template_directory_uri() . '/assets/img/default_img/kontakt_joga.png',
        'cta_btn1_text' => 'Skontaktuj się',
        'cta_btn1_url' => '#kontakt',
        'cta_btn2_text' => 'Zobacz ofertę',
        'cta_btn2_url' => '#uslugi',

        // Services (JSON)
        'services_list' => json_encode([
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
        ]),

        // Process
        'process_title' => 'Jak to działa',
        'process_desc' => 'Podczas pierwszego kontaktu ustalamy Twoje potrzeby, poziom zaawansowania i cele. Dzięki temu mogę dobrać odpowiedni styl i tempo praktyki.',
        'process_step_num_1' => '.I',
        'process_step_title_1' => 'Pierwsze spotkanie i konsultacja',
        'process_step_desc_1' => 'Tutaj analizujemy potrzeby klienta i zbieramy wszystkie wymagania.',
        'process_step_num_2' => '.II',
        'process_step_title_2' => 'Indywidualny plan praktyki',
        'process_step_desc_2' => 'Na podstawie rozmowy przygotowuję plan zajęć – dopasowany do Twojego rytmu życia. Możesz wybrać praktykę online lub spotkania na żywo w moim studiu.',
        'process_step_num_3' => '.III',
        'process_step_title_3' => 'Wspólna praktyka i rozwój',
        'process_step_desc_3' => 'Krok po kroku wprowadzamy nowe techniki, uczymy się uważności i świadomego ruchu. Po kilku tygodniach zauważysz, że nie tylko Twoje ciało, ale i umysł stają się bardziej elastyczne.',

        // Contact
        'contact_title' => 'Skontaktuj się ze mną',
        'contact_desc' => 'Masz pytania? Skontaktuj się przez poniższe dane.',
        'contact_phone' => '+48 600 000 000',
        'contact_email' => 'kontakt@twojadomena.pl',
        'contact_address' => 'ul. Przykładowa 12, 00-000 Warszawa',

        // Footer
        'footer_logo' => '',
        'footer_company_info' => '<strong>Nazwa firmy</strong><br>ul. Przykładowa 1<br>00-000 Miasto<br>NIP: 000-000-00-00',

        // SEO
        'seo_title' => '',
        'seo_desc' => '',
        'seo_keywords' => '',
        'seo_schema' => '',
    );

    foreach ($defaults as $key => $value) {
        // Only set when not present in DB
        $existing = get_theme_mod($key, null);
        if ($existing === null || $existing === '') {
            set_theme_mod($key, $value);
        }
    }
}

// Run on theme activation
add_action('after_switch_theme', 'auracode_set_default_mods');

// Optional: ensure defaults even if theme was activated before
add_action('after_setup_theme', 'auracode_set_default_mods');
