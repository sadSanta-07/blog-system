@extends('layouts.admin')

@section('title', 'Manage Blogs')

@section('page-title', 'Manage Blogs')

@section('content')

{{-- STATS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6 mb-8">

    <div class="bg-white border border-slate-200 rounded-3xl p-5 sm:p-6 shadow-sm">

        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">
            Total Blogs
        </p>

        <h2 class="text-4xl font-extrabold tracking-tight text-slate-800">
            {{ $blogs->count() }}
        </h2>

        <div class="mt-4 flex items-center text-green-600 text-sm font-semibold">

            <i class="fas fa-arrow-trend-up mr-2"></i>

            Active publications

        </div>

    </div>

</div>



{{-- BLOG TABLE --}}
<div class="bg-white border border-slate-200 rounded-[2rem] shadow-sm overflow-hidden">

    {{-- HEADER --}}
    <div class="px-4 sm:px-8 py-6 border-b border-slate-100 flex items-center justify-between">

        <div>

            <h2 class="text-xl font-bold text-slate-800">
                All Blogs
            </h2>

            <p class="text-sm text-slate-400 mt-1">
                Manage all published articles
            </p>

        </div>

    </div>



    {{-- TABLE --}}
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50 border-b border-slate-100">

                <tr>

                    <th class="text-left px-4 sm:px-8 py-4 text-xs uppercase tracking-widest text-slate-400 font-bold">
                        Blog
                    </th>

                    <th class="text-left px-4 sm:px-6 py-4 text-xs uppercase tracking-widest text-slate-400 font-bold">
                        Category
                    </th>

                    <th class="text-left px-4 sm:px-6 py-4 text-xs uppercase tracking-widest text-slate-400 font-bold">
                        Date
                    </th>

                    <th class="text-right px-4 sm:px-8 py-4 text-xs uppercase tracking-widest text-slate-400 font-bold">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                @foreach($blogs as $blog)

                <tr class="hover:bg-slate-50 transition-colors">

                    {{-- BLOG --}}
                    <td class="px-4 sm:px-8 py-5">

                        <div class="flex items-start sm:items-center gap-3 sm:gap-4">

                            @if($blog->image)

                                <img
                                    src="{{ asset('storage/' . $blog->image) }}"
                                    class="w-12 h-12 sm:w-16 sm:h-16 rounded-2xl object-cover border border-slate-200 shrink-0"
                                >

                            @else

                                <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600">
                                    <i class="fas fa-newspaper"></i>
                                </div>

                            @endif


                            <div>

                                <h3 class="font-bold text-slate-800">
                                    {{ Str::limit($blog->title, 40) }}
                                </h3>

                                <p class="text-sm text-slate-400 mt-1">
                                    {{ Str::limit($blog->short_description, 60) }}
                                </p>

                            </div>

                        </div>

                    </td>


                    {{-- CATEGORY --}}
                    <td class="px-4 sm:px-6 py-5">

                        <span class="px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 text-xs font-bold uppercase tracking-wider">

                            {{ $blog->category->name }}

                        </span>

                    </td>


                    {{-- DATE --}}
                    <td class="px-4 sm:px-6 py-5 text-sm font-medium text-slate-500">

                        {{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}

                    </td>


                    {{-- ACTIONS --}}
                    <td class="px-4 sm:px-8 py-5">

                        <div class="flex items-center justify-end gap-2 sm:gap-3">

                            <a
                                href="{{ route('admin.blogs.edit', $blog) }}"
                                class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center hover:bg-amber-100 transition"
                            >

                                <i class="fas fa-pen"></i>

                            </a>


                            <form
                                action="{{ route('admin.blogs.destroy', $blog) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this blog?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-10 h-10 rounded-xl bg-red-50 text-red-500 flex items-center justify-center hover:bg-red-100 transition"
                                >

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection
