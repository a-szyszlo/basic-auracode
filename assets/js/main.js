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