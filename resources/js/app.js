

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const formatNumber = (value, decimals) =>
    new Intl.NumberFormat('id-ID', {
        minimumFractionDigits: decimals,
        maximumFractionDigits: decimals,
    }).format(value);

document.addEventListener('DOMContentLoaded', () => {
    const revealElements = document.querySelectorAll('.reveal');

    if (revealElements.length > 0) {
        const revealObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            },
            {
                threshold: 0.16,
                rootMargin: '0px 0px -48px 0px',
            }
        );

        revealElements.forEach((element) => revealObserver.observe(element));
    }

    // Ensure Home hero offset equals header height (keeps other pages unchanged)
    const applyHomeHeaderOffset = () => {
        const header = document.querySelector('header');
        const homeContainer = document.querySelector('#home .container-shell');

        if (!header || !homeContainer) return;

        const headerHeight = Math.ceil(header.getBoundingClientRect().height);
        const extraGap = 12; // px of breathing room below header
        homeContainer.style.paddingTop = `${headerHeight + extraGap}px`;
    };

    // debounce helper
    let resizeTimeout = null;
    const handleResize = () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            applyHomeHeaderOffset();
        }, 120);
    };

    // initial apply and resize listener
    applyHomeHeaderOffset();
    window.addEventListener('resize', handleResize);

    const counterElements = document.querySelectorAll('[data-counter]');

    if (counterElements.length > 0) {
        const counterObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    const element = entry.target;
                    const targetValue = Number.parseFloat(element.dataset.counter ?? '0');
                    const decimals = Number.parseInt(element.dataset.decimals ?? '0', 10);
                    const suffix = element.dataset.suffix ?? '';
                    const duration = 1400;
                    const startAt = performance.now();

                    const updateValue = (now) => {
                        const progress = Math.min((now - startAt) / duration, 1);
                        const eased = 1 - Math.pow(1 - progress, 3);
                        const currentValue = targetValue * eased;

                        element.textContent = `${formatNumber(currentValue, decimals)}${suffix}`;

                        if (progress < 1) {
                            window.requestAnimationFrame(updateValue);
                        } else {
                            element.textContent = `${formatNumber(targetValue, decimals)}${suffix}`;
                        }
                    };

                    window.requestAnimationFrame(updateValue);
                    observer.unobserve(element);
                });
            },
            {
                threshold: 0.35,
            }
        );

        counterElements.forEach((element) => counterObserver.observe(element));
    }

    const sections = Array.from(document.querySelectorAll('main section[id]'));
    const navLinks = Array.from(document.querySelectorAll('[data-nav]'));

    const initHeroSlider = () => {
        const slider = document.querySelector('[data-hero-slider]');
        if (!slider) {
            return;
        }

        const slides = Array.from(slider.querySelectorAll('.hero-image'));
        if (slides.length < 2) {
            return;
        }

        const dots = Array.from(document.querySelectorAll('[data-hero-dot]'));
        let activeIndex = 0;
        let intervalId = null;

        const updateDots = () => {
            dots.forEach((dot, dotIndex) => {
                dot.classList.toggle('active', dotIndex === activeIndex);
            });
        };

        const setSlide = (index) => {
            if (index === activeIndex) {
                return;
            }
            slides[activeIndex].classList.remove('active');
            activeIndex = index;
            slides[activeIndex].classList.add('active');
            updateDots();
        };

        const showNext = () => setSlide((activeIndex + 1) % slides.length);
        const showPrev = () => setSlide((activeIndex - 1 + slides.length) % slides.length);
        const resetInterval = () => {
            if (intervalId) {
                clearInterval(intervalId);
            }
            intervalId = setInterval(showNext, 3000);
        };

        const nextButton = document.querySelector('[data-hero-next]');
        const prevButton = document.querySelector('[data-hero-prev]');

        if (nextButton) {
            nextButton.addEventListener('click', () => {
                showNext();
                resetInterval();
            });
        }

        if (prevButton) {
            prevButton.addEventListener('click', () => {
                showPrev();
                resetInterval();
            });
        }

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                const targetIndex = Number(dot.dataset.heroDot);
                if (!Number.isNaN(targetIndex)) {
                    setSlide(targetIndex);
                    resetInterval();
                }
            });
        });

        updateDots();
        resetInterval();
    };

    initHeroSlider();

    if (sections.length > 0 && navLinks.length > 0) {
        const setActiveLink = (sectionId) => {
            navLinks.forEach((link) => {
                link.classList.toggle('is-active', link.dataset.nav === sectionId);
            });
        };

        const sectionObserver = new IntersectionObserver(
            (entries) => {
                const visibleSection = entries
                    .filter((entry) => entry.isIntersecting)
                    .sort((first, second) => second.intersectionRatio - first.intersectionRatio)[0];

                if (visibleSection) {
                    setActiveLink(visibleSection.target.id);
                }
            },
            {
                threshold: 0.3,
                rootMargin: '-20% 0px -55% 0px',
            }
        );

        sections.forEach((section) => sectionObserver.observe(section));
        setActiveLink(sections[0].id);
    }
});
