<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.portfolio_page_title') }}</title>
    <link rel="icon" href="{{ asset('mainassets/assets/images/dark_logo.png') }}" type="image/png">

    <meta name="description" content="Discover the diverse projects completed by Influence Agency, showcasing expertise in digital marketing, branding, and design. Explore our portfolio and see how we can help your business grow.">
    <meta name="keywords" content="portfolio, digital marketing, branding, design projects, web design, business growth, Influence Agency, creative services, marketing portfolio">
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
    <h1>{{ __('messages.discover_projects') }}</h1>
    <p>{{ __('messages.explore_portfolio') }}</p>
    <a href="/contact" class="cta-button">{{ __('messages.help_you') }}</a>
</section>

<!-- Portfolio Filter and Grid Section -->
<!-- Portfolio Filter and Grid Section -->
<section class="portfolio-container">
    <div class="tabs">
        @foreach($categories as $category)
            @php
                // Get the name field based on the current locale
                $categoryName = 'name_' . app()->getLocale();
            @endphp
            <a href="{{ route('portfolio.filter', $category->id) }}">
                <button class="tab {{ isset($selectedCategory) && $selectedCategory->id == $category->id ? 'active' : '' }}">
                    {{ $category->$categoryName }}
                </button>
            </a>
        @endforeach
    </div>

    <!-- Portfolio Grid Section -->
    <div class="grid">
        @if($portfolios->count() > 0)
            @foreach($portfolios as $portfolio)
                <div class="grid-item">
                    @if($portfolio->photo)
                        <img src="{{ asset('storage/' . $portfolio->photo) }}" alt="{{ $portfolio->name }}">
                    @else
                        <img src="default-image.jpg" alt="{{ $portfolio->name }}">
                    @endif
                    <div class="tags">
                        @if($portfolio->subcategory)
                            @php
                                // Get the subcategory name based on the current locale
                                $subcategoryName = 'name_' . app()->getLocale();
                            @endphp
                            <span class="tag">{{ $portfolio->subcategory->$subcategoryName }}</span>
                        @endif
                        @if($portfolio->subsubcategory)
                            @php
                                // Get the subsubcategory name based on the current locale
                                $subsubcategoryName = 'name_' . app()->getLocale();
                            @endphp
                            <span class="tag">{{ $portfolio->subsubcategory->$subsubcategoryName }}</span>
                        @endif
                    </div>
                    <h3><a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->name }}</a></h3>
                </div>
            @endforeach
        @else
            <p>{{ __('messages.no_portfolios') }}</p>
        @endif
    </div>
    <div class="pagination">
        {{ $portfolios->links() }}
    </div>
</section>


<!-- Call to Action Section -->
<section class="cta-section">
    <h2>{{ __('messages.cta_title') }}</h2>
    <a href="/contact" class="cta-button">{{ __('messages.cta_button') }}</a>
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

</body>
</html>
