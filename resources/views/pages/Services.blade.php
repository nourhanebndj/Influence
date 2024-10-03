<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.service_page_title') }}</title>
    <link rel="icon" href="{{ asset('mainassets/assets/images/dark_logo.png') }}" type="image/png">

    <meta name="description" content="Explore the diverse range of services offered by Influence Agency, from digital marketing to customized business solutions. Reach out today for a consultation and elevate your brand.">
    <meta name="keywords" content="services, digital marketing, business solutions, branding, consulting, Influence Agency, marketing strategy, service offerings">

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
    <h1>{{ __('messages.explore_offerings') }}</h1>
    <p>{{ __('messages.offerings_description') }}</p>
    <a href="/about" class="cta-button">{{ __('messages.reach_out') }}</a>
</section>

<!-- Services Section -->
<!-- Services Section -->
<section class="services-section">
    <div class="services-container">
        @foreach($categories as $category)
        @php
            // Determine the current locale
            $locale = app()->getLocale();
            // Set dynamic field names based on the locale
            $categoryName = 'name_' . $locale;
            $categoryDescription = 'description_' . $locale;
        @endphp

        <!-- Display category name and description -->
        <h2 class="section-title">{{ $category->$categoryName }}</h2>
        <p class="section-description">{{ $category->$categoryDescription }}</p>
        
        @foreach($category->subcategories as $subcategory)
        @php
            // Set dynamic field names for subcategories
            $subcategoryName = 'name_' . $locale;
        @endphp
        <section class="service-category">
            <h3 class="category-title">{{ $subcategory->$subcategoryName }}</h3>
            <div class="services-grid">
                @foreach($subcategory->subsubcategories as $subsubcategory)
                @php
                    // Set dynamic field names for subsubcategories
                    $subsubcategoryName = 'name_' . $locale;
                    $subsubcategoryDescription = 'description_' . $locale;
                @endphp
                <div class="service-item">
                    @if($subsubcategory->photo)
                        <img src="{{ asset('storage/' . $subsubcategory->photo) }}" alt="{{ $subsubcategory->$subsubcategoryName }}">
                    @else
                        <img src="{{ asset('mainassets/assets/images/default.png') }}" alt="Default image">
                    @endif
                    <div class="service-text">
                        <h4>{{ $subsubcategory->$subsubcategoryName }}</h4> 
                        <p>{{ $subsubcategory->$subsubcategoryDescription }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endforeach
        @endforeach

        <div class="cta-button-container">
            <a href="#" class="cta-button">{{ __('messages.cta_talk_to_us') }}</a>
        </div>
    </div>
</section>

<section class="cta-section">
    <h2>{{ __('messages.cta_missing_service') }}</h2>
    <a href="/contact" class="cta-button">{{ __('messages.cta_connect') }}</a>
</section>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-logo">
            <img src="{{ asset('mainassets/assets/images/logo.png') }}" alt="Influence Logo">
            <p>{{ __('messages.footer_logo_text') }}</p>
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
                <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2024 {{ __('messages.all_rights') }} | {{ __('messages.powered_by') }} 
            <a href="http://nbportfolio.great-site.net/?i=1" target="_blank">Bendjeddou Nourhane & Lekouaghet Loubna</a>
        </p>
    </div>
</footer>

<script src="{{ asset('mainassets/js/script.js') }}"></script>

</body>
</html>
