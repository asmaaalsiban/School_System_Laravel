<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4 space-x-reverse">

            <h2 class="font-black text-xl text-gray-800 dark:text-gray-250 leading-tight">
                {{ __('لوحة التحكم الرئيسية') }}
            </h2>

            <a href="/"
                class="flex items-center space-x-1 space-x-reverse text-xs font-bold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 bg-blue-50 dark:bg-blue-950/40 px-3 py-1.5 rounded-xl transition shadow-sm">
                <div>الانتقال للصفحة الرئيسية</div>
                <span>←</span>
            </a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl p-6 border border-gray-100 dark:border-gray-750">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">
                            مرحباً بك مجدداً، {{ Auth::user()->name }}! 👋
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            يمكنك الآن البدء في إدارة النظام الأكاديمي، وتوزيع الفصول الدراسية وتسكين الطلاب والمعلمين.
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-750 flex flex-col justify-between transition duration-300 hover:shadow-md group">
                    <div>
                        <div
                            class="w-12 h-12 bg-blue-50 dark:bg-blue-950/50 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center mb-4 transition group-hover:scale-105">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M14 4h6m0 0v6m0-6L14 10" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-1">إدارة الصفوف الدراسية</h4>
                        <p class="text-xs text-gray-400 dark:text-gray-500 leading-relaxed mb-6">
                            قم بإنشاء الفصول، تحديد طاقاتها الاستيعابية، ومتابعة المعلمين والطلاب المنضمين لكل قاعة.
                        </p>
                    </div>

                    <a href="{{ route('classrooms.index') }}"
                        class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-xl text-sm transition shadow-sm shadow-blue-500/10 flex items-center justify-center gap-2">
                        <span>الانتقال إلى الصفوف</span>
                        <svg class="w-4 h-4 transform rotate-180 group-hover:translate-x-[-4px] transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-750 flex flex-col justify-between transition duration-300 hover:shadow-md group">
                    <div>
                        <div
                            class="w-12 h-12 bg-green-50 dark:bg-green-950/50 text-green-600 dark:text-green-400 rounded-xl flex items-center justify-center mb-4 transition group-hover:scale-105">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-1">إدارة شؤون المعلمين</h4>
                        <p class="text-xs text-gray-400 dark:text-gray-500 leading-relaxed mb-6">
                            قم بإضافة طاقم التدريس وتحديد التخصصات الأكاديمية، وربط كل معلم بالصف الدراسي المسؤول عنه.
                        </p>
                    </div>

                    <a href="{{ route('teachers.index') }}"
                        class="w-full text-center bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-4 rounded-xl text-sm transition shadow-sm shadow-green-500/10 flex items-center justify-center gap-2">
                        <span>الانتقال إلى المعلمين</span>
                        <svg class="w-4 h-4 transform rotate-180 group-hover:translate-x-[-4px] transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-750 flex flex-col justify-between transition duration-300 hover:shadow-md group">
                    <div>
                        <div
                            class="w-12 h-12 bg-purple-50 dark:bg-purple-950/50 text-purple-600 dark:text-purple-400 rounded-xl flex items-center justify-center mb-4 transition group-hover:scale-105">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-1">شؤون الطلاب المسجلين</h4>
                        <p class="text-xs text-gray-400 dark:text-gray-500 leading-relaxed mb-6">
                            قم بتسجيل ملفات الطلاب الجدد وتسكينهم في فصولهم الدراسية ومتابعة القيد الأكاديمي والبيانات
                            الشخصية.
                        </p>
                    </div>

                    <a href="{{ route('students.index') }}"
                        class="w-full text-center bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-4 rounded-xl text-sm transition shadow-sm shadow-purple-500/10 flex items-center justify-center gap-2">
                        <span>الانتقال إلى الطلاب</span>
                        <svg class="w-4 h-4 transform rotate-180 group-hover:translate-x-[-4px] transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>