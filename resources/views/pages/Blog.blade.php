<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.blog_page_title') }}</title>
    <link rel="icon" href="{{ asset('mainassets/assets/images/dark_logo.png') }}" type="image/png">

    <meta name="description" content="Explore our blog at Influence Agency and stay updated with the latest industry insights, expert tips, and valuable resources in digital marketing, branding, and more.">
    <meta name="keywords" content="blog, digital marketing, branding, business insights, industry news, expert tips, Influence Agency, marketing blog, branding blog">
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

<section class="hero-section">
    <h1>{{ __('messages.explore_blogs') }}</h1>
    <p>{{ __('messages.explore_blogs_text') }}</p>
    <a href="/contact" class="cta-button">{{ __('messages.drop_us_a_line') }}</a>
</section>

<section class="blog-section">
    <div class="blog-container">
       <!-- Latest Blog Post -->
@if($latestArticle)
<div class="latest-post">
    <h2>{{ __('messages.latest_blog_post') }}</h2>
    <div class="latest-post-content">
        <img src="{{ $latestArticle->front_image ? asset('storage/' . $latestArticle->front_image) : asset('mainassets/assets/images/default_image.png') }}" alt="Latest post image" class="latest-post-image">
        <div class="latest-post-text">
            @if(app()->getLocale() == 'en')
                <h3>{{ $latestArticle->title_en }}</h3>
                <p>{{ Str::limit($latestArticle->description_en, 1000) }}</p>
            @elseif(app()->getLocale() == 'fr')
                <h3>{{ $latestArticle->title_fr }}</h3>
                <p>{{ Str::limit($latestArticle->description_fr, 1000) }}</p>
            @elseif(app()->getLocale() == 'ar')
                <h3>{{ $latestArticle->title_ar }}</h3>
                <p>{{ Str::limit($latestArticle->description_ar, 1000) }}</p>
            @endif
            <a href="{{ route('blog.show', $latestArticle->id) }}" class="cta-button">{{ __('messages.read_more') }}</a>
        </div>
    </div>
</div>
@endif


     <!-- Other Blog Posts -->
<div class="other-blogs">
    <div class="other-blogs-header">
        <h2>{{ __('messages.other_blogs') }}</h2>
    </div>
    @if($articles->isEmpty())
        <p>{{ __('messages.no_other_blogs') }}</p>
    @else
        <div class="blog-grid">
            @foreach($articles as $article)
            <div class="blog-card">
                <img src="{{ $article->front_image ? asset('storage/' . $article->front_image) : asset('mainassets/assets/images/default_image.png') }}" alt="Blog post image" class="blog-image">
                <div class="blog-text">
                    @if(app()->getLocale() == 'en')
                        <h4>{{ $article->title_en }}</h4>
                        <p>{{ Str::limit($article->description_en, 185) }}</p>
                    @elseif(app()->getLocale() == 'fr')
                        <h4>{{ $article->title_fr }}</h4>
                        <p>{{ Str::limit($article->description_fr, 185) }}</p>
                    @elseif(app()->getLocale() == 'ar')
                        <h4>{{ $article->title_ar }}</h4>
                        <p>{{ Str::limit($article->description_ar, 185) }}</p>
                    @endif
                    <a href="{{ route('blog.show', $article->id) }}" class="cta-button">{{ __('messages.read_more') }}</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <button id="load-more-btn" class="see-more-btn-blog" onclick="loadMoreBlogs()">{{ __('messages.see_more') }}</button>
        </div>
    @endif
</div>

    </div>
</section>

<section class="cta-section">
    <h2>{{ __('messages.project_in_mind') }}<br>{{ __('messages.connect_with_us_now') }}</h2>
    <a href="/contact" class="cta-button">{{ __('messages.connect_with_us_now') }}</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let page = 1;

    function loadMoreBlogs() {
        page++;
        $.ajax({
            url: "{{ route('blogs.loadMore') }}",
            type: 'GET',
            data: { page: page },
            success: function(response) {
                // Ajouter les nouveaux articles à la grille
                $('.blog-grid').append(response.html);

                // Si plus d'articles à charger, cacher le bouton
                if (!response.hasMorePages) {
                    $('#load-more-btn').hide();
                }
            },
            error: function(xhr) {
                console.error('Erreur lors du chargement des articles:', xhr);
            }
        });
    }
</script>

</body>
</html>
