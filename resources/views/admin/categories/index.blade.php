@extends('layouts.admin')

@section('title', 'Categories')

@section('page-title', 'Manage Categories')

@section('content')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-4 sm:gap-8">

    {{-- ADD CATEGORY --}}
    <div class="xl:col-span-1">

        <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

            {{-- HEADER --}}
            <div class="px-4 sm:px-4 sm:px-6 py-5 border-b border-slate-100">

                <h2 class="text-xl font-bold text-slate-800 flex items-center">

                    <i class="fas fa-plus mr-3 text-indigo-600"></i>

                    Add Category

                </h2>

                <p class="text-sm text-slate-400 mt-2">
                    Create new content categories.
                </p>

            </div>



            {{-- FORM --}}
            <div class="p-4 sm:p-6">

                @if($errors->any())

                    <div class="mb-5 p-4 rounded-2xl bg-red-50 border border-red-100 text-red-500 text-sm font-medium">

                        {{ $errors->first() }}

                    </div>

                @endif


                <form
                    action="{{ route('admin.categories.store') }}"
                    method="POST"
                    class="space-y-5"
                >

                    @csrf


                    {{-- INPUT --}}
                    <div>

                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">

                            Category Name

                        </label>

                        <input
                            type="text"
                            name="name"
                            required
                            placeholder="e.g. Admit Card"
                            class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none text-sm font-medium text-slate-700 placeholder:text-slate-300 transition-all"
                        >

                    </div>



                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="w-full py-3 sm:py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200"
                    >

                        <i class="fas fa-plus mr-2"></i>

                        Add Category

                    </button>

                </form>

            </div>

        </div>

    </div>



    {{-- CATEGORY TABLE --}}
    <div class="xl:col-span-2">

        <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

            {{-- HEADER --}}
            <div class="px-4 sm:px-4 sm:px-8 py-5 sm:py-6 border-b border-slate-100">

                <h2 class="text-xl font-bold text-slate-800 flex items-center">

                    <i class="fas fa-tags mr-3 text-indigo-600"></i>

                    All Categories

                </h2>

                <p class="text-sm text-slate-400 mt-2">
                    Organize and manage your blog taxonomy.
                </p>

            </div>



            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[700px]">

                    <thead class="bg-slate-50 border-b border-slate-100">

                        <tr>

                            <th class="text-left px-4 sm:px-8 py-4 text-xs uppercase tracking-widest text-slate-400 font-bold">
                                Category
                            </th>

                            <th class="text-left px-4 sm:px-6 py-4 text-xs uppercase tracking-widest text-slate-400 font-bold">
                                Blogs
                            </th>

                            <th class="text-right px-4 sm:px-8 py-4 text-xs uppercase tracking-widest text-slate-400 font-bold">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @foreach($categories as $cat)

                        <tr class="hover:bg-slate-50 transition-colors">

                            {{-- CATEGORY --}}
                            <td class="px-4 sm:px-8 py-5">

                                <div class="flex items-start sm:items-center gap-3 sm:gap-4">

                                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center mr-4">

                                        <i class="fas fa-folder"></i>

                                    </div>

                                    <div>

                                        <h3 class="font-semibold sm:font-bold text-sm sm:text-base text-slate-800">
                                            {{ $cat->name }}
                                        </h3>

                                        <p class="text-sm text-slate-400">
                                            Content category
                                        </p>

                                    </div>

                                </div>

                            </td>



                            {{-- BLOG COUNT --}}
                            <td class="px-4 sm:px-6 py-5">

                                <span class="px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 text-xs font-bold uppercase tracking-wider">

                                    {{ $cat->blogs_count }} Blogs

                                </span>

                            </td>



                            {{-- ACTION --}}
                            <td class="px-4 sm:px-8 py-5">

                                <div class="flex justify-end">

                                    <form
                                        action="{{ route('admin.categories.destroy', $cat) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this category?')"
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

    </div>

</div>

@endsection