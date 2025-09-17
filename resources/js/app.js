$(document).ready(function() {
    // Mobile Menu Toggle
    $('#mobile-menu-btn').click(function() {
        $('#mobile-menu').toggleClass('open');
        const icon = $(this).find('i');
        if (icon.hasClass('fa-bars')) {
            icon.removeClass('fa-bars').addClass('fa-times');
        } else {
            icon.removeClass('fa-times').addClass('fa-bars');
        }
    });

    // Close mobile menu when clicking on a link
    $('#mobile-menu a').click(function() {
        $('#mobile-menu').removeClass('open');
        $('#mobile-menu-btn i').removeClass('fa-times').addClass('fa-bars');
    });

    // Navbar scroll effect
    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            $('#navbar').addClass('scrolled');
        } else {
            $('#navbar').removeClass('scrolled');
        }
    });

    // Smooth scrolling for navigation links
    $('a[href^="#"]').click(function(e) {
        e.preventDefault();
        const target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 800);
        }
    });

    // Fade in animation on scroll
    function checkFadeIn() {
        $('.fade-in-up, .fade-in-left, .fade-in-right').each(function() {
            const elementTop = $(this).offset().top;
            const windowBottom = $(window).scrollTop() + $(window).height();
            
            if (elementTop < windowBottom - 100) {
                $(this).addClass('visible');
            }
        });
    }

    $(window).scroll(checkFadeIn);
    checkFadeIn(); // Check on load

    // Counter animation
    function animateCounters() {
        $('.counter').each(function() {
            const $this = $(this);
            const countTo = parseInt($this.data('target'));
            
            $({ countNum: 0 }).animate(
                { countNum: countTo },
                {
                    duration: 2000,
                    easing: 'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(countTo);
                    }
                }
            );
        });
    }

    // Trigger counter animation when section is visible
    let countersAnimated = false;
    $(window).scroll(function() {
        const highlightsSection = $('#highlights');
        if (highlightsSection.length && !countersAnimated) {
            const sectionTop = highlightsSection.offset().top;
            const windowBottom = $(window).scrollTop() + $(window).height();
            
            if (sectionTop < windowBottom - 200) {
                animateCounters();
                countersAnimated = true;
            }
        }
    });

    

    // WhatsApp chat button
    $('#whatsapp-chat button').click(function() {
        window.open('https://wa.me/971501234567', '_blank');
    });

    // Service card hover effects
    $('.service-card, .vessel-card, .testimonial-card').hover(
        function() {
            $(this).addClass('hover-effect');
        },
        function() {
            $(this).removeClass('hover-effect');
        }
    );

    // CTA button clicks
    $('.cta-button').click(function() {
        if ($(this).text().includes('Quote')) {
            $('html, body').animate({
                scrollTop: $('#contact').offset().top - 80
            }, 800);
        } else if ($(this).text().includes('Services')) {
            $('html, body').animate({
                scrollTop: $('#services-overview').offset().top - 80
            }, 800);
        }
    });

    // Vessel card button clicks
    $('.vessel-card button').click(function() {
        // Simulate opening vessel details
        alert('Vessel details would open here. This would typically navigate to a detailed vessel page.');
    });

    // Dynamic background particles
    function createParticle() {
        const particle = $('<div class="particle"></div>');
        particle.css({
            position: 'absolute',
            width: Math.random() * 4 + 1 + 'px',
            height: Math.random() * 4 + 1 + 'px',
            backgroundColor: 'rgba(96, 165, 250, ' + (Math.random() * 0.5 + 0.1) + ')',
            borderRadius: '50%',
            left: Math.random() * $(window).width() + 'px',
            top: $(window).height() + 'px',
            pointerEvents: 'none'
        });
        
        $('#animated-bg').append(particle);
        
        particle.animate({
            top: -50,
            left: '+=' + (Math.random() * 200 - 100)
        }, {
            duration: Math.random() * 3000 + 2000,
            complete: function() {
                particle.remove();
            }
        });
    }

    // Create particles periodically
    setInterval(createParticle, 500);

    // Scroll progress indicator
    $(window).scroll(function() {
        const scrollTop = $(window).scrollTop();
        const docHeight = $(document).height();
        const winHeight = $(window).height();
        const scrollPercent = (scrollTop / (docHeight - winHeight)) * 100;
        
        if (!$('.scroll-indicator').length) {
            $('body').prepend('<div class="scroll-indicator"></div>');
        }
        
        $('.scroll-indicator').css('transform', `scaleX(${scrollPercent / 100})`);
    });

    // Parallax effect for floating elements
    $(window).scroll(function() {
        const scrolled = $(window).scrollTop();
        const rate = scrolled * -0.5;
        
        $('.floating-ship').css('transform', `translateY(${rate}px)`);
        $('.floating-anchor').css('transform', `translateY(${rate * 0.8}px)`);
    });

    // Initialize tooltips and other interactive elements
    $('[data-tooltip]').hover(
        function() {
            const tooltip = $('<div class="tooltip">' + $(this).data('tooltip') + '</div>');
            $('body').append(tooltip);
            
            const position = $(this).offset();
            tooltip.css({
                top: position.top - tooltip.outerHeight() - 10,
                left: position.left + ($(this).outerWidth() / 2) - (tooltip.outerWidth() / 2)
            });
        },
        function() {
            $('.tooltip').remove();
        }
    );

    // Loading animation for vessel images
    $('.vessel-card').each(function() {
        const $card = $(this);
        const $imageContainer = $card.find('.h-48');
        
        $imageContainer.addClass('loading-shimmer');
        
        setTimeout(() => {
            $imageContainer.removeClass('loading-shimmer');
        }, 1000);
    });

    // Dynamic content loading simulation
    function loadContent() {
        $('.service-card, .vessel-card, .testimonial-card').each(function(index) {
            $(this).delay(index * 100).animate({
                opacity: 1,
                transform: 'translateY(0)'
            }, 600);
        });
    }

    // Trigger content loading
    setTimeout(loadContent, 500);
});

// Additional utility functions
function showNotification(message, type = 'info') {
    const notification = $(`
        <div class="notification ${type} fixed top-4 right-4 z-50 bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg">
            ${message}
        </div>
    `);
    
    $('body').append(notification);
    
    setTimeout(() => {
        notification.fadeOut(300, function() {
            $(this).remove();
        });
    }, 3000);
}

// Global click handlers
$(document).on('click', '.get-quote-btn', function() {
    showNotification('Quote request form opened!', 'success');
    $('html, body').animate({
        scrollTop: $('#contact').offset().top - 80
    }, 800);
});

$(document).on('click', '.view-details-btn', function() {
    showNotification('Loading vessel details...', 'info');
    // Here you would typically open a modal or navigate to a details page
});

// Keyboard navigation
$(document).keydown(function(e) {
    if (e.ctrlKey) {
        switch(e.which) {
            case 72: // Ctrl+H for Home
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $('#home').offset().top
                }, 800);
                break;
            case 67: // Ctrl+C for Contact
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $('#contact').offset().top - 80
                }, 800);
                break;
        }
    }
});


// Advanced animation controller
class AnimationController {
    constructor() {
        this.initParticleSystem();
        this.initWaveAnimation();
        this.initFloatingElements();
        this.bindScrollEffects();
    }

    // Particle system for background
    initParticleSystem() {
        const canvas = document.getElementById('particles-canvas');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        let particles = [];
        let animationId;

        // Resize canvas
        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        // Particle class
        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 3 + 1;
                this.speedX = (Math.random() - 0.5) * 2;
                this.speedY = (Math.random() - 0.5) * 2;
                this.opacity = Math.random() * 0.5 + 0.2;
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
            }

            draw() {
                ctx.globalAlpha = this.opacity;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = '#60A5FA';
                ctx.fill();
            }
        }

        // Create particles
        function createParticles() {
            for (let i = 0; i < 50; i++) {
                particles.push(new Particle());
            }
        }

        // Animation loop
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            particles.forEach(particle => {
                particle.update();
                particle.draw();
            });

            // Draw connections between nearby particles
            particles.forEach((particle, index) => {
                for (let i = index + 1; i < particles.length; i++) {
                    const dx = particle.x - particles[i].x;
                    const dy = particle.y - particles[i].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < 100) {
                        ctx.globalAlpha = 0.1;
                        ctx.beginPath();
                        ctx.moveTo(particle.x, particle.y);
                        ctx.lineTo(particles[i].x, particles[i].y);
                        ctx.strokeStyle = '#60A5FA';
                        ctx.lineWidth = 1;
                        ctx.stroke();
                    }
                }
            });

            animationId = requestAnimationFrame(animate);
        }

        createParticles();
        animate();

        // Pause animation when tab is not visible
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                cancelAnimationFrame(animationId);
            } else {
                animate();
            }
        });
    }

    // Enhanced wave animation
    initWaveAnimation() {
        const waves = document.querySelectorAll('.wave');
        let phase = 0;

        function animateWaves() {
            waves.forEach((wave, index) => {
                const speed = 0.02 + index * 0.01;
                const amplitude = 10 + index * 5;
                const offset = index * Math.PI * 0.5;
                
                wave.style.transform = `translateY(${Math.sin(phase + offset) * amplitude}px)`;
            });
            
            phase += 0.02;
            requestAnimationFrame(animateWaves);
        }

        animateWaves();
    }

    // Floating elements with advanced motion
    initFloatingElements() {
        const floatingElements = document.querySelectorAll('.floating-ship, .floating-anchor');
        
        floatingElements.forEach((element, index) => {
            let position = 0;
            const speed = 0.01 + index * 0.005;
            const amplitude = 15 + index * 5;

            function float() {
                position += speed;
                const y = Math.sin(position) * amplitude;
                const x = Math.cos(position * 0.5) * (amplitude * 0.5);
                
                element.style.transform = `translate(${x}px, ${y}px) rotate(${Math.sin(position) * 5}deg)`;
                requestAnimationFrame(float);
            }

            float();
        });
    }

    // Advanced scroll effects
    bindScrollEffects() {
        let ticking = false;

        function updateScrollEffects() {
            const scrollY = window.pageYOffset;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            // Parallax background
            const backgroundElements = document.querySelectorAll('#animated-bg > div');
            backgroundElements.forEach((element, index) => {
                const speed = 0.5 + index * 0.2;
                element.style.transform = `translateY(${scrollY * speed}px)`;
            });

            // Progress indicator
            const progress = (scrollY / (documentHeight - windowHeight)) * 100;
            document.documentElement.style.setProperty('--scroll-progress', `${progress}%`);

            // Reveal animations
            this.handleRevealAnimations();

            ticking = false;
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateScrollEffects);
                ticking = true;
            }
        }

        window.addEventListener('scroll', requestTick, { passive: true });
    }

    // Handle reveal animations
    handleRevealAnimations() {
        const elements = document.querySelectorAll('.fade-in-up, .fade-in-left, .fade-in-right');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('visible');
            }
        });
    }

    // Magnetic effect for interactive elements
    initMagneticEffect() {
        const magneticElements = document.querySelectorAll('.cta-button, .service-card');
        
        magneticElements.forEach(element => {
            element.addEventListener('mousemove', (e) => {
                const rect = element.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                element.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px)`;
            });
            
            element.addEventListener('mouseleave', () => {
                element.style.transform = 'translate(0px, 0px)';
            });
        });
    }

    // Smooth page transitions
    initPageTransitions() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    this.smoothScrollTo(targetElement.offsetTop - 80, 800);
                }
            });
        });
    }

    // Custom smooth scroll function
    smoothScrollTo(endX, duration) {
        const startX = window.pageYOffset;
        const distanceX = endX - startX;
        const startTime = new Date().getTime();

        const easeInOutQuart = (time, from, distance, duration) => {
            if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
            return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
        };

        const timer = setInterval(() => {
            const time = new Date().getTime() - startTime;
            const newX = easeInOutQuart(time, startX, distanceX, duration);
            
            if (time >= duration) {
                clearInterval(timer);
                window.scrollTo(0, endX);
            } else {
                window.scrollTo(0, newX);
            }
        }, 1000 / 60);
    }

    // Initialize loading animations
    initLoadingAnimations() {
        const cards = document.querySelectorAll('.service-card, .vessel-card, .testimonial-card');
        
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.8s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100 + 500);
        });
    }

    // Text typing animation
    initTypingAnimation() {
        const typingElements = document.querySelectorAll('[data-typing]');
        
        typingElements.forEach(element => {
            const text = element.textContent;
            element.textContent = '';
            
            let index = 0;
            const typeWriter = () => {
                if (index < text.length) {
                    element.textContent += text.charAt(index);
                    index++;
                    setTimeout(typeWriter, 100);
                }
            };
            
            // Start typing when element is visible
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        typeWriter();
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            observer.observe(element);
        });
    }

    // Initialize all animations
    init() {
        this.initMagneticEffect();
        this.initPageTransitions();
        this.initLoadingAnimations();
        this.initTypingAnimation();
        
        console.log('Advanced animations initialized');
    }
}

// Initialize animations when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    const animController = new AnimationController();
    animController.init();
});

// Performance monitoring
class PerformanceMonitor {
    constructor() {
        this.fps = 0;
        this.lastTime = performance.now();
        this.frameCount = 0;
        this.monitor();
    }

    monitor() {
        const now = performance.now();
        this.frameCount++;
        
        if (now >= this.lastTime + 1000) {
            this.fps = Math.round((this.frameCount * 1000) / (now - this.lastTime));
            this.frameCount = 0;
            this.lastTime = now;
            
            // Adjust animation quality based on performance
            if (this.fps < 30) {
                document.body.classList.add('low-performance');
            } else {
                document.body.classList.remove('low-performance');
            }
        }
        
        requestAnimationFrame(() => this.monitor());
    }
}

// Start performance monitoring
const perfMonitor = new PerformanceMonitor();

// Intersection Observer for lazy loading
const observerOptions = {
    root: null,
    rootMargin: '50px',
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe all animatable elements
document.addEventListener('DOMContentLoaded', () => {
    const animatableElements = document.querySelectorAll('.fade-in-up, .fade-in-left, .fade-in-right');
    animatableElements.forEach(el => observer.observe(el));
});