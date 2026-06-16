<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-black text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('إدارة شؤون المعلمين') }}
                </h2>
                <p class="text-xs text-gray-550 dark:text-gray-400 mt-1">عرض وتعديل بيانات الكادر التدريسي وتخصصاتهم
                    الأكاديمية</p>
            </div>
            <a href="{{ route('teachers.create') }}"
                class="bg-blue-650 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-xl text-sm shadow-sm shadow-blue-500/10 transition">
                + إضافة معلم جديد
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div
                class="mb-6 p-4 bg-green-50 dark:bg-green-950/40 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-xl text-sm font-semibold flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                {{ session('success') }}
            </div>
            @endif

            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl border border-gray-100 dark:border-gray-750">
                <div class="overflow-x-auto">
                    <table class="w-full text-right border-collapse">
                        <thead>
                            <tr
                                class="bg-gray-50/70 dark:bg-gray-900/40 border-b border-gray-100 dark:border-gray-750 text-gray-450 dark:text-gray-400 text-xs font-bold uppercase tracking-wider">
                                <th class="p-4">الاسم</th>
                                <th class="p-4">البريد الإلكتروني</th>
                                <th class="p-4">رقم الهاتف</th>
                                <th class="p-4">التخصص</th>
                                <th class="p-4">الصف الحالي</th>
                                <th class="p-4 text-center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody
                            class="divide-y divide-gray-100 dark:divide-gray-750 text-sm text-gray-700 dark:text-gray-300">
                            @forelse($teachers as $teacher)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-900/20 transition">
                                <td class="p-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $teacher->name }}
                                </td>

                                <td class="p-4 text-gray-500 dark:text-gray-400 font-medium text-left" dir="ltr">
                                    {{ $teacher->email }}
                                </td>

                                <td class="p-4 text-gray-600 dark:text-gray-400">
                                    {{ $teacher->phone ?? '—' }}
                                </td>

                                <td class="p-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-bold bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 rounded-lg">
                                        {{ $teacher->specialization ?? 'غير محدد' }}
                                    </span>
                                </td>

                                <td class="p-4 text-gray-500 dark:text-gray-400">
                                    {{ $teacher->classroom?->name ?? 'غير معين لصف' }}
                                </td>

                                <td class="p-4 flex items-center justify-center space-x-2 space-x-reverse">
                                    <a href="{{ route('teachers.edit', $teacher->id) }}"
                                        class="px-3 py-1.5 text-xs bg-yellow-500/10 hover:bg-yellow-500/20 text-yellow-600 dark:text-yellow-400 rounded-lg font-bold transition">
                                        تعديل
                                    </a>
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا المعلم؟');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 text-xs bg-red-550/10 hover:bg-red-550/20 text-red-600 dark:text-red-400 rounded-lg font-bold transition">
                                            حذف
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="p-12 text-center text-gray-400 dark:text-gray-500">
                                    لا يوجد معلمون مضافون في النظام حالياً.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>