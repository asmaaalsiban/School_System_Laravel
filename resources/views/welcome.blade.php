<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نظام إدارة المدرسة الذكي</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cairo:400,600,700,900" rel="stylesheet" />
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-150 transition duration-200">

    <nav
        class="border-b border-gray-100 dark:border-gray-800 bg-white/80 dark:bg-gray-900/80 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
            <div class="flex items-center space-x-2 space-x-reverse">
                <span class="p-2 bg-blue-600 text-white rounded-xl shadow-md shadow-blue-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                </span>
                <span class="font-black text-xl text-gray-800 dark:text-gray-100 tracking-tight"> مدرستي
                    <span class="text-blue-600">الذكية </span>
                </span>
            </div>

            <div class="flex items-center space-x-3 space-x-reverse">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-xl text-sm transition shadow-sm">
                            لوحة التحكم
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-gray-650 hover:text-gray-900 dark:text-gray-450 dark:hover:text-gray-200 font-bold text-sm px-4 py-2 transition">
                            تسجيل الدخول
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="bg-gray-900 hover:bg-gray-800 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-xl text-sm transition shadow-sm">
                                إنشاء حساب جديد
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <header class="py-20 lg:py-32 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
        <div
            class="absolute inset-0 bg-gradient-to-b from-blue-500/5 to-transparent -z-10 rounded-full blur-3xl w-96 h-96 mx-auto">
        </div>

        <span
            class="inline-block bg-blue-50 dark:bg-blue-950/50 text-blue-600 dark:text-blue-400 text-xs font-bold px-4 py-1.5 rounded-full mb-4 border border-blue-200/40">الإصدار
            v1.0 المستقر لعام 2026</span>
        <h1
            class="text-4xl sm:text-6xl font-black text-gray-900 dark:text-white leading-tight tracking-tight max-w-4xl mx-auto">
            إدارة المنظومة التعليمية <br><span
                class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-500">بأسلوب رقمي ذكي
                ومتكامل</span>
        </h1>
        <p class="mt-6 text-base sm:text-lg text-gray-500 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
            منصة واحدة تجمع الإدارة المدرسية بالمعلمين الأكفاء والطلاب، لتسهيل توزيع الصفوف، متابعة القدرات الاستيعابية،
            وبناء بيئة تعليمية متطورة.
        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a href="{{ route('register') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-8 rounded-2xl shadow-lg shadow-blue-500/20 transition duration-200 text-base">
                ابدأ رحلتك الإدارية الآن
            </a>
            <a href="#features"
                class="bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-850 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-800 font-bold py-3.5 px-8 rounded-2xl transition duration-200 text-base">
                اكتشف الخصائص
            </a>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
        <div
            class="grid grid-cols-1 sm:grid-cols-3 gap-6 bg-white dark:bg-gray-900 p-8 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
            <div class="text-center p-4 border-b sm:border-b-0 sm:border-l border-gray-100 dark:border-gray-800">
                <h3 class="text-4xl font-black text-blue-650 dark:text-blue-400 mb-2">+500</h3>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">طالب وطالبة مسجلين</p>
            </div>
            <div class="text-center p-4 border-b sm:border-b-0 sm:border-l border-gray-100 dark:border-gray-800">
                <h3 class="text-4xl font-black text-green-600 dark:text-green-400 mb-2">+40</h3>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">معلم خبير ومعينة</p>
            </div>
            <div class="text-center p-4">
                <h3 class="text-4xl font-black text-purple-600 dark:text-purple-400 mb-2">+25</h3>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">صف وقاعة دراسية ذكية</p>
            </div>
        </div>
    </section>

    <section id="features" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 mb-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">لماذا تختار منظومتنا الذكية؟</h2>
            <p class="mt-3 text-gray-500 dark:text-gray-400 text-sm">أدوات متطورة مصممة خصيصاً لتوفير الوقت والجهد على
                الكادر التعليمي</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-white dark:bg-gray-900 p-6 rounded-2xl border border-gray-100 dark:border-gray-800 hover:shadow-md transition">
                <div
                    class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-950 text-blue-500 flex items-center justify-center mb-4 font-bold">
                    [١]
                </div>
                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-2">إدارة الفصول بمرونة</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">تحكم كامل في أسماء الصفوف، وقدرتها
                    الاستيعابية القصوى لمنع الاكتظاظ وتوزيع الطلاب بالتساوي.</p>
            </div>

            <div
                class="bg-white dark:bg-gray-900 p-6 rounded-2xl border border-gray-100 dark:border-gray-800 hover:shadow-md transition">
                <div
                    class="w-10 h-10 rounded-xl bg-green-50 dark:bg-green-950 text-green-500 flex items-center justify-center mb-4 font-bold">
                    [٢]
                </div>
                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-2">تسكين الطلاب والمعلمين</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">ربط فوري بين الطالب والصف التابع له،
                    وتعيين المعلمين حسب تخصصاتهم الأكاديمية بنقرة واحدة.</p>
            </div>

            <div
                class="bg-white dark:bg-gray-900 p-6 rounded-2xl border border-gray-100 dark:border-gray-800 hover:shadow-md transition">
                <div
                    class="w-10 h-10 rounded-xl bg-purple-50 dark:bg-purple-950 text-purple-500 flex items-center justify-center mb-4 font-bold">
                    [٣]
                </div>
                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-2">واجهات لوحة تحكم عصرية</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">تصميم متكامل مبني ليدعم الوضع الداكن
                    بالكامل، مريح للعين، وسريع الاستجابة على الهواتف والشاشات الكبيرة.</p>
            </div>
        </div>
    </section>

    <footer
        class="border-t border-gray-100 dark:border-gray-900 py-8 text-center text-xs text-gray-400 dark:text-gray-600">
        <p>© 2026 نظام إدارة المدرسة الذكي. جميع الحقوق محفوظة للمهندسة أسماء السيبان.</p>
    </footer>

</body>

</html>