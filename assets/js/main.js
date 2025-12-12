// Mobile drawer menu toggle
(function(){
  var toggle = document.querySelector('.mobile-nav-toggle');
  var drawer = document.querySelector('.mobile-drawer');
  var closeBtn = document.querySelector('.mobile-nav-close');
  var backdrop = document.querySelector('.mobile-drawer-backdrop');
  var primaryNav = document.getElementById('primary-nav');
  var mobileMount = document.getElementById('mobile-nav-mount');
  var headerInner = document.querySelector('.header-inner');

  function moveNavToDrawer(){ if(primaryNav && mobileMount){ mobileMount.appendChild(primaryNav); primaryNav.classList.add('column'); } }
  function moveNavToHeader(){ if(primaryNav && headerInner){ headerInner.insertBefore(primaryNav, headerInner.querySelector('.mobile-nav-toggle')); primaryNav.classList.remove('column'); } }

  function openDrawer(){ if(!drawer) return; moveNavToDrawer(); drawer.classList.add('open'); drawer.setAttribute('aria-hidden','false'); document.documentElement.classList.add('no-scroll'); }
  function closeDrawer(){ if(!drawer) return; drawer.classList.remove('open'); drawer.setAttribute('aria-hidden','true'); document.documentElement.classList.remove('no-scroll'); moveNavToHeader(); }

  if (toggle) toggle.addEventListener('click', openDrawer);
  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if (backdrop) backdrop.addEventListener('click', closeDrawer);

  // Close on ESC
  document.addEventListener('keydown', function(e){ if(e.key === 'Escape') closeDrawer(); });
})();
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".number-box .number");
  const duration = 2000; 
  const interval = 20;   

  const animateCounter = (counter) => {
    const target = +counter.getAttribute("data-target") || 0;
    let current = 0;
    const steps = duration / interval;          
    const increment = target / steps;          
    const prefix = counter.getAttribute("data-prefix") || '';
    const suffix = counter.getAttribute("data-suffix") || '';

    const updateCount = () => {
      current += increment;
      if (current < target) {
        counter.innerText = prefix + Math.ceil(current) + suffix;
        setTimeout(updateCount, interval);
      } else {
        counter.innerText = prefix + target + suffix;
      }
    };

    updateCount();
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target); 
      }
    });
  }, {
    threshold: 0.3 
  });

  counters.forEach(counter => observer.observe(counter));
});

document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll(".reveal");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target); 
      }
    });
  }, {
    threshold: 0.7
  });

  reveals.forEach(el => observer.observe(el));
});

document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll(".reveal-in-row");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const children = entry.target.querySelectorAll('.in-row');
        if (children.length) {
          children.forEach((child, i) => {
            setTimeout(() => {
              child.classList.add('visible');
            }, i * 150); // 150ms odstępu między elementami
          });
        } else {
          entry.target.classList.add('visible');
        }
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  reveals.forEach(el => observer.observe(el));
});