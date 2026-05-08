<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ink & Quill')</title>

    {{-- TAILWIND --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- FONT AWESOME --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: 'Inter', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c7d2fe;
            border-radius: 999px;
        }

    </style>

    @yield('styles')

</head>

<body class="bg-gray-50 text-gray-900 antialiased">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">

        <div class="max-w-7xl mx-auto px-4">

            <div class="flex items-center justify-between h-16">

                {{-- LOGO --}}
                <a
                    href="{{ route('blogs.index') }}"
                    class="flex items-center space-x-3"
                >

                    <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold shadow-lg">
                        I
                    </div>

                    <div>
                        <h1 class="text-lg font-extrabold tracking-tight">
                            Ink & Quill
                        </h1>
                    </div>

                </a>

                {{-- NAV LINKS --}}
                <div class="hidden md:flex items-center space-x-6">

                    <a
                        href="{{ route('blogs.index') }}"
                        class="text-sm font-semibold text-gray-600 hover:text-indigo-600 transition"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('admin.login') }}"
                        class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200"
                    >
                        Admin Panel
                    </a>

                </div>

                {{-- MOBILE MENU BUTTON --}}
                <button
                    id="mobileMenuBtn"
                    class="md:hidden text-2xl text-gray-700"
                >
                    <i class="fas fa-bars"></i>
                </button>

            </div>

        </div>

        {{-- MOBILE MENU --}}
        <div
            id="mobileMenu"
            class="hidden md:hidden border-t border-gray-100 bg-white"
        >

            <div class="px-4 py-4 flex flex-col space-y-4">

                <a
                    href="{{ route('blogs.index') }}"
                    class="text-sm font-semibold text-gray-600"
                >
                    Home
                </a>

                <a
                    href="{{ route('admin.login') }}"
                    class="text-sm font-semibold text-indigo-600"
                >
                    Admin Panel
                </a>

            </div>

        </div>

    </nav>


    {{-- MAIN CONTENT --}}
    <main class="pt-16">
        @yield('content')
    </main>


    {{-- FOOTER --}}
    <footer class="footer-modern">

    <div class="container">

        <div class="footer-simple">

            <div class="footer-brand">

                <div class="footer-logo">
                    I
                </div>

                <div>

                    <h4>Ink & Quill</h4>

                    <p>
                        Made with ❤️ by SAHIL SINGH
                    </p>

                </div>

            </div>

        </div>

    </div>

</footer>


    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>


    {{-- MOBILE MENU SCRIPT --}}
    <script>

        $('#mobileMenuBtn').on('click', function () {

            $('#mobileMenu').toggleClass('hidden');

        });

    </script>


    @yield('scripts')

</body>
</html>