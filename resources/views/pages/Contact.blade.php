<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.contact_page_title') }}</title>
    <link rel="icon" href="{{ asset('mainassets/assets/images/dark_logo.png') }}" type="image/png">

    <meta name="description" content="Contact Influence Agency today to discuss your next project. We are ready to assist you in reaching your digital marketing goals. Let's start the conversation!">
    <meta name="keywords" content="contact, digital marketing, Influence Agency, business inquiries, customer support, reach out, communication, services, projects">
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
<!-- Hero Section (now distinct from header) -->
<section class="hero-section">
    <h1>{{ __('messages.lets_start_talk') }}</h1>
    <p>{{ __('messages.contact_description') }}</p>
</section>

<section class="contact-form">
    <div class="contact-container">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('send.email') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="name">{{ __('messages.your_name') }}</label>
                    <input type="text" id="name" name="name" placeholder="{{ __('messages.enter_your_name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('messages.your_email') }}</label>
                    <input type="email" id="email" name="email" placeholder="{{ __('messages.enter_your_email') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">{{ __('messages.phone_number') }}</label>
                    <input type="tel" id="phone" name="phone" placeholder="{{ __('messages.enter_your_phone') }}" required>
                </div>
                <div class="form-group">
                    <label for="subject">{{ __('messages.your_subject') }}</label>
                    <input type="text" id="subject" name="subject" placeholder="{{ __('messages.enter_your_subject') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="message">{{ __('messages.tell_us_more') }}</label>
                <textarea id="message" name="message" rows="5" placeholder="{{ __('messages.leave_us_message') }}"></textarea>
            </div>
            <div class="submit-btn">
                <button type="submit">{{ __('messages.submit') }}</button>
            </div>
        </form>        
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-logo">
            <img src="{{ asset('mainassets/assets/images/logo.png') }}" alt="Influence Logo">
            <p>{{ __('messages.footer_slogan') }}</p>
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
        <p>&copy; {{ now()->year }}. {{ __('messages.rights_reserved') }} | {{ __('messages.powered_by') }}
            <a href="http://nbportfolio.great-site.net/?i=1" target="_blank">Bendjeddou Nourhane & Lekouaghet Loubna</a>
        </p>
    </div>
</footer>

<script src="{{ asset('mainassets/js/script.js') }}"></script>

</body>
</html>
