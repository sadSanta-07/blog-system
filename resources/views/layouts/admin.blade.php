<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden">

<div class="min-h-screen bg-slate-50 flex">

{{-- MOBILE OVERLAY --}}
<div
    id="sidebarOverlay"
    class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"
    onclick="toggleSidebar()"
></div>

    {{-- SIDEBAR --}}
    <aside
    id="sidebar"
    class="fixed lg:static top-0 left-0 z-50 h-screen w-72 bg-white border-r border-slate-200 flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 overflow-y-auto"
>

        {{-- LOGO --}}
        <div class="h-20 px-8 flex items-center border-b border-slate-100">

            <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold shadow-lg mr-3">
                I
            </div>

            <div>
                <h1 class="font-extrabold tracking-tight text-lg">
                    Ink & Quill
                </h1>

                <p class="text-xs text-slate-400 font-medium">
                    Admin Dashboard
                </p>
            </div>

        </div>


        {{-- NAVIGATION --}}
        <nav class="flex-1 px-4 py-6 space-y-2">

            <a
                href="{{ route('admin.blogs.index') }}"
                class="flex items-center px-4 py-3 rounded-2xl text-sm font-semibold transition-all
                {{ request()->routeIs('admin.blogs.*')
                    ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200'
                    : 'text-slate-500 hover:bg-slate-100 hover:text-indigo-600'
                }}"
            >

                <i class="fas fa-newspaper mr-3"></i>

                Blogs

            </a>


            <a
                href="{{ route('admin.categories.index') }}"
                class="flex items-center px-4 py-3 rounded-2xl text-sm font-semibold transition-all
                {{ request()->routeIs('admin.categories.*')
                    ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200'
                    : 'text-slate-500 hover:bg-slate-100 hover:text-indigo-600'
                }}"
            >

                <i class="fas fa-tags mr-3"></i>

                Categories

            </a>

        </nav>


        {{-- USER --}}
        <div class="p-4 border-t border-slate-100">

            <div class="flex items-center justify-between bg-slate-50 rounded-2xl p-4">

                <div class="flex items-center">

                    <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold mr-3">
                        {{ strtoupper(substr(Auth::guard('admin')->user()?->name ?? 'A', 0, 1)) }}
                    </div>

                    <div>

                        <p class="text-sm font-bold text-slate-800">
                            {{ Auth::guard('admin')->user()?->name }}
                        </p>

                        <p class="text-xs text-slate-400">
                            Administrator
                        </p>

                    </div>

                </div>

            </div>


            <form action="{{ route('admin.logout') }}" method="POST" class="mt-4">
                @csrf

                <button
                    type="submit"
                    class="w-full py-3 rounded-2xl bg-red-50 text-red-500 font-semibold hover:bg-red-100 transition"
                >

                    <i class="fas fa-sign-out-alt mr-2"></i>

                    Logout

                </button>

            </form>

        </div>

    </aside>



    {{-- MAIN CONTENT --}}
    <main class="flex-1 overflow-y-auto h-screen">

    {{-- MOBILE HEADER --}}
<div class="lg:hidden sticky top-0 z-30 bg-white border-b border-slate-200 px-4 py-4 flex items-center justify-between">

    <button
        onclick="toggleSidebar()"
        class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center"
    >
        <i class="fas fa-bars text-slate-700"></i>
    </button>

    <h2 class="font-bold text-slate-800">
        Admin Panel
    </h2>

</div>

        {{-- TOPBAR --}}
        <div class="bg-white border-b border-slate-200 px-4 sm:px-6 lg:px-10 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>

                <h1 class="text-xl sm:text-2xl font-bold tracking-tight">
                    @yield('page-title', 'Dashboard')
                </h1>

                <p class="text-sm text-slate-400 font-medium">
                    Manage your publication platform
                </p>

            </div>


           <div class="flex flex-wrap items-center gap-3">

    {{-- VIEW WEBSITE --}}
    <a
        href="{{ route('blogs.index') }}"
        class="text-sm text-slate-500 hover:text-indigo-600 font-semibold transition"
    >
        View Website
    </a>


    {{-- NEW BLOG --}}
    <a
        href="{{ route('admin.blogs.create') }}"
        class="inline-flex items-center px-5 py-3 bg-indigo-600 text-white rounded-2xl font-semibold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all"
    >

        <i class="fas fa-plus mr-2"></i>

        New Blog

    </a>

</div>

        </div>


        {{-- CONTENT --}}
        <div class="p-6 lg:p-10">

            @if(session('success'))

                <div class="mb-6 p-4 rounded-2xl bg-green-50 border border-green-100 text-green-700 font-medium">

                    {{ session('success') }}

                </div>

            @endif


            @yield('content')

        </div>

    </main>

</div>

@yield('scripts')

<script>

function toggleSidebar() {

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    sidebar.classList.toggle('-translate-x-full');

    overlay.classList.toggle('hidden');
}

</script>

</body>
</html>