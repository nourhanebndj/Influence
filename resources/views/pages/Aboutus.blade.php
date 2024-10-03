<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.about_page_title') }}</title>
    <link rel="icon" href="{{ asset('mainassets/assets/images/dark_logo.png') }}" type="image/png">

    <meta name="description" content="Learn about the story and expertise of Influence Agency. We help our clients succeed through innovative solutions and tailored digital marketing strategies.">
    <meta name="keywords" content="About, Influence Agency, marketing strategy, innovative solutions, expertise, digital marketing, client-centric, excellence">

    <link rel="stylesheet" href="{{ asset('mainassets/css/style1.css') }}">
    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('mainassets/css/ar/style1-rtl.css') }}">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header Section -->
<header class="header">
    <nav>
        <div class="logo">
            <img src="{{ asset('mainassets/assets/images/dark_logo.png') }}" alt="Logo">
        </div>

        <!-- Hamburger Icon for Mobile -->
        <div class="hamburger" id="hamburger" onclick="toggleMobileMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Default Menu (for Desktop) -->
        <ul class="nav-menu" id="nav-links">
            <li><a href="/">{{ __('messages.home') }}</a></li>
            <li><a href="/services">{{ __('messages.services') }}</a></li>
            <li><a href="/portfolio">{{ __('messages.portfolio') }}</a></li>
            <li><a href="/about">{{ __('messages.about_us') }}</a></li>
            <li><a href="/blog">{{ __('messages.blog') }}</a></li>
            <li><a href="/contact">{{ __('messages.contact') }}</a></li>
            <li class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown()">
                    <div class="globe-icon">
                        <img src="{{ asset('mainassets/assets/icons/global.png') }}" alt="Globe">
                    </div>
                </button>
                <div class="dropdown-content">
                    <a href="{{ route('setLocale', 'ar') }}">
                        <img src="{{ asset('mainassets/assets/icons/arFlag.png') }}" alt="Ar" width="20" height="20"> Ar
                    </a>
                    <a href="{{ route('setLocale', 'fr') }}">
                        <img src="{{ asset('mainassets/assets/icons/frFlag.png') }}" alt="FR" width="20" height="20"> FR
                    </a>
                    <a href="{{ route('setLocale', 'en') }}">
                        <img src="{{ asset('mainassets/assets/icons/enFlag.png') }}" alt="EN" width="20" height="20"> EN
                    </a>
                </div>
            </li>
        </ul>

        <!-- Mobile Menu -->
        <div class="mobile-menu hidden" id="mobile-menu">
            <a href="/">{{ __('messages.home') }}</a>
            <a href="/services">{{ __('messages.services') }}</a>
            <a href="/portfolio">{{ __('messages.portfolio') }}</a>
            <a href="/about">{{ __('messages.about_us') }}</a>
            <a href="/blog">{{ __('messages.blog') }}</a>
            <a href="/contact">{{ __('messages.contact') }}</a>
            <div class="language-select">
                <label for="language-select">{{ __('messages.language') }}</label>
                <select id="language-select" onchange="changeLanguage(this.value)">
                    <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>
                        {{ __('messages.arabic') }}
                    </option>
                    <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>
                        {{ __('messages.french') }}
                    </option>
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                        {{ __('messages.english') }}
                    </option>
                </select>
            </div>
            
        </div>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero-section">
    <h1>{{ __('messages.discover_our_services') }}</h1>
    <p>{{ __('messages.about_us_description') }}</p>
    <a href="/contact" class="cta-button">{{ __('messages.connect_with_us_now') }}</a>
</section>

<!-- Our Story Section -->
<section class="our-story">
    <div class="video-container">
        <img src="{{ asset('mainassets/assets/images/video.png') }}" alt="Video Placeholder" class="video-placeholder">
    </div>
    <div class="text-container">
        <h2>{{ __('messages.our_story') }}</h2>
        <p>{{ __('messages.our_story_description') }}</p>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="stat-box">
        <h2>8</h2>
        <p>{{ __('messages.world_countries') }}</p>
    </div>
    <div class="stat-box">
        <h2>4</h2>
        <p>{{ __('messages.years_of_experience') }}</p>
    </div>
    <div class="stat-box">
        <h2>80+</h2>
        <p>{{ __('messages.satisfied_clients') }}</p>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us">
    <div class="container">
        <div class="text-content">
            <h2>{{ __('messages.why_choose_us') }}</h2>
            <ul class="reasons-list">
                <li><i class="checkmark-icon">✔</i><strong>{{ __('messages.experience') }}:</strong> {{ __('messages.experience_desc') }}</li>
                <li><i class="checkmark-icon">✔</i><strong>{{ __('messages.expertise') }}:</strong> {{ __('messages.expertise_desc') }}</li>
                <li><i class="checkmark-icon">✔</i><strong>{{ __('messages.client_centric') }}:</strong> {{ __('messages.client_centric_desc') }}</li>
                <li><i class="checkmark-icon">✔</i><strong>{{ __('messages.results_driven') }}:</strong> {{ __('messages.results_driven_desc') }}</li>
                <li><i class="checkmark-icon">✔</i><strong>{{ __('messages.innovative_solutions') }}:</strong> {{ __('messages.innovative_solutions_desc') }}</li>
                <li><i class="checkmark-icon">✔</i><strong>{{ __('messages.visual_elements') }}:</strong> {{ __('messages.visual_elements_desc') }}</li>
            </ul>
            <a href="/contact" class="cta-button">{{ __('messages.get_in_touch') }}</a>
        </div>
        <div class="image-content">
            <img src="{{ asset('mainassets/assets/images/image2.png') }}" alt="{{ __('messages.team_working') }}">
        </div>
    </div>
</section>

<!-- Q&A Section -->
<section class="qa-section">
    <div class="qa-container">
        <h2>{{ __('messages.qa_section') }}</h2>
        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-header">{{ __('messages.why_influence') }}</button>
                <div class="accordion-content">
                    <p>{{ __('messages.why_influence_answer') }}</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">{{ __('messages.services_offered') }}</button>
                <div class="accordion-content">
                    <p>{{ __('messages.services_offered_answer') }}</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">{{ __('messages.benefit_of_digital_marketing') }}</button>
                <div class="accordion-content">
                    <p>{{ __('messages.benefit_of_digital_marketing_answer') }}</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">{{ __('messages.create_marketing_strategy') }}</button>
                <div class="accordion-content">
                    <p>{{ __('messages.create_marketing_strategy_answer') }}</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">{{ __('messages.ongoing_support') }}</button>
                <div class="accordion-content">
                    <p>{{ __('messages.ongoing_support_answer') }}</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">{{ __('messages.service_cost') }}</button>
                <div class="accordion-content">
                    <p>{{ __('messages.service_cost_answer') }}</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">{{ __('messages.how_to_get_started') }}</button>
                <div class="accordion-content">
                    <p>{{ __('messages.how_to_get_started_answer') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section">
    <h2>{{ __('messages.project_in_mind') }}<br>{{ __('messages.lets_work_together') }}</h2>
    <a href="/contact" class="cta-button">{{ __('messages.connect_with_us_now') }}</a>
</section>

<!-- Footer Section -->
<footer>
    <div class="footer-content">
        <div class="footer-logo">
            <img src="{{ asset('mainassets/assets/images/logo.png') }}" alt="Influence Logo">
            <p>{{ __('messages.footer_text') }}</p>
        </div>
        <div class="footer-menu">
            <ul>
                <li><a href="/">{{ __('messages.home') }}</a></li>
                <li><a href="/services">{{ __('messages.services') }}</a></li>
                <li><a href="/portfolio">{{ __('messages.portfolio') }}</a></li>
                <li><a href="/about">{{ __('messages.about_us') }}</a></li>
                <li><a href="/contact">{{ __('messages.contact') }}</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <h4>{{ __('messages.get_in_touch') }}</h4>
            <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com" target="_blank" class="social-icon"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024. {{ __('messages.rights_reserved') }} | {{ __('messages.powered_by') }}
            <a href="http://nbportfolio.great-site.net/?i=1" target="_blank">Bendjeddou Nourhane & Lekouaghet Loubna</a>
        </p>
    </div>
</footer>

<script src="{{ asset('mainassets/js/script.js') }}"></script>
<script>
    document.querySelectorAll('.accordion-header').forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('active');
            const accordionContent = this.nextElementSibling;
            if (this.classList.contains('active')) {
                accordionContent.style.display = 'block';
                accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
            } else {
                accordionContent.style.display = 'none';
                accordionContent.style.maxHeight = null;
            }
        });
    });

    function changeLanguage(language) {
        window.location.href = '/setLocale/' + language;
    }
</script>
</body>
</html>
