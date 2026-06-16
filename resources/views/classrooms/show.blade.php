<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-black text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('تفاصيل الصف الدراسي:') }} <span
                        class="text-blue-600 dark:text-blue-400">{{ $classroom->name }}</span>
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">عرض وإدارة المعلمين والطلاب التابعين لهذا الصف
                </p>
            </div>

            <div class="flex items-center space-x-2 space-x-reverse">
                <a href="{{ route('classrooms.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-bold py-2 px-4 rounded-xl text-sm transition">
                    ← العودة للمجموعة
                </a>
                <a href="{{ route('classrooms.edit', $classroom->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-xl text-sm shadow-sm transition">
                    تعديل البيانات
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div
                    class="lg:col-span-1 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400 dark:text-gray-500">بطاقة
                            التعريف</span>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mt-1 mb-3">{{ $classroom->name }}
                        </h3>

                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            <span class="font-bold text-gray-700 dark:text-gray-300 block mb-1">الوصف:</span>
                            {{ (trim($classroom->description) != '') ? $classroom->description : 'لا يوجد وصف مضاف لهذا الصف الدراسي حالياً.' }}
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700 text-xs text-gray-400">
                        تاريخ الإنشاء: {{ $classroom->created_at?->format('Y-m-d') ?? 'غير محدد' }}
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:col-span-2 gap-6">

                    <div
                        class="bg-gradient-to-br from-purple-500/10 to-purple-600/5 dark:from-purple-500/10 dark:to-transparent p-6 rounded-2xl border border-purple-500/20 shadow-sm flex flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-medium text-purple-600 dark:text-purple-400 mb-1">القدرة
                                    الاستيعابية</p>
                                <h4 class="text-3xl font-black text-gray-800 dark:text-gray-100">
                                    {{ $classroom->capacity }}</h4>
                            </div>
                            <div class="p-3 bg-purple-500 text-white rounded-xl shadow-md shadow-purple-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-purple-500/80 mt-4">الحد الأقصى المسموح به من الطلاب داخل القاعة.</p>
                    </div>

                    <div
                        class="bg-gradient-to-br from-blue-500/10 to-green-500/5 dark:from-blue-500/10 dark:to-transparent p-6 rounded-2xl border border-blue-500/20 shadow-sm flex flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-medium text-blue-600 dark:text-blue-400 mb-1">المعلمين / الطلاب
                                </p>
                                <h4 class="text-3xl font-black text-gray-800 dark:text-gray-100">
                                    <span class="text-blue-600">{{ $classroom->teachers->count() }}</span>
                                    <span class="text-gray-400 text-xl font-normal">/</span>
                                    <span class="text-green-600">{{ $classroom->students->count() }}</span>
                                </h4>
                            </div>
                            <div class="p-3 bg-blue-500 text-white rounded-xl shadow-md shadow-blue-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            @php
                            $percent = $classroom->capacity > 0 ? min(($classroom->students->count() /
                            $classroom->capacity) * 100, 100) : 0;
                            @endphp
                            <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded-full overflow-hidden">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ $percent }}%"></div>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-1">نسبة إشغال المقاعد الحالية: {{ round($percent) }}%
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition duration-300 hover:shadow-md">
                    <div
                        class="flex items-center space-x-2 space-x-reverse mb-5 border-b pb-4 border-gray-100 dark:border-gray-700">
                        <span class="p-2 bg-blue-50 dark:bg-blue-950 text-blue-500 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M14 4h6m0 0v6m0-6L14 10" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">المعلمون في هذا الصف</h3>
                    </div>

                    <ul class="space-y-2">
                        @forelse($classroom->teachers as $teacher)
                        <li
                            class="py-3 px-4 flex justify-between items-center text-gray-700 dark:text-gray-300 bg-gray-50/50 dark:bg-gray-900/30 border border-gray-100/50 dark:border-gray-700/50 rounded-xl hover:bg-blue-50/40 dark:hover:bg-blue-950/20 transition">
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold text-sm">
                                    {{ mb_substr($teacher->name, 0, 1) }}
                                </div>
                                <span class="font-semibold text-sm">{{ $teacher->name }}</span>
                            </div>
                            @if($teacher->specialization)
                            <span
                                class="text-xs bg-blue-100/70 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 px-3 py-1 rounded-lg font-bold tracking-wide">
                                {{ $teacher->specialization }}
                            </span>
                            @endif
                        </li>
                        @empty
                        <div
                            class="text-center py-8 text-gray-400 dark:text-gray-500 bg-gray-50/50 dark:bg-gray-900/20 rounded-xl border-2 border-dashed border-gray-100 dark:border-gray-700">
                            <p class="text-xs">لا يوجد معلمين معينين لهذا الصف حالياً.</p>
                        </div>
                        @endforelse
                    </ul>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition duration-300 hover:shadow-md">
                    <div
                        class="flex items-center space-x-2 space-x-reverse mb-5 border-b pb-4 border-gray-100 dark:border-gray-700">
                        <span class="p-2 bg-green-50 dark:bg-green-950 text-green-500 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">الطلاب المسجلون</h3>
                    </div>

                    <ul class="space-y-2">
                        @forelse($classroom->students as $student)
                        <li
                            class="py-3 px-4 flex items-center justify-between text-gray-700 dark:text-gray-300 bg-gray-50/50 dark:bg-gray-900/30 border border-gray-100/50 dark:border-gray-700/50 rounded-xl hover:bg-green-50/40 dark:hover:bg-green-950/20 transition">
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <div
                                    class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-400 flex items-center justify-center font-bold text-sm">
                                    {{ mb_substr($student->name, 0, 1) }}
                                </div>
                                <span class="font-semibold text-sm">{{ $student->name }}</span>
                            </div>
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        </li>
                        @empty
                        <div
                            class="text-center py-8 text-gray-400 dark:text-gray-500 bg-gray-50/50 dark:bg-gray-900/20 rounded-xl border-2 border-dashed border-gray-100 dark:border-gray-700">
                            <p class="text-xs">لا يوجد طلاب في هذا الصف حالياً.</p>
                        </div>
                        @endforelse
                    </ul>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>