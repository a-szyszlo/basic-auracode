<footer class="site-footer">
  <div class="container footer-grid">

    <div class="footer-column company-info">
      <?php if ($logo = get_theme_mod('footer_logo')) : ?>
        <div class="footer-logo">
          <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>">
        </div>
      <?php endif; ?>

      <div class="footer-address">
        <?php echo wp_kses_post(get_theme_mod('footer_company_info')); ?>
      </div>
    </div>

    <div class="footer-column footer-menu">
      <h3> Menu </h3>
      <?php
      wp_nav_menu(array(
        'theme_location' => 'footer_menu',
        'container' => false,
        'menu_class' => 'footer-nav',
        'fallback_cb' => false
      ));
      ?>
    </div>

    <div class="footer-column footer-social">
      <h3> Znajdź nas w social media </h3>
      <ul class="social-list">
        <?php if ($fb = get_theme_mod('social_facebook')) : ?>
          <li><a href="<?php echo esc_url($fb); ?>" target="_blank" aria-label="Facebook">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M22 12a10 10 0 1 0-11.5 9.87v-7H8v-2.87h2.5V9.75c0-2.48 1.48-3.87 3.74-3.87 1.08 0 2.2.2 2.2.2v2.43h-1.24c-1.22 0-1.6.76-1.6 1.54v1.85H16.9L16.5 15h-2.9v7A10 10 0 0 0 22 12z" />
              </svg>
            </a></li>
        <?php endif; ?>

        <?php if ($ig = get_theme_mod('social_instagram')) : ?>
          <li><a href="<?php echo esc_url($ig); ?>" target="_blank" aria-label="Instagram">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.2c3.2 0 3.6 0 4.9.07 1.2.06 1.9.25 2.35.42.6.24 1.03.53 1.48.98.45.45.74.88.98 1.48.17.45.36 1.15.42 2.35.07 1.3.07 1.7.07 4.9s0 3.6-.07 4.9c-.06 1.2-.25 1.9-.42 2.35a3.4 3.4 0 0 1-.98 1.48 3.4 3.4 0 0 1-1.48.98c-.45.17-1.15.36-2.35.42-1.3.07-1.7.07-4.9.07s-3.6 0-4.9-.07c-1.2-.06-1.9-.25-2.35-.42a3.4 3.4 0 0 1-1.48-.98 3.4 3.4 0 0 1-.98-1.48c-.17-.45-.36-1.15-.42-2.35C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.9c.06-1.2.25-1.9.42-2.35a3.4 3.4 0 0 1 .98-1.48 3.4 3.4 0 0 1 1.48-.98c.45-.17 1.15-.36 2.35-.42C8.4 2.2 8.8 2.2 12 2.2zM12 5.8A6.2 6.2 0 1 0 18.2 12 6.2 6.2 0 0 0 12 5.8zm0 10.2A4 4 0 1 1 16 12a4 4 0 0 1-4 4zm6.4-10.8a1.44 1.44 0 1 1-1.44-1.44 1.44 1.44 0 0 1 1.44 1.44z" />
              </svg>
            </a></li>
        <?php endif; ?>

        <?php if ($li = get_theme_mod('social_linkedin')) : ?>
          <li><a href="<?php echo esc_url($li); ?>" target="_blank" aria-label="LinkedIn">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 0h-14a5 5 0 0 0-5 5v14a5 5 0 0 0 5 5h14a5 5 0 0 0 5-5v-14a5 5 0 0 0-5-5zM8 19H5V9h3zm-1.5-11.3a1.8 1.8 0 1 1 0-3.6 1.8 1.8 0 0 1 0 3.6zM20 19h-3v-5c0-1.1-.9-2-2-2s-2 .9-2 2v5h-3V9h3v1.3c.6-.9 1.6-1.3 2.6-1.3 2 0 3.4 1.4 3.4 3.7z" />
              </svg>
            </a></li>
        <?php endif; ?>

        <?php if ($custom1 = get_theme_mod('social_custom1_url')) : ?>
          <li><a href="<?php echo esc_url($custom1); ?>" target="_blank">
              <?php if ($icon1 = get_theme_mod('social_custom1_icon')) : ?>
                <img src="<?php echo esc_url($icon1); ?>" alt="custom1">
              <?php endif; ?>
            </a></li>
        <?php endif; ?>

        <?php if ($custom2 = get_theme_mod('social_custom2_url')) : ?>
          <li><a href="<?php echo esc_url($custom2); ?>" target="_blank">
              <?php if ($icon2 = get_theme_mod('social_custom2_icon')) : ?>
                <img src="<?php echo esc_url($icon2); ?>" alt="custom2">
              <?php endif; ?>
            </a></li>
        <?php endif; ?>
      </ul>
    </div>

  </div>

  <div class="footer-bottom">
    <p>© <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?> • Motyw darmowy autorstwa <a href="https://auracode.pl" target="_blank">AuraCode</a></p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>