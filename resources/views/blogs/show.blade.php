@extends('layouts.app')

@section('title', $blog->title)

@section('content')

<style>

    .article-wrapper {
        padding: 100px 0;
        background: #fff;
    }

    .article-container {
        max-width: 900px;
        margin: auto;
    }

    .breadcrumb-modern {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: #64748b;
        font-weight: 600;
        transition: 0.3s;
    }

    .back-btn:hover {
        color: #4f46e5;
    }

    .category-chip {
        display: inline-block;
        padding: 8px 18px;
        background: #eef2ff;
        color: #4f46e5;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .article-title {
        font-size: 64px;
        line-height: 1.05;
        font-weight: 800;
        letter-spacing: -3px;
        color: #0f172a;
        margin: 30px 0;
    }

    .article-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 30px 0;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        margin-bottom: 50px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .author-box {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .author-avatar {
        width: 54px;
        height: 54px;
        border-radius: 50%;
        object-fit: cover;
    }

    .article-image {
        width: 100%;
        border-radius: 32px;
        overflow: hidden;
        margin-bottom: 60px;
        box-shadow: 0 25px 60px rgba(0,0,0,0.12);
    }

    .article-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .article-description {
        font-size: 24px;
        line-height: 1.8;
        color: #64748b;
        border-left: 4px solid #4f46e5;
        padding-left: 24px;
        margin-bottom: 50px;
        font-style: italic;
    }

    .article-content {
        font-size: 19px;
        line-height: 2;
        color: #334155;
    }

    .article-content p {
        margin-bottom: 30px;
    }

    .floating-box {
        background: #eef2ff;
        border: 1px solid #c7d2fe;
        border-radius: 32px;
        padding: 40px;
        margin: 60px 0;
    }

    .floating-box p {
        color: #312e81;
        font-size: 20px;
        line-height: 1.8;
        margin: 0;
        font-style: italic;
    }

    .categories-side {
        margin-top: 80px;
        padding: 40px;
        background: #f8fafc;
        border-radius: 32px;
    }

    .categories-side h4 {
        margin-bottom: 25px;
        font-weight: 700;
    }

    .cat-link {
        display: inline-block;
        margin: 8px;
        text-decoration: none;
    }

    .share-btn {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        border: 1px solid #e5e7eb;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        transition: 0.3s;
    }

    .share-btn:hover {
        background: #eef2ff;
        color: #4f46e5;
        border-color: #c7d2fe;
    }

    @media(max-width:768px) {

        .article-title {
            font-size: 42px;
            line-height: 1.15;
        }

        .article-description {
            font-size: 20px;
        }

        .article-content {
            font-size: 17px;
        }

    }

</style>


<section class="article-wrapper">

    <div class="container article-container">

        {{-- BREADCRUMB --}}
        <div class="breadcrumb-modern">

            <a href="{{ route('blogs.index') }}" class="back-btn">

                <i class="fas fa-arrow-left"></i>

                Back to feed

            </a>

            <span class="text-muted">/</span>

            <span class="text-muted">
                {{ $blog->category->name }}
            </span>

        </div>



        {{-- HEADER --}}
        <header>

            <span class="category-chip">
                {{ $blog->category->name }}
            </span>

            <h1 class="article-title">
                {{ $blog->title }}
            </h1>

        </header>



        {{-- META --}}
        <div class="article-meta">

            <div class="author-box">

                <img
                    src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode($blog->title) }}"
                    class="author-avatar"
                >

                <div>

                    <strong class="d-block">
                        Ink & Quill Editorial
                    </strong>

                    <small class="text-muted">

                        {{ \Carbon\Carbon::parse($blog->published_date)->format('F d, Y') }}

                    </small>

                </div>

            </div>



            <div class="d-flex gap-2">

                <a href="#" class="share-btn">
                    <i class="fab fa-twitter"></i>
                </a>

                <a href="#" class="share-btn">
                    <i class="fab fa-linkedin"></i>
                </a>

                <a href="#" class="share-btn">
                    <i class="fas fa-share-alt"></i>
                </a>

            </div>

        </div>



        {{-- IMAGE --}}
        @if($blog->image)

        <div class="article-image">

            <img
                src="{{ asset('storage/' . $blog->image) }}"
                alt="{{ $blog->title }}"
            >

        </div>

        @endif



        {{-- DESCRIPTION --}}
        <div class="article-description">

            {{ $blog->short_description }}

        </div>



        {{-- CONTENT --}}
        <div class="article-content">

            {!! $blog->content !!}

        </div>



        {{-- QUOTE BOX --}}
        <div class="floating-box">

            <p>
                “The future belongs to creators who combine technology,
                storytelling, and human-centered thinking.”
            </p>

        </div>



        {{-- CATEGORIES --}}
        <div class="categories-side">

            <h4>
                Explore Categories
            </h4>

            @foreach($categories as $cat)

                <a
                    href="/?category={{ $cat->id }}"
                    class="cat-link"
                >

                    <span class="category-chip">
                        {{ $cat->name }}
                    </span>

                </a>

            @endforeach

        </div>

    </div>

</section>

@endsection