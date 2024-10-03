@foreach($articles as $article)
<div class="blog-card">
    <img src="{{ $article->front_image ? asset('storage/' . $article->front_image) : asset('mainassets/assets/images/default_image.png') }}" alt="Blog post image" class="blog-image">
    <div class="blog-text">
        <h4>{{ $article->title }}</h4>
        <p>{{ Str::limit($article->description, 185) }}</p>
        <a href="{{ route('blog.show', $article->id) }}" class="cta-button">Read More</a>
    </div>
</div>
@endforeach
