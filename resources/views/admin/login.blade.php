<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        {{-- LOGIN CARD --}}
        <div class="bg-white border border-slate-200 rounded-[2rem] shadow-xl shadow-slate-200/40 overflow-hidden">

            {{-- HEADER --}}
            <div class="p-8 border-b border-slate-100 bg-slate-50/50">

                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-bold mb-5 shadow-lg shadow-indigo-200">

                    I

                </div>

                <h1 class="text-2xl font-extrabold tracking-tight text-slate-800">

                    Console Login

                </h1>

                <p class="text-slate-500 text-sm font-medium mt-2">

                    Authorized publication personnel only.

                </p>

            </div>



            {{-- FORM --}}
            <div class="p-8">

                {{-- ERRORS --}}
                @if($errors->any())

                    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 text-red-500 text-sm font-medium">

                        {{ $errors->first() }}

                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ route('admin.login') }}"
                    class="space-y-6"
                >

                    @csrf


                    {{-- EMAIL --}}
                    <div>

                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-3">

                            Access Token / Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="admin@inkquill.io"
                            class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none text-sm font-medium text-slate-700 placeholder:text-slate-300 transition-all"
                        >

                    </div>



                    {{-- PASSWORD --}}
                    <div>

                        <div class="flex items-center justify-between mb-3">

                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">

                                Passphrase

                            </label>

                            <button
                                type="button"
                                class="text-[11px] font-bold text-indigo-600 hover:underline"
                            >

                                Revoke Access?

                            </button>

                        </div>


                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none text-sm font-medium text-slate-700 placeholder:text-slate-300 transition-all"
                        >

                    </div>



                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="w-full py-4 bg-indigo-600 text-white rounded-2xl text-sm font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all active:scale-[0.98] flex items-center justify-center space-x-2"
                    >

                        <span>Authenticate</span>

                        <i class="fas fa-chevron-right text-xs"></i>

                    </button>



                    {{-- SECURITY NOTE --}}
                    <div class="pt-2 text-center">

                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">

                            Secured via End-to-End Encryption

                        </p>

                    </div>

                </form>

            </div>

        </div>



        {{-- FOOTER TEXT --}}
        <p class="mt-8 text-center text-[11px] text-slate-400 leading-relaxed max-w-[300px] mx-auto">

            By authenticating, you agree to the
            <span class="font-bold">Terms of Service</span>
            and
            <span class="font-bold">Enterprise Data Policy</span>.

        </p>

    </div>

</body>
</html>