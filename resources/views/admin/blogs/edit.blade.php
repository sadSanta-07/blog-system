@extends('layouts.admin')

@section('title', 'Edit Blog')

@section('page-title', 'Edit Blog')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">

        <div>

            <h1 class="text-3xl font-extrabold tracking-tight text-slate-800">
                Edit Blog
            </h1>

            <p class="text-slate-400 font-medium mt-1">
                Update and manage your article content.
            </p>

        </div>


        <a
            href="{{ route('admin.blogs.index') }}"
            class="inline-flex items-center px-5 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-semibold text-slate-600 hover:bg-slate-50 transition"
        >

            <i class="fas fa-arrow-left mr-2"></i>

            Back

        </a>

    </div>



    {{-- ERRORS --}}
    @if($errors->any())

        <div class="mb-6 bg-red-50 border border-red-100 rounded-2xl p-5">

            <div class="flex items-center mb-3 text-red-600 font-bold">

                <i class="fas fa-circle-exclamation mr-2"></i>

                Validation Errors

            </div>

            <div class="space-y-2 text-sm text-red-500">

                @foreach($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        </div>

    @endif



    <form
        action="{{ route('admin.blogs.update', $blog) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">

            {{-- MAIN FORM --}}
            <div class="xl:col-span-3 space-y-6">


                {{-- TITLE + DESCRIPTION --}}
                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 shadow-sm">

                    {{-- TITLE --}}
                    <div class="mb-6">

                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">

                            Blog Title

                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $blog->title) }}"
                            required
                            class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none font-bold text-2xl text-slate-800 placeholder:text-slate-300"
                        >

                    </div>


                    {{-- SHORT DESCRIPTION --}}
                    <div>

                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">

                            Short Description

                        </label>

                        <textarea
                            name="short_description"
                            rows="3"
                            required
                            class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none text-sm font-medium text-slate-600 resize-none"
                        >{{ old('short_description', $blog->short_description) }}</textarea>

                    </div>

                </div>



                {{-- QUILL EDITOR --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<div class="bg-white border border-slate-200 rounded-[2rem] shadow-sm overflow-hidden">

    {{-- TOOLBAR --}}
    <div id="toolbar" class="border-b border-slate-100 bg-slate-50 p-4">

        <span class="ql-formats">
            <select class="ql-header"></select>
        </span>

        <span class="ql-formats">
            <button class="ql-bold"></button>
            <button class="ql-italic"></button>
            <button class="ql-underline"></button>
        </span>

        <span class="ql-formats">
            <button class="ql-list" value="ordered"></button>
            <button class="ql-list" value="bullet"></button>
        </span>

        <span class="ql-formats">
            <button class="ql-link"></button>
            <button class="ql-image"></button>
        </span>

    </div>

    {{-- EDITOR --}}
<div
    id="editor"
    style="height: 500px;"
    class="bg-white text-slate-700 rounded-b-[2rem]"
>
        {!! old('content', $blog->content) !!}
    </div>

    {{-- HIDDEN INPUT --}}
    <input
        type="hidden"
        name="content"
        id="content"
    >

</div>

            </div>



            {{-- SIDEBAR --}}
            <div class="space-y-6">


                {{-- SETTINGS --}}
                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 shadow-sm">

                    {{-- CATEGORY --}}
                    <div>

                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">

                            Category

                        </label>

                        <select
                            name="category_id"
                            required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold text-slate-700 outline-none focus:ring-2 focus:ring-indigo-500"
                        >

                            @foreach($categories as $cat)

                                <option
                                    value="{{ $cat->id }}"
                                    {{ $blog->category_id == $cat->id ? 'selected' : '' }}
                                >

                                    {{ $cat->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- DATE --}}
                    <div class="mt-6">

                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">

                            Published Date

                        </label>

                        <input
                            type="date"
                            name="published_date"
                            value="{{ old('published_date', $blog->published_date) }}"
                            required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-indigo-500"
                        >

                    </div>

                </div>



                {{-- CURRENT IMAGE --}}
                @if($blog->image)

                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 shadow-sm">

                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">

                        Current Image

                    </label>

                    <img
                        src="{{ asset('storage/' . $blog->image) }}"
                        class="w-full rounded-3xl object-cover border border-slate-100"
                    >

                </div>

                @endif



                {{-- IMAGE UPLOAD --}}
                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 shadow-sm">

                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">

                        Replace Image

                    </label>


                    <label class="relative aspect-square rounded-3xl border-2 border-dashed border-slate-200 bg-slate-50 hover:border-indigo-300 hover:bg-indigo-50/30 transition-all flex flex-col items-center justify-center text-center cursor-pointer p-6">

                        <div class="w-16 h-16 rounded-2xl bg-white shadow-sm flex items-center justify-center text-slate-400 mb-4">

                            <i class="fas fa-cloud-upload-alt text-2xl"></i>

                        </div>

                        <p class="font-bold text-slate-600 mb-2">
                            Upload New Image
                        </p>

                        <p class="text-xs text-slate-400 leading-relaxed">
                            PNG, JPG up to 5MB
                        </p>

                        <input
                            type="file"
                            name="image"
                            accept="image/*"
                            class="absolute inset-0 opacity-0 cursor-pointer"
                        >

                    </label>

                </div>



                {{-- ACTIONS --}}
                <div class="flex flex-col gap-3">

                    <button
                        type="submit"
                        class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200"
                    >

                        <i class="fas fa-save mr-2"></i>

                        Update Blog

                    </button>


                    <a
                        href="{{ route('admin.blogs.index') }}"
                        class="w-full py-4 text-center bg-white border border-slate-200 rounded-2xl font-semibold text-slate-600 hover:bg-slate-50 transition"
                    >

                        Cancel

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

@section('scripts')

<style>

.ql-toolbar {
    border: none !important;
}

.ql-container {
    border: none !important;
    font-size: 16px;
}

.ql-editor {
    min-height: 500px;
    padding: 32px;
    color: #334155;
}

</style>

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>

const quill = new Quill('#editor', {

    theme: 'snow',

    modules: {
        toolbar: '#toolbar'
    },

    placeholder: 'Edit your article...'

});

document.querySelector('form').onsubmit = function () {

    document.querySelector('#content').value =
        quill.root.innerHTML;
};

</script>

@endsection