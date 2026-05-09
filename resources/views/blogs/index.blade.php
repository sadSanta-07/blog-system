@extends('layouts.app')

@section('title', 'Ink & Quill')

@section('content')

<style>
    .hero-section {
        padding: 120px 0 100px;
        background: #fff;
        text-align: center;
        border-bottom: 1px solid #eee;
    }

    .hero-badge {
        display: inline-block;
        padding: 10px 22px;
        background: #eef2ff;
        color: #4f46e5;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 30px;
        text-transform: uppercase;
    }

    .hero-title {
        font-size: 72px;
        line-height: 1.05;
        font-weight: 800;
        color: #0f172a;
        max-width: 950px;
        margin: auto;
        letter-spacing: -3px;
    }

    .hero-title span {
        color: #4f46e5;
        font-style: italic;
    }

    .hero-desc {
        font-size: 22px;
        color: #64748b;
        max-width: 760px;
        margin: 35px auto;
        line-height: 1.7;
    }

    .subscribe-box {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 40px;
        flex-wrap: wrap;
    }

    .subscribe-input {
        width: 350px;
        border: 1px solid #e5e7eb;
        background: #f8fafc;
        border-radius: 18px;
        padding: 18px 22px;
        outline: none;
    }

    .subscribe-btn {
        background: #4f46e5;
        border: none;
        color: white;
        padding: 18px 34px;
        border-radius: 18px;
        font-weight: 700;
        box-shadow: 0 10px 30px rgba(79,70,229,0.25);
        transition: 0.3s;
    }

    .subscribe-btn:hover {
        background: #4338ca;
        transform: translateY(-2px);
    }

    .filter-bar {
        position: sticky;
        top: 80px;
        z-index: 100;
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid #eee;
        background: #fff;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
        padding: 18px 0;
    }

.search-section {

    padding: 32px 0 0;
}

.search-box-wrapper {

    position: relative;

    max-width: 420px;

    width: 100%;

    margin-left: 0;
}

.search-section .container-fluid {

    display: flex;

    justify-content: flex-start;
}

.search-box-wrapper i {

    position: absolute;

    left: 20px;
    top: 50%;

    transform: translateY(-50%);

    color: #94a3b8;
}

.search-modern {

    width: 100%;

    border: 1px solid #e5e7eb;

    background: white;

    border-radius: 18px;

    padding: 18px 22px 18px 52px;

    font-size: 15px;

    transition: 0.3s;
}

.search-modern:focus {

    outline: none;

    border-color: #4f46e5;

    box-shadow: 0 0 0 4px rgba(79,70,229,0.08);
}

.date-filter {

    display: flex;
    align-items: center;

    gap: 12px;

    padding: 14px 20px;

    border: 1px solid #e5e7eb;

    border-radius: 18px;

    background: white;

    color: #475569;
}

.date-input {

    border: none;

    outline: none;

    background: transparent;

    font-weight: 600;

    color: #334155;
}

    .filter-btn.active,
    .filter-btn:hover {
        background: #4f46e5;
        color: white;
        border-color: #4f46e5;
    }

    #loading {
        display: none;
        text-align: center;
        padding: 60px 0;
    }

.footer-modern {

    background: white;

    border-top: 1px solid #eef2f7;

    padding: 50px 0;

    margin-top: 80px;
}

.footer-simple {

    display: flex;

    justify-content: center;

    align-items: center;

    text-align: center;
}

.footer-brand {

    display: flex;

    align-items: center;

    gap: 18px;
}

.footer-logo {

    width: 54px;
    height: 54px;

    border-radius: 16px;

    background: linear-gradient(135deg,#4f46e5,#6366f1);

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-weight: 800;

    font-size: 22px;

    box-shadow: 0 10px 25px rgba(79,70,229,0.25);
}

.footer-brand h4 {

    margin: 0;

    font-size: 24px;

    font-weight: 800;

    color: #0f172a;
}

.footer-brand p {

    margin: 6px 0 0;

    color: #64748b;

    font-size: 15px;
}

@media(max-width:768px){

    .footer-brand {

        flex-direction: column;

        text-align: center;
    }
}

    .blogs-section {

    max-width: 1450px;

    margin: auto;

    padding: 80px 32px;
}

.blog-grid {

    display: grid;

grid-template-columns: repeat(auto-fit, minmax(320px, 380px));

    gap: 38px;

    justify-content: center;
}

@media(max-width: 992px){

    .blog-grid{

        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 768px){

    .blog-grid{

        grid-template-columns: 1fr;
    }
}

.modern-blog-card {

    background: white;

    border-radius: 32px;

    overflow: hidden;

    border: 1px solid #eef2f7;

    box-shadow:
        0 4px 20px rgba(15,23,42,0.03),
        0 1px 3px rgba(15,23,42,0.04);

    transition: all 0.4s ease;

    min-height: auto;
}

.modern-blog-card:hover {

    transform: translateY(-10px);

    box-shadow:
        0 30px 60px rgba(15,23,42,0.08);
}

.blog-image-wrapper {

    aspect-ratio: 16/10;

    height: auto;
}
.blog-content-area {

    padding: 34px;
}

.blog-title {

    font-size: 20px;

    line-height: 1.35;

    letter-spacing: -1px;

    margin-bottom: 20px;
}

.blog-description {

    font-size: 16px;

    line-height: 1.8;
}

.blog-meta {

    margin-bottom: 22px;
}
.filter-layout {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 24px;

    max-width: 1600px;

    margin: auto;
}

.category-pills {

    display: flex;
    align-items: center;

    gap: 14px;

    overflow-x: auto;

    padding-bottom: 4px;

    scrollbar-width: none;
}

.category-pills::-webkit-scrollbar {

    display: none;
}

.filter-btn {

    flex-shrink: 0;

    border: 1px solid #e5e7eb;

    background: white;

    padding: 14px 28px;

    border-radius: 999px;

    font-size: 15px;
    font-weight: 700;

    color: #475569;

    transition: all 0.3s ease;
}

.filter-btn.active,
.filter-btn:hover {

    background: #4f46e5;

    color: white;

    border-color: #4f46e5;

    box-shadow: 0 10px 25px rgba(79,70,229,0.18);
}

.filter-actions {

    display: flex;
    align-items: center;

    gap: 14px;
}

.action-btn {

    border: 1px solid #e5e7eb;

    background: white;

    padding: 10px 18px;

    border-radius: 16px;

    font-size: 14px;

    font-weight: 700;

    color: #475569;

    display: flex;
    align-items: center;
    gap: 10px;

    transition: 0.3s;
}

.action-btn:hover {

    border-color: #cbd5e1;

    background: #f8fafc;
}

.action-btn i {

    color: #94a3b8;
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

@media (max-width: 992px) {

    .hero-section {

        padding: 90px 0 70px;
    }

    .hero-title {

        font-size: 52px;

        line-height: 1.1;

        letter-spacing: -2px;
    }

    .hero-desc {

        font-size: 18px;

        padding: 0 10px;
    }

    .blogs-section {

        padding: 60px 24px;
    }

    .blog-grid {

        grid-template-columns: repeat(2, minmax(0, 1fr));

        gap: 24px;
    }

    .filter-layout {

        flex-direction: column;

        align-items: flex-start;

        gap: 18px;
    }

    .filter-actions {

        width: 100%;
    }

    .search-box-wrapper {

        max-width: 100%;
    }
}



@media (max-width: 768px) {

    .container-fluid {

        padding-left: 18px !important;

        padding-right: 18px !important;
    }

    .hero-section {

        padding: 70px 0 55px;
    }

    .hero-title {

        font-size: 38px;

        line-height: 1.15;

        letter-spacing: -1px;
    }

    .hero-desc {

        font-size: 16px;

        line-height: 1.7;

        margin-top: 24px;
    }

    .hero-badge {

        font-size: 10px;

        padding: 8px 18px;
    }

    .subscribe-box {

        flex-direction: column;
    }

    .subscribe-input,
    .subscribe-btn {

        width: 100%;
    }

    .filter-bar {

        top: 0;

        padding: 16px 0;
    }

    .category-pills {

        width: 100%;

        overflow-x: auto;

        white-space: nowrap;

        padding-bottom: 10px;
    }

    .filter-btn {

        padding: 12px 22px;

        font-size: 14px;
    }

    .filter-actions {

        width: 100%;

        flex-direction: column;

        align-items: stretch;
    }

    .date-filter,
    .action-btn {

        width: 100%;
    }

    .search-section {

        padding-top: 20px;
    }

    .search-modern {

        height: 58px;

        font-size: 14px;

        border-radius: 16px;
    }

    .blog-grid {

        grid-template-columns: 1fr;

        gap: 24px;
    }

    .blogs-section {

        padding: 40px 18px;
    }

    .modern-blog-card {

        border-radius: 24px;
    }

    .blog-content-area {

        padding: 24px;
    }

    .blog-title {

        font-size: 22px;
    }

    .blog-description {

        font-size: 14px;
    }

    .footer-modern {

        padding: 50px 0 30px;

        text-align: center;
    }

    .footer-modern .text-md-end {

        text-align: center !important;
    }
}


</style>

{{-- HERO SECTION --}}
<section class="hero-section">

<div class="container-fluid px-5">

        <span class="hero-badge">
            The Dev Digest
        </span>

        <h1 class="hero-title">
            Ideas that shape the
            <span>future</span>
            of design & technology.
        </h1>

        <p class="hero-desc">
                Thoughtful articles on tech, design, AI, startups, and digital culture.
        </p>

        <div class="subscribe-box">

            <input
                type="email"
                class="subscribe-input"
                placeholder="Enter your email"
            >

            <button class="subscribe-btn">
                Subscribe Free
            </button>

        </div>

    </div>

</section>


{{-- FILTER BAR --}}
<section class="filter-bar">

    <div class="container-fluid px-5">

        <div class="filter-layout">

            <div class="category-pills">

                <button class="filter-btn active" data-category="all">
                    All
                </button>

                @foreach($categories as $cat)

                    <button
                        class="filter-btn"
                        data-category="{{ $cat->id }}"
                    >
                        {{ $cat->name }}
                    </button>

                @endforeach

            </div>


<div class="filter-actions">
                <div class="date-filter">

    <i class="fas fa-calendar-alt"></i>

    <input
        type="date"
        id="date"
        class="date-input"
    >

</div>


            </div>

        </div>

    </div>

</section>

<section class="search-section">

    <div class="container-fluid px-5">

        <div class="search-box-wrapper">

            <i class="fas fa-search"></i>

            <input
                type="text"
                id="search"
                placeholder="Search articles..."
                class="search-modern"
            >

        </div>

    </div>

</section>


{{-- LOADING --}}
<div id="loading">

    <div class="spinner-border text-primary"></div>

    <p class="mt-3 text-muted">
        Loading blogs...
    </p>

</div>


{{-- BLOGS --}}
<section class="blogs-section">

    <div
    id="blog-container"
    class="blog-grid"
>

        @include('partials.blog-cards', ['blogs' => $blogs])

    </div>

</section>


@endsection


@section('scripts')

<script>

let filterTimer;
let activeCategory = 'all';

function fetchBlogs() {

    $('#loading').show();

    $('#blog-container').hide();

    $.ajax({

        url: '/',

        method: 'GET',

        data: {

            search: $('#search').val(),
            category: activeCategory,
            date: $('#date').val(),

        },

        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },

        success: function(response) {

            $('#blog-container')
                .html(response.html)
                .fadeIn();

            $('#loading').hide();

        }

    });

}


$('.filter-btn').on('click', function() {

    $('.filter-btn').removeClass('active');

    $(this).addClass('active');

    activeCategory = $(this).data('category');

    fetchBlogs();

});


$('#search').on('keyup', function() {

    clearTimeout(filterTimer);

    filterTimer = setTimeout(fetchBlogs, 400);

});


$('#date').on('change', fetchBlogs);

</script>

@endsection