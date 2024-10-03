<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.page_title') }}</title>
    <link rel="icon" href="{{ asset('mainassets/assets/images/dark_logo.png') }}" type="image/png">
    <meta name="description" content="Influence Agency helps you boost your brand's digital presence with customized marketing strategies. Discover our services and maximize your impact today. Contact us now!">
    <meta name="keywords" content="digital marketing, customized marketing strategies, brand growth, marketing agency, social media, SEO, Influence Agency, business growth, online presence, digital strategies">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('mainassets/css/style.css') }}">

    <!-- RTL CSS (if Arabic) -->
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('mainassets/css/ar/style-rtl.css') }}">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="{{ asset('mainassets/assets/images/logo.png') }}" alt="Logo">
            </div>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-links" id="nav-links">
                <li><a href="/">{{ __('messages.home') }}</a></li>
                <li><a href="/services">{{ __('messages.services') }}</a></li>
                <li><a href="/portfolio">{{ __('messages.portfolio') }}</a></li>
                <li><a href="/about">{{ __('messages.about_us') }}</a></li>
                <li><a href="/blog">{{ __('messages.blog') }}</a></li>
                <li><a href="/contact">{{ __('messages.contact') }}</a></li>
                <li class="dropdown">
                    <button class="dropbtn">
                        <div class="globe-icon">
                            <img src="{{ asset('mainassets/assets/icons/Language.png') }}" alt="Globe">
                        </div>
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('setLocale', ['lang' => 'ar']) }}">
                            <img src="{{ asset('mainassets/assets/icons/arFlag.png') }}" alt="Ar" width="20" height="20"> Ar
                        </a>
                        <a href="{{ route('setLocale', ['lang' => 'fr']) }}">
                            <img src="{{ asset('mainassets/assets/icons/frFlag.png') }}" alt="FR" width="20" height="20"> FR
                        </a>
                        <a href="{{ route('setLocale', ['lang' => 'en']) }}">
                            <img src="{{ asset('mainassets/assets/icons/enFlag.png') }}" alt="EN" width="20" height="20"> EN
                        </a>
                    </div>
                </li>                 
            </ul>
        </nav>

        <div class="hero-section">
            <h1>{{ __('messages.hero_title') }}</h1>
            <p>{{ __('messages.hero_subtitle') }}</p>
            <a href="/contact" class="cta-button">{{ __('messages.project_title') }}</a>
        </div>
    </header>

    <section class="features">
        <div class="feature">
            <img src="{{ asset('mainassets/assets/icons/icon1.png') }}" alt="{{ __('messages.delivery_speed') }}">
            <h3>{{ __('messages.delivery_speed') }}</h3>
        </div>
        <div class="feature">
            <img src="{{ asset('mainassets/assets/icons/icon2.png') }}" alt="{{ __('messages.price_value') }}">
            <h3>{{ __('messages.price_value') }}</h3>
        </div>
        <div class="feature">
            <img src="{{ asset('mainassets/assets/icons/icon3.png') }}" alt="{{ __('messages.global_standards') }}">
            <h3>{{ __('messages.global_standards') }}</h3>
        </div>
        <div class="feature">
            <img src="{{ asset('mainassets/assets/icons/icon4.png') }}" alt="{{ __('messages.high_experience') }}">
            <h3>{{ __('messages.high_experience') }}</h3>
        </div>
        <div class="feature">
            <img src="{{ asset('mainassets/assets/icons/icon5.png') }}" alt="{{ __('messages.mutual_trust') }}">
            <h3>{{ __('messages.mutual_trust') }}</h3>
        </div>
    </section>

    <section class="content-section">
        <div class="text-content">
            <h2>{{ __('messages.discover_title') }}</h2>
            <p>{{ __('messages.discover_paragraph') }}</p>
            <a href="/blog" class="cta-button">{{ __('messages.discover_more') }}</a>
        </div>
        <div class="image-content">
            <img src="{{ asset('mainassets/assets/images/image1.png') }}" alt="{{ __('messages.team_working') }}">
        </div>
    </section>

    <section class="content-section">
        <div class="image-content">
            <img src="{{ asset('mainassets/assets/images/image2.png') }}" alt="{{ __('messages.digital_marketing_team') }}" class="styled-image">
        </div>
        <div class="text-content">
            <h6>{{ __('messages.boost_your_business') }}</h6>
            <h2>{{ __('messages.success_is_priority') }}</h2>
            <p>{{ __('messages.digital_strategies') }}</p>
            <a href="/contact" class="cta-button">{{ __('messages.get_started') }}</a>
        </div>
    </section>

    <section class="content-section">
        <div class="text-content">
            <h6>{{ __('messages.grow_your_brand') }}</h6>
            <h2>{{ __('messages.maximize_your_impact') }}</h2>
            <p>{{ __('messages.reach_your_audience') }}</p>
            <a href="/contact" class="cta-button">{{ __('messages.begin_your_journey') }}</a>
        </div>
        <div class="image-content">
            <img src="{{ asset('mainassets/assets/images/Rectangle6.png') }}" alt="{{ __('messages.digital_marketing_image') }}">
        </div>
    </section>

    <section class="steps-section">
        <div class="image-container">
            <img src="{{ asset('mainassets/assets/images/steps.png') }}" alt="{{ __('messages.digital_marketing_steps') }}">
        </div>
        <div class="steps-container">
            <h2>{{ __('messages.how_to_boost') }}</h2>
            <p>{{ __('messages.strengthen_your_digital_presence') }}</p>    
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-text">
                    <h3>{{ __('messages.step_1') }}</h3>
                    <p>{{ __('messages.connect_with_us') }}</p>
                </div>
            </div>
    
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-text">
                    <h3>{{ __('messages.step_2') }}</h3>
                    <p>{{ __('messages.customized_marketing_plan') }}</p>
                </div>
            </div>
    
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-text">
                    <h3>{{ __('messages.step_3') }}</h3>
                    <p>{{ __('messages.elevate_your_brand') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section">
        <h2>{{ __('messages.testimonials_title') }}</h2>
        <p>{{ __('messages.testimonials_paragraph') }}</p>

        <div class="testimonial-slider">
            <button class="prev-btn" onclick="prevSlide()">&#10094;</button>
    
            <div class="testimonial-slide">
                <img src="{{ asset('mainassets/assets/icons/testimonial1.jpg') }}" alt="{{ __('messages.client_image') }}" class="client-photo">
                <h3>{{ __('messages.sarah_penrose') }}</h3>
                <p class="testimonial-text">
                    <span class="quote-mark">&#8220;</span>
                    {{ __('messages.testimonial_1') }}
                    <span class="quote-mark">&#8221;</span>
                </p>
            </div>
    
            <button class="next-btn" onclick="nextSlide()">&#10095;</button>
        </div>
    </section>

    <section class="cta-section">
        <h2>{{ __('messages.have_a_project') }} <br> {{ __('messages.lets_get_to_work') }}</h2>
        <a href="/contact" class="cta-button">{{ __('messages.connect_with_us_now') }}</a>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="{{ asset('mainassets/assets/images/logo.png') }}" alt="Influence Logo">
                <p>{{ __('messages.influence_word') }}</p>
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
                    <a href="https://www.facebook.com/profile.php?id=61559513189026" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>   
                    <a href="https://www.instagram.com/inffluence_agency/" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>              
                    <a href="https://www.tiktok.com/@inffluence_agency?is_from_webapp=1&sender_device=pc" target="_blank" class="social-icon"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; Copyright 2024. {{ __('messages.footer_powered_by') }} 
                <a href="http://nbportfolio.great-site.net/?i=1" target="_blank">Bendjeddou Nourhane & Lekouaghet Loubna</a> | {{ __('messages.footer_copyright') }}
            </p>
        </div>
    </footer>

    <script src="{{ asset('mainassets/js/script.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dropdown toggle
            const dropdown = document.querySelector('.dropdown');
            const dropdownContent = document.querySelector('.dropdown-content');
    
            dropdown.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdownContent.classList.toggle('show');
            });
    
            // Close the dropdown if clicked outside
            document.addEventListener('click', function (event) {
                if (!dropdown.contains(event.target)) {
                    dropdownContent.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
