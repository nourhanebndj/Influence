<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if(app()->getLocale() == 'en')
            {{ $blog->title_en }}
        @elseif(app()->getLocale() == 'fr')
            {{ $blog->title_fr }}
        @elseif(app()->getLocale() == 'ar')
            {{ $blog->title_ar }}
        @endif
    </title>
    <link rel="icon" href="{{ asset('mainassets/assets/images/dark_logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('mainassets/css/style1.css') }}">
    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('mainassets/css/ar/style1-rtl.css') }}">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="blog-details">

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
    </nav>
</header>

<!-- Blog Details Section -->
<section class="blog-details-section">
    <div class="blog-container">
        <!-- Blog Title and Image -->
        <div class="blog-header">
            <h1>
                @if(app()->getLocale() == 'en')
                    {{ $blog->title_en }}
                @elseif(app()->getLocale() == 'fr')
                    {{ $blog->title_fr }}
                @elseif(app()->getLocale() == 'ar')
                    {{ $blog->title_ar }}
                @endif
            </h1>
            <p class="blog-meta">{{ __('messages.published_on') }} {{ $blog->created_at->format('F d, Y') }}</p>
            <img src="{{ $blog->front_image ? asset('storage/' . $blog->front_image) : asset('mainassets/assets/images/default_image.png') }}" alt="{{ $blog->title }}" class="blog-image">
        </div>

        <!-- Blog Content -->
        <div class="blog-content">
            <p>
                @if(app()->getLocale() == 'en')
                    {{ $blog->description_en }}
                @elseif(app()->getLocale() == 'fr')
                    {{ $blog->description_fr }}
                @elseif(app()->getLocale() == 'ar')
                    {{ $blog->description_ar }}
                @endif
            </p>
        </div>
        <!-- Social Sharing -->
        <div class="blog-share">
            <h4>{{ __('messages.share_post') }}</h4>
            <div class="social-icons">
                <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts Section -->
<section class="related-posts">
    <div class="related-posts-container">
        <h2>{{ __('messages.related_posts') }}</h2>
        <div class="related-grid">
            @foreach($related_posts as $post)
            <div class="related-post-card">
                <img src="{{ $post->front_image ? asset('storage/' . $post->front_image) : asset('mainassets/assets/images/default_image.png') }}" alt="{{ $post->title }}">
                <h3><a href="{{ route('blog.show', $post->id) }}">
                    @if(app()->getLocale() == 'en')
                        {{ $post->title_en }}
                    @elseif(app()->getLocale() == 'fr')
                        {{ $post->title_fr }}
                    @elseif(app()->getLocale() == 'ar')
                        {{ $post->title_ar }}
                    @endif
                </a></h3>
                <p>
                    @if(app()->getLocale() == 'en')
                        {{ Str::limit($post->description_en, 100) }}
                    @elseif(app()->getLocale() == 'fr')
                        {{ Str::limit($post->description_fr, 100) }}
                    @elseif(app()->getLocale() == 'ar')
                        {{ Str::limit($post->description_ar, 100) }}
                    @endif
                </p>
                <a href="{{ route('blog.show', $post->id) }}" class="cta-button">{{ __('messages.read_more') }}</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Footer -->
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
                <a href="https://www.facebook.com/profile.php?id=61559513189026" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/inffluence_agency/" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@inffluence_agency?is_from_webapp=1&sender_device=pc" target="_blank" class="social-icon"><i class="fab fa-tiktok"></i></a>
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
