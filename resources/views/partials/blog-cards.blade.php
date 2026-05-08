@forelse($blogs as $blog)


    <div class="modern-blog-card">

        {{-- IMAGE --}}
        <div class="blog-image-wrapper">

            @if($blog->image)

                <img
                    src="{{ asset('storage/' . $blog->image) }}"
                    alt="{{ $blog->title }}"
                    class="blog-image"
                >

            @else

                <div class="blog-image-placeholder">

                    <i class="fas fa-newspaper"></i>

                </div>

            @endif


            {{-- CATEGORY --}}
            <div class="blog-category">

                {{ $blog->category->name }}

            </div>

        </div>



        {{-- CONTENT --}}
        <div class="blog-content-area">

            {{-- META --}}
            <div class="blog-meta">

                <span>

                    <i class="fas fa-calendar-alt"></i>

                    {{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}

                </span>

                <span>

                    <i class="fas fa-user"></i>

                    Ink & Quill

                </span>

            </div>



            {{-- TITLE --}}
            <h3 class="blog-title">

                {{ $blog->title }}

            </h3>



            {{-- DESCRIPTION --}}
            <p class="blog-description">

                {{ Str::limit($blog->short_description, 120) }}

            </p>



            {{-- BUTTON --}}
            <div class="mt-auto pt-4 border-top border-light">

                <a
                    href="{{ route('blogs.show', $blog->slug) }}"
                    class="read-more-btn"
                >

                    <span>Read More</span>

                    <i class="fas fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

@empty

<div class="col-12 text-center py-5">

    <h4 class="text-muted">
        No blogs found
    </h4>

</div>

@endforelse



<style>

.modern-blog-card {

    background: white;
    border-radius: 32px;
    overflow: hidden;
    border: 1px solid #f1f5f9;
    transition: 0.35s;
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);

    display: flex;
    flex-direction: column;
}

.modern-blog-card:hover {

    transform: translateY(-8px);

    box-shadow: 0 25px 50px rgba(0,0,0,0.08);
}

.blog-image-wrapper {

    position: relative;
    aspect-ratio: 16/10;
    overflow: hidden;
}

.blog-image {

    width: 100%;
    height: 100%;
    object-fit: cover;

    transition: transform 0.7s;
}

.modern-blog-card:hover .blog-image {

    transform: scale(1.05);
}

.blog-image-placeholder {

    width: 100%;
    height: 100%;

    background: linear-gradient(135deg,#4f46e5,#6366f1);

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;
    font-size: 40px;
}

.blog-category {

    position: absolute;
    top: 18px;
    left: 18px;

    padding: 8px 16px;

    background: rgba(255,255,255,0.92);

    backdrop-filter: blur(10px);

    border-radius: 999px;

    font-size: 11px;
    font-weight: 700;
    color: #4f46e5;

    text-transform: uppercase;
    letter-spacing: 1px;
}

.blog-content-area {

    padding: 28px;

    display: flex;
    flex-direction: column;

    flex-grow: 1;
}

.blog-meta {

    display: flex;
    gap: 18px;

    margin-bottom: 18px;

    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;

    color: #94a3b8;

    font-weight: 600;
}

.blog-meta i {

    margin-right: 6px;
}

.blog-title {

    font-size: 24px;
    font-weight: 700;
    line-height: 1.35;

    color: #0f172a;

    margin-bottom: 18px;

    transition: 0.3s;
}

.modern-blog-card:hover .blog-title {

    color: #4f46e5;
}

.blog-description {

    color: #64748b;

    line-height: 1.8;

    font-size: 15px;

    margin-bottom: 20px;
}

.read-more-btn {

    display: inline-flex;
    align-items: center;
    gap: 10px;

    color: #4f46e5;

    font-weight: 700;

    text-decoration: none;

    transition: 0.3s;
}

.read-more-btn:hover {

    gap: 16px;

    color: #4338ca;
}

</style>