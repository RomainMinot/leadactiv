import IsotopeGrid from './IsotopeGrid';

var jQueryBridget = require('jquery-bridget');
//Filtering and Sorting
var Isotope = require('isotope-layout');
jQueryBridget( 'isotope', Isotope, $ );

import Typed from 'typed.js';

$(document).ready(function($){

    const extra = 140;
    const windowEl = $(window);
    const containerEl = $('.lame--scroll--container');
    const itemEls = $('.lame--scroll--item');

    initCarousel();
    initTrigger();
    initIsotope();
    animationTyped();
    scrollTo();

    if(containerEl.length > 0) {
        // Démarrer l'animation initiale
        updateScrollItems();
    }

    function scrollTo(){
        $('a[href^="#"]').on("click", function(e) {
            e.preventDefault();
            var scrollToPosition = $($(this).attr("href")).offset().top -  $('.navbar').outerHeight();

            window.scrollTo({
                top: scrollToPosition,
                behavior: "smooth"
            });
        });
    }


    function updateScrollItems() {
        if(windowEl.width() > 767) {
            const windowScroll = windowEl.scrollTop() + (windowEl.height() / 2) - extra;
            const end = containerEl.offset().top + containerEl.height() - extra;

            itemEls.each(function () {
                let decalage = 0;
                const lameEl = $(this).closest('.lame--scroll');

                if (lameEl.hasClass('lame--scroll--1')) {
                    decalage = extra;
                }

                if (windowScroll >= (lameEl.offset().top - decalage) && windowScroll < end) {
                    const el = $(this);
                    itemEls.removeClass('active');
                    el.addClass('active');
                    el.css({ 'top': windowScroll - lameEl.offset().top + 'px' });
                }
            });
        }

        // Demande une nouvelle animation frame
        requestAnimationFrame(updateScrollItems);
    }

    function initIsotope() {
        //filtering actus
        var $grid = $('.grid--actus').isotope({
            itemSelector: '.grid--actus--items',
            layoutMode: 'fitRows'
        });

        $('.grid--actus--filters').on( 'click', '.grid--actus--filter', function() {
            $('.grid--actus--filter.active').removeClass('active')
            $(this).toggleClass('active');
            var filterValue = "";
            filterValue = $(this).attr('data-filter');

            if(filterValue === "") {
                filterValue = "*";
            }
            $grid.isotope({ filter: filterValue });
        });
    }

    function initTrigger() {
        $('.burger').click(function(){
            $(this).toggleClass('open');
        });

        $('.video--miniature').click(function () {
            if($(this).parent().find('video').length > 0) {
                $(this).parent().find('video').get(0).play();
            }
            $(this).remove();
        });

        $(".picto input").on("focus", function (){

            const parentDiv = $(this).closest(".picto");
            parentDiv.addClass("focus");
        })

        $(".picto input").on("focusout", function (){

            const parentDiv = $(this).closest(".picto");
            parentDiv.removeClass("focus");
        })

        $(".picto input").on("input", function (){
            const parentDiv = $(this).closest(".picto");

            if ($(this).val() !== "") {
                parentDiv.addClass("focus");
            } else {
                parentDiv.removeClass("focus");
            }
        })

    }

    function initCarousel() {

        jQuery(".owl-carousel.owl-carousel-partenaires").owlCarousel({
            'items' : 4,
            responsive : {
                0 : {
                    'items' : 2,
                },
                756 : {
                    'items' : 4,
                },
                1200 : {
                    'items' : 6,
                }
            },
            'dots' : false,
            'autoplay' : true,
            'margin':30,
            'autoWidth':true,
            'slideTransition': 'linear',
            'autoplayTimeout': 1500,
            'autoplaySpeed': 1550,
            'loop': true,
        });

        jQuery(".owl-carousel.owl-carousel-etudes-cas").owlCarousel({
            responsive : {
                0 : {
                    'items' : 1,
                },
                750 : {
                    'items' : 2,
                },
                1200 : {
                    'items' : 3,
                }
            },
            'dots' : true,
            'margin': 15,
            'loop': true,
            'slideTransition': 'linear',
            'autoplayTimeout': 5000,
            'autoplaySpeed': 5000,
            'autoplay' : true,

        });

        $(".owl-carousel.owl-carousel-clients").each(function() {

            $(this).owlCarousel({
                'items' : 6,
                responsive : {
                    0 : {
                        'items' : 3,
                    },
                    756 : {
                        'items' : 4,
                    },
                    1200 : {
                        'items' : 5,
                    }
                },
                'dots' : false,
                'autoplay' : true,
                'slideTransition': 'linear',
                'autoplayTimeout': 1500,
                'autoplaySpeed': 1550,
                'margin': 10,
                'loop': true,
            });
        });

        $(".owl-carousel.owl-carousel-clients-blog").each(function() {

            $(this).owlCarousel({
                'items' : 8,
                responsive : {
                    0 : {
                        'items' : 3,
                    },
                    756 : {
                        'items' : 5,
                    },
                    1200 : {
                        'items' : 7,
                    }
                },
                'dots' : false,
                'autoplay' : true,
                'slideTransition': 'linear',
                'autoplayTimeout': 1500,
                'autoplaySpeed': 1550,
                'loop': true,

            });
        });

        $("#carouselTestimonials").owlCarousel({
            'items': 12,
            responsive : {
                0 : {
                    'items' : 3,
                },
                756 : {
                    'items' : 3,
                },
                1200 : {
                    'items' : 3,
                }
            },
            'dots': true,
            'autoplay': false,
            'slideTransition': 'linear',
            'margin': 32,
            'nav': true,
            'navText': ['&#x2190;', '&#x2192;']
        })

        $(".owl-carousel.owl-carousel-clients-contact").each(function() {
            $(this).owlCarousel({
                responsive : {
                    0 : {
                        'items' : 2,
                    },
                    756 : {
                        'items' : 4,
                    },
                    1200 : {
                        'items' : 8,
                    }
                },
                'dots' : false,
                'autoplay' : true,
                'slideTransition': 'linear',
                'autoplayTimeout': 1500,
                'autoplaySpeed': 1550,
                'margin': 30,
                'autoWidth':true,
                'loop': true,
            });
        });


    }

    // Fonction pour charger davantage d'études de cas en utilisant Ajax
    function loadMoreEtudesDeCas(paged) {
        $('.load-more-button').addClass('loading');
        $.ajax({
            url: genesii_loadmore.ajaxurl, // Le point d'entrée pour les requêtes Ajax dans WordPress
            type: 'POST',
            data: {
                action: 'load_more_etudes_de_cas',
                paged: paged
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.load-more-button').removeClass('loading');

                    $('.page__etude--content--grid').append(response.data); // Ajoute les nouvelles études de cas à la liste existante

                    $('.grid--actus').isotope('reloadItems').isotope('layout');
                    $('.grid--actus--filter.all').click();

                    if($('.grid--actus--items').length >= $('.load-more-button').data('total')) {
                        $('.load-more-button').remove();
                    }
                } else {
                    console.log('Erreur lors du chargement des études de cas.');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log('Erreur Ajax : ' + errorThrown);
            }
        });
    }

    function animationTyped() {
        if($('.typedjs').length > 0) {

            var typed = new Typed('.typedjs', {
                strings: $('.typedjs').data('phrase').split(';;'),
                typeSpeed: 50,
                backSpeed: 30,
                backDelay: 1500,
                loop: true
            });
        }
    }

    
});

// Autre js
document.addEventListener("DOMContentLoaded", function () {
    var lastScrollTop = 0;
    var navbar = document.querySelector('.navbar');
    var isNavbarHidden = false; // Variable to track if the navbar is hidden
    var hideNavbarTimeout; // Variable to store the timeout

    window.addEventListener("scroll", function () {
        var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // Downscroll
            navbar.style.top = "-100px"; // Adjust as necessary to hide the navbar
            isNavbarHidden = true;
            clearTimeout(hideNavbarTimeout); // Clear any existing timeout
        } else {
            // Upscroll
            navbar.style.top = "0";
            isNavbarHidden = false;
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
    });

    window.addEventListener("mousemove", function (event) {
        if (isNavbarHidden && event.clientY <= 100) { // Show the navbar if the mouse is near the top
        navbar.style.top = "0";
        isNavbarHidden = false;
        clearTimeout(hideNavbarTimeout); // Clear any existing timeout
        hideNavbarTimeout = setTimeout(function () {
            navbar.style.top = "-100px";
            isNavbarHidden = true;
        }, 3000); // Hide navbar after 3 seconds of no activity
        }
    });

    // Add click event to navbar links to clear the timeout
    var navbarLinks = navbar.querySelectorAll('a');
    navbarLinks.forEach(function (link) {
        link.addEventListener('click', function () {
        clearTimeout(hideNavbarTimeout);
        });
    });

    // Add event to hide navbar after 3 seconds if no click occurs
    navbar.addEventListener('mouseover', function () {
        clearTimeout(hideNavbarTimeout);
    });

    navbar.addEventListener('mouseout', function () {
        hideNavbarTimeout = setTimeout(function () {
        navbar.style.top = "-100px";
        isNavbarHidden = true;
        }, 3000);
    });
});
  
/* over page methode image */
document.addEventListener('DOMContentLoaded', function () {
const imageContainer = document.querySelector('.image-container-methode');
if (imageContainer) {
    const image = imageContainer.querySelector('img');

    imageContainer.addEventListener('mousemove', (e) => {
        const rect = imageContainer.getBoundingClientRect();
        const x = e.clientX - rect.left; // x position within the element.
        const y = e.clientY - rect.top;  // y position within the element.

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const percentX = (x - centerX) / centerX;
        const percentY = (y - centerY) / centerY;

        const rotateX = percentY * 10; // Adjust the value for more or less tilt
        const rotateY = percentX * 10; // Adjust the value for more or less tilt

        image.style.transform = `rotateX(${-rotateX}deg) rotateY(${rotateY}deg)`;
    });

    imageContainer.addEventListener('mouseleave', () => {
        image.style.transform = 'rotateX(0) rotateY(0)';
    });
}
});
  
/* agence*/
document.addEventListener('DOMContentLoaded', function () {
    const dateButtons = document.querySelectorAll('.date-btn');
    const cardContainers = document.querySelectorAll('.card-container');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const section = document.querySelector('.page__home--methode');
    let currentIndex = dateButtons.length - 1; // Initialiser à la dernière date
    let isScrollingDates = false;
    let lastScrollTime = 0;
    let sectionInView = false;

    function updateCards(index, animate = true) {
        // Update date buttons
        dateButtons.forEach(btn => btn.classList.remove('active'));
        if (dateButtons[index]) dateButtons[index].classList.add('active');

        // Update cards
        cardContainers.forEach(container => container.classList.remove('active'));
        if (cardContainers[index]) cardContainers[index].classList.add('active');

        // Animate numbers from previous values to new values if needed
        if (index !== currentIndex && animate) {
        animateNumbers(cardContainers[currentIndex], cardContainers[index]);
        }

        // Update navigation arrows
        if (prevButton && nextButton) {
            prevButton.disabled = (index === 0);
            nextButton.disabled = (index === dateButtons.length - 1);
        }

        currentIndex = index;
    }

    function animateNumbers(prevContainer, newContainer) {
        const prevElements = prevContainer.querySelectorAll('.card-content, .tag-light-purple');
        const newElements = newContainer.querySelectorAll('.card-content, .tag-light-purple');
        const duration = 1000; // Duration of the animation in ms

        newElements.forEach((element, i) => {
        const endValue = parseInt(element.textContent.replace(/[^0-9.-]/g, ''), 10);
        const prevElement = prevElements[i];
        const startValue = parseInt(prevElement.textContent.replace(/[^0-9.-]/g, ''), 10);
        const increment = endValue > startValue ? Math.ceil((endValue - startValue) / (duration / 150)) : Math.floor((endValue - startValue) / (duration / 150));

        let currentValue = startValue;

        const interval = setInterval(() => {
            currentValue += increment;
            if ((increment > 0 && currentValue >= endValue) || (increment < 0 && currentValue <= endValue)) {
            element.textContent = formatValue(endValue, element.classList.contains('tag-light-purple'), element.classList.contains('ca'));
            clearInterval(interval);
            } else {
            element.textContent = formatValue(currentValue, element.classList.contains('tag-light-purple'), element.classList.contains('ca'));
            }
        }, 150); // Increase the interval time for slower updates
        });
    }

    function formatValue(value, isEvolution, isCurrency) {
        let formattedValue = value.toLocaleString(); // Ensures spaces and comma formatting

        if (isEvolution && value > 0) {
        formattedValue = '+' + formattedValue;
        }

        if (isCurrency) {
        formattedValue += '€';
        } else if (isEvolution) {
        formattedValue += '%';
        }

        return formattedValue;
    }

    if (prevButton && nextButton) {
        prevButton.addEventListener('click', function () {
            if (currentIndex > 0) {
            currentIndex--;
            updateCards(currentIndex);
            }
        });

        nextButton.addEventListener('click', function () {
            if (currentIndex < dateButtons.length - 1) {
            currentIndex++;
            updateCards(currentIndex);
            }
        });
    }

    dateButtons.forEach(button => {
        button.addEventListener('click', function () {
        const newIndex = parseInt(this.getAttribute('data-date'));
        updateCards(newIndex);
        });
    });

    // Initial display - make sure the first card is visible
    updateCards(currentIndex);

    // Handle scroll event with debounce
    // window.addEventListener('wheel', handleScroll, { passive: false });

    // Intersection Observer to detect when section is in view
    if (section) {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
            sectionInView = entry.isIntersecting;
            });
        }, {
            threshold: 0.1 // Adjust this threshold as needed
        });

        observer.observe(section);
    }
});

/* BLOG */
document.addEventListener('DOMContentLoaded', function () {
    const progressBar = document.getElementById('progress-bar-blog');
    const article = document.querySelector('.page__single--body-container');
    if (article) {
        article.addEventListener('scroll', function () {
            const totalHeight = article.scrollHeight - article.clientHeight;
            const progressHeight = (article.scrollTop / totalHeight) * 100;
            progressBar.style.width = `${progressHeight}%`;
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".scroll-link");

    links.forEach(link => {
        link.addEventListener("click", function (e) {
        e.preventDefault();
        const targetId = this.getAttribute("href").substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            window.scrollTo({
            top: targetElement.offsetTop - 60, // Adjust this value to offset the header height
            behavior: "smooth"
            });
        }
        });
    });
});

/* miniature */
document.addEventListener('DOMContentLoaded', function() {
    const videoThumbnails = document.querySelectorAll('.video-thumbnail');

    videoThumbnails.forEach(function(thumbnail) {
        thumbnail.addEventListener('click', function() {
            const videoContainer = thumbnail.closest('.video-container');
            const videoEmbed = videoContainer.querySelector('.video-embed');
            const iframe = videoEmbed.querySelector('iframe');

            // Hide the thumbnail and overlay
            thumbnail.style.display = 'none';

            // Get the original video source
            const videoSrc = iframe.getAttribute('src');

            // Check if the videoSrc already has parameters
            const separator = videoSrc.includes('?') ? '&' : '?';
            iframe.setAttribute('src', videoSrc + separator + 'autoplay=1&rel=0');

            // Show the video embed
            videoEmbed.style.display = 'block';
        });
    });
});

/* Caroussel indicator */
document.addEventListener("DOMContentLoaded", function () {
    var carousel = document.querySelector('#carouselEtudesDeCas');
    var indicators = document.querySelectorAll('.carousel-indicators li');

    if (carousel) {
        carousel.addEventListener('slid.bs.carousel', function (event) {
            indicators.forEach(function (indicator) {
            indicator.classList.remove('active');
            });
            indicators[event.to].classList.add('active');

            indicators.forEach(function (indicator) {
            indicator.style.animation = 'none';
            indicator.offsetHeight; /* trigger reflow */
            indicator.style.animation = null;
            });
        });
    }
});

/* calendly */ 
document.addEventListener('DOMContentLoaded', function() {
    const calendlyIframe = document.querySelector('.calendly-inline-widget iframe');
    if (calendlyIframe) {
        calendlyIframe.style.width = '100%';
        calendlyIframe.style.height = '100%';
        calendlyIframe.style.border = 'none';
        calendlyIframe.style.overflow = 'hidden';
    }
});

/*blog */
document.addEventListener('DOMContentLoaded', function () {
    const progressBar = document.getElementById('progress-bar');
    const articleContent = document.getElementById('article-content');
    const textContainer = document.querySelector('.text-container-methode');
    const fullPageSection = document.querySelector('.page__methode--fonctionnement');

    function updateProgressBar() {
        if (articleContent) {
            const contentHeight = articleContent.scrollHeight - window.innerHeight;
            const scrollTop = window.scrollY || window.pageYOffset;
            const contentTop = articleContent.offsetTop;
            const progress = ((scrollTop - contentTop) / contentHeight) * 100;

            if (scrollTop > contentTop && scrollTop < contentTop + articleContent.scrollHeight) {
                progressBar.style.width = `${Math.min(Math.max(progress, 0), 100)}%`;
            } else {
                progressBar.style.width = '0%';
            }
        }
    }

    window.addEventListener('scroll', updateProgressBar);
    updateProgressBar(); // Initial call to set the progress bar if part of the article is already visible
});

/* méthode effet fonctionnement */ 
document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('.carte-image');
    const sections = document.querySelectorAll('.section-effect');
    const progressBar = document.getElementById('progressbar');
    const textContainer = document.querySelector('.text-container-methode');
    const scrollableSection = document.querySelector('.page__methode--fonctionnement--bottom');
    const etiquetteLinks = document.querySelectorAll('.etiquette-link'); // Select all etiquette links

    let currentImageIndex = 0;
    const isMobile = window.innerWidth <= 768; // Adjust width as needed for your breakpoint

    function showImage(index) {
        images.forEach((img, i) => {
        img.classList.toggle('active', i === index);
        });
    }

    function updateProgressBar() {
        if (textContainer) {
            const scrollHeight = textContainer.scrollHeight - textContainer.clientHeight;
            const scrollTop = textContainer.scrollTop;
            const progress = (scrollTop / scrollHeight) * 100;
            progressBar.style.height = `${progress}%`;

            sections.forEach((section, index) => {
            const rect = section.getBoundingClientRect();
            if (rect.top < window.innerHeight / 2 && rect.bottom > window.innerHeight / 2) {
                const sectionType = section.dataset.sectionType;
                let color;
                switch (sectionType) {
                case 'carte_fondation':
                    color = '#E0F9D3'; // Green
                    break;
                case 'carte_exec':
                    color = '#C6CBF7'; // Purple
                    break;
                case 'carte_reflexion':
                    color = '#F9ECE0'; // Salmon
                    break;
                default:
                    color = '#000'; // Default
                }
                progressBar.style.backgroundColor = color;

                if (index !== currentImageIndex) {
                currentImageIndex = index;
                showImage(currentImageIndex);
                }

                // Update active state of etiquettes
                updateActiveEtiquette(sectionType);
            }
        });
        }
    }

    function handleSectionScroll(event) {
        const containerScrollHeight = textContainer.scrollHeight - textContainer.clientHeight;
        const containerScrollTop = textContainer.scrollTop;

        if ((containerScrollTop === 0 && event.deltaY < 0) || (containerScrollTop >= containerScrollHeight && event.deltaY > 0)) {
        // Allow page scroll when text container is fully scrolled up or down
        return;
        }

        event.preventDefault(); // Prevent page scroll
        textContainer.scrollBy({
        top: event.deltaY,
        behavior: 'auto'
        });
    }

    function scrollToSection(sectionType) {
        const targetSection = Array.from(sections).find(section => section.dataset.sectionType === sectionType);
        if (targetSection) {
        if (isMobile) {
            // Mobile: Use default browser scroll behavior
            targetSection.scrollIntoView({ behavior: 'smooth' });
        } else {
            // Desktop: Scroll within the scrollable container
            const rect = targetSection.getBoundingClientRect();
            const containerRect = textContainer.getBoundingClientRect();
            const offset = rect.top - containerRect.top + textContainer.scrollTop;

            textContainer.scrollTo({
            top: offset,
            behavior: 'smooth'
            });
        }
        }
    }

    function updateActiveEtiquette(sectionType) {
        etiquetteLinks.forEach(link => {
        const linkSection = link.getAttribute('data-section').split('-')[0];
        if (linkSection === sectionType) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
        });
    }

    etiquetteLinks.forEach(link => {
        link.addEventListener('click', function (event) {
        event.preventDefault();
        const sectionType = this.getAttribute('data-section').split('-')[0];
        scrollToSection(sectionType);
        });
    });

    // Only apply wheel event listener if not on mobile
    if (!isMobile && scrollableSection) {
        scrollableSection.addEventListener('wheel', handleSectionScroll);
    }

    if (textContainer) textContainer.addEventListener('scroll', () => {
        updateProgressBar();
    });

    updateProgressBar();
    showImage(currentImageIndex);
});

/* travailler avec pour */
document.addEventListener('DOMContentLoaded', function () {
    const radioButtons = document.querySelectorAll('input[name="relation"]');
    const cartesAvec = document.querySelector('.cartes-set-avec');
    const cartesPour = document.querySelector('.cartes-set-pour');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function () {
        if (this.value === 'avec') {
            cartesAvec.style.display = 'flex';
            cartesPour.style.display = 'none';
        } else if (this.value === 'pour') {
            cartesAvec.style.display = 'none';
            cartesPour.style.display = 'flex';
        }
        });
    });

    // Initial state based on the checked radio button
    const checkedRadio = document.querySelector('input[name="relation"]:checked');
    if (checkedRadio) {
        checkedRadio.dispatchEvent(new Event('change'));
    }
});

// Second part script
document.addEventListener('DOMContentLoaded', () => {
    // Init isotope filters case studies
    if (document.querySelector('.grid__studies'))
        new IsotopeGrid('.grid__studies', '.grid__studies--item', '.grid__studies--filter', '.grid__studies--search', '.page__temoignages__list__filters__clear', 'every');
});