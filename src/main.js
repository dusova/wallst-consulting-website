         AOS.init({
            duration: 800,
            once: true
        });

        new Swiper('.testimonials-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });

       window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            document.querySelector('.navbar-brand').classList.add('scrolled');
        } else {
            document.querySelector('.navbar-brand').classList.remove('scrolled');
        }
    });

        document.addEventListener('DOMContentLoaded', function() {
            var dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            dropdownElements.forEach(function(dropdownToggle) {
                new bootstrap.Dropdown(dropdownToggle);
            });
        });

        

       // particlesJS('particles-js', {
         //   particles: {
           //     number: {
             //       value: 80,
               //     density: {
                 //       enable: true,
                   //     value_area: 800
                    //}
                //},
               // color: {
                 //   value: '#ffffff'
               // },
               // opacity: {
                 //   value: 0.5
                /* },
                size: {
                    value: 3
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 6
                }
            }
        }); */

        const countElements = document.querySelectorAll('[data-counter]');
        const animateCounter = (element) => {
            const target = parseInt(element.getAttribute('data-counter'));
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                element.textContent = Math.round(current);
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                }
            }, 30);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        });

        countElements.forEach(element => observer.observe(element));

       document.querySelectorAll('.sidebar-nav a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const section = document.querySelector(this.getAttribute('href'));
            window.scrollTo({
                top: section.offsetTop - 100,
                behavior: 'smooth'
            });
        });
    });
            window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            const sectionHeight = section.clientHeight;
            if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href').substring(1) === section.getAttribute('id')) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });

        