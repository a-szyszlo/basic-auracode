<?php get_header(); ?>
<!-- HERO -->
<section class="hero">
  <div class="container hero-wrapper">

    <div class="hero-text">
      <h1 class="reveal"><?php echo esc_html(get_theme_mod('hero_title', 'Twój nagłówek H1')); ?></h1>
      <div class="reveal"><?php echo wp_kses_post(get_theme_mod('hero_desc', 'Krótki opis')); ?></div>
      <p class="reveal">
        <a href="#contact" class="btn"><?php echo esc_html(get_theme_mod('hero_btn1', 'Skontaktuj się')); ?></a>
        <a href="#services" class="btn secondary"><?php echo esc_html(get_theme_mod('hero_btn2', 'Dowiedz się więcej')); ?></a>
      </p>
    </div>

    <div class="hero-img reveal">
      <?php $hero_img = get_theme_mod('hero_image');
      if ($hero_img) : ?>
        <img src="<?php echo esc_url($hero_img); ?>" alt="Hero image">
      <?php else: ?>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-hero.jpg" alt="Hero placeholder">
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="about" id="about">
  <div class="container about-inner">
    <div class="about-img reveal">
      <?php $about_img = get_theme_mod('about_image');
      if ($about_img): ?>
        <img src="<?php echo esc_url($about_img); ?>" alt="O mnie">
      <?php else: ?>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-about.jpg" alt="Placeholder">
      <?php endif; ?>
    </div>
    <div class="about-content">
      <h2 class="about-title reveal"><?php echo esc_html(get_theme_mod('about_title', 'O mnie')); ?></h2>
      <div class="about-text reveal"><?php echo wp_kses_post(get_theme_mod('about_text', 'Tu opisz siebie.')); ?></div>
    </div>
  </div>
</section>

<section id="numbers" class="numbers-section">
  <div class="container">
    <div class="numbers-wrapper reveal">
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <div class="number-box">
          <div class="number"
            data-target="<?php echo esc_attr(get_theme_mod("number_$i", 0)); ?>"
            data-prefix="<?php echo esc_attr(get_theme_mod("number_prefix_$i", '')); ?>"
            data-suffix="<?php echo esc_attr(get_theme_mod("number_suffix_$i", '')); ?>"
            data-current="0">
            <?php
            $prefix = get_theme_mod("number_prefix_$i", '');
            $num    = get_theme_mod("number_$i", 0);
            $suffix = get_theme_mod("number_suffix_$i", '');
            echo esc_html($prefix . $num . $suffix);
            ?>
          </div>
          <div class="label">
            <?php echo esc_html(get_theme_mod("number_label_$i", "Opis $i")); ?>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- SERVICES -->
<?php
$services_json = get_theme_mod('services_list', '[]');
$services = json_decode($services_json, true);
if ($services): ?>
  <section id="services" class="services">
    <div class="container">
      <h2 class="reveal">Usługi</h2>
      <div class="services-grid reveal-in-row">
        <?php foreach ($services as $service): ?>
          <div class="service-wrapper in-row">

            <?php if (!empty($service['image'])): ?>
              <div class="service-img">
                <img src="<?php echo esc_url($service['image']); ?>" alt="">
              </div>
            <?php endif; ?>

            <div class="service-text">
              <h3><?php echo esc_html($service['title']); ?></h3>
              <p><?php echo esc_html($service['desc']); ?></p>

                <?php 
                  $btnEnabled = !empty($service['button_enabled']) ? $service['button_enabled'] : (!empty($service['hasButton']) ? $service['hasButton'] : false);
                  $btnUrl     = !empty($service['button_url']) ? $service['button_url'] : (!empty($service['buttonLink']) ? $service['buttonLink'] : '');
                  $btnText    = !empty($service['button_text']) ? $service['button_text'] : (!empty($service['buttonText']) ? $service['buttonText'] : 'Zobacz więcej');
                ?>
                <?php if ($btnEnabled && !empty($btnUrl)) : ?>
                  <a href="<?php echo esc_url($btnUrl); ?>" class="service-btn">
                    <?php echo esc_html($btnText); ?>
                  </a>
                <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <div class="cta-content">
      <div class="cta-text">
        <h2 class="cta-title reveal">
          <?php echo get_theme_mod('cta_title', 'Gotowy, by zacząć?'); ?>
        </h2>
        <div class="cta-desc reveal">
          <?php echo get_theme_mod('cta_desc', 'Skontaktuj się ze mną, a wspólnie stworzymy coś wyjątkowego.'); ?>
        </div>

        <div class="cta-buttons reveal">
          <?php if ($btn1 = get_theme_mod('cta_btn1_text')): ?>
            <a href="<?php echo esc_url(get_theme_mod('cta_btn1_url', '#')); ?>" class="btn primary">
              <?php echo esc_html($btn1); ?>
            </a>
          <?php endif; ?>

          <?php if ($btn2 = get_theme_mod('cta_btn2_text')): ?>
            <a href="<?php echo esc_url(get_theme_mod('cta_btn2_url', '#')); ?>" class="btn secondary">
              <?php echo esc_html($btn2); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <div class="cta-image reveal">
        <?php if ($img = get_theme_mod('cta_image')): ?>
          <img src="<?php echo esc_url($img); ?>" alt="">
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- USER CONTENT -->
<?php if (have_posts()) : ?>
  <section class="user-content" id="content">
    <div class="container">
      <?php while (have_posts()) : the_post(); ?>
        <div class="entry-content reveal">
          <?php echo apply_filters('the_content', get_the_content()); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>

<!-- PROCESS -->
<section class="process-section">
  <div class="container">
    <h2 class="section-title reveal"><?php echo get_theme_mod('process_title', 'Jak to działa'); ?></h2>
    <div class="section-desc reveal"><?php echo get_theme_mod('process_desc', 'Zobacz, jak wygląda współpraca krok po kroku.'); ?></div>

    <div class="process-steps reveal-in-row">
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <div class="process-step in-row">
          <div class="step-num"><?php echo get_theme_mod("process_step_num_$i", "$i"); ?></div>
          <h3 class="step-title"><?php echo get_theme_mod("process_step_title_$i", "Tytuł etapu $i"); ?></h3>
          <p class="step-desc"><?php echo get_theme_mod("process_step_desc_$i", "Opis etapu $i – tutaj wpisz, co się dzieje na tym etapie."); ?></p>
          <?php if ($i < 3): ?>
            <div class="process-arrow">
              <svg width="483" height="251" viewBox="0 0 483 251" xmlns="http://www.w3.org/2000/svg">
                <path id="XMLID-728-" fill="#000000" stroke="none" d="M 442.284576 184.867706 C 350.931824 217.227646 264.884369 205.589752 179.895279 162.416138 C 177.117508 164.120697 173.163681 166.300766 169.465439 168.8526 C 128.688019 196.982758 93.086868 196.944687 52.555565 168.244843 C 34.333679 155.34259 19.362001 139.194427 7.968891 119.966003 C 4.94951 114.869308 2.205441 109.146378 1.254429 103.393784 C -0.336513 93.769485 4.269948 89.644485 13.974315 92.489014 C 23.665031 126.847572 69.366364 165.415863 104.492981 168.883774 C 125.81842 170.989899 143.270615 162.194427 160.508636 148.531082 C 157.214645 144.328796 154.241776 141.004669 151.792374 137.33255 C 139.609589 119.063583 126.673241 101.207901 115.862358 82.152725 C 110.760933 73.159851 108.717552 61.955963 107.253899 51.480804 C 104.642036 32.784805 110.391533 17.045486 127.716064 7.179535 C 145.172455 -2.760773 167.135376 -1.367783 182.492874 10.876282 C 194.308304 20.295807 202.478165 32.387115 206.957458 46.847092 C 214.9487 72.643402 214.511795 98.226639 204.718445 123.521606 C 202.799164 128.480011 200.904312 133.446106 199.080246 138.196045 C 248.423187 182.006592 387.404724 188.760742 434.470062 159.744537 C 416.554504 149.401871 393.325378 152.40918 379.266815 136.222809 C 380.622467 127.020668 386.713531 126.769531 392.928009 127.891312 C 417.920776 132.402542 442.962006 136.730438 467.789673 142.039703 C 482.147919 145.110779 485.467712 152.342392 479.028809 165.33223 C 467.121613 189.355682 455.952393 213.50415 451.093323 240.217941 C 450.371246 244.188354 444.685059 247.255722 441.29538 250.740768 C 438.090973 247.066895 432.124908 243.349915 432.182556 239.72879 C 432.382202 227.221405 434.298584 214.68306 436.352356 202.289047 C 437.300293 196.569397 440.07962 191.152039 442.284576 184.867706 Z M 177.019775 125.671829 C 195.9198 99.774673 194.716736 56.023392 175.64241 35.223831 C 172.575012 31.877686 168.684799 28.943161 164.624908 26.924698 C 156.237396 22.754745 147.975052 24.167557 139.993698 28.871292 C 131.44957 33.905823 131.372116 42.055283 132.849258 49.908539 C 138.557663 80.264465 155.5047 103.925537 177.019775 125.671829 Z" />
              </svg>
            </div>
          <?php endif; ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section class="contact" id="contact">
  <div class="container">
    <h2><?php echo esc_html(get_theme_mod('contact_title', 'Skontaktuj się ze mną')); ?></h2>
    <p class="contact-desc"><?php echo esc_html(get_theme_mod('contact_desc', 'Masz pytania? Skontaktuj się przez poniższe dane.')); ?></p>

    <div class="contact-info">
      <p class="contact-phone">
        <svg class="icon" width="20" height="20" aria-hidden="true"><use href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sprite-icons.svg#phone"></use></svg>
        <strong>Telefon:</strong> <?php echo esc_html(get_theme_mod('contact_phone', '+48 600 000 000')); ?></p>
      <p class="contact-email">
        <svg class="icon" width="20" height="20" aria-hidden="true"><use href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sprite-icons.svg#at-symbol"></use></svg>
        <strong>E-mail:</strong> <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'kontakt@twojadomena.pl')); ?>"><?php echo esc_html(get_theme_mod('contact_email', 'kontakt@twojadomena.pl')); ?></a></p>
      <p class="contact-address">
        <svg class="icon" width="20" height="20" aria-hidden="true"><use href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sprite-icons.svg#map-pin"></use></svg>
        <strong>Adres:</strong> <?php echo esc_html(get_theme_mod('contact_address', 'ul. Przykładowa 12, 00-000 Warszawa')); ?></p>
    </div>

  </div>
  </div>
</section>


<?php get_footer(); ?>