<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('تسجيل طالب جديد في المنظومة') }}
            </h2>
            <a href="{{ route('students.index') }}"
                class="text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                ← العودة للقائمة
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-750 p-6">

                <form action="{{ route('students.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">اسم
                            الطالب بالكامل <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">البريد
                            الإلكتروني <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            placeholder="example@school.com"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition text-left"
                            dir="ltr">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">رقم
                                الهاتف <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                                placeholder="09xxxxxxxx"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition text-left"
                                dir="ltr">
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="birth_date"
                                class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">تاريخ الميلاد
                                <span class="text-red-500">*</span></label>
                            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"
                                required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition text-right">
                            @error('birth_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="classroom_id"
                            class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">تسكين في صف دراسي
                            <span class="text-red-500">*</span></label>
                        <select name="classroom_id" id="classroom_id" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition">
                            <option value="" class="dark:bg-gray-800">-- اختر صفاً دراسياً لتسكين الطالب --</option>
                            @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" class="dark:bg-gray-800"
                                {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                {{ $classroom->name }} (المقاعد المتاحة:
                                {{ $classroom->capacity - $classroom->students_count }})
                            </option>
                            @endforeach
                        </select>
                        @error('classroom_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div
                        class="flex items-center justify-end space-x-3 space-x-reverse pt-4 border-t border-gray-100 dark:border-gray-750">
                        <button type="button" onclick="window.history.back()"
                            class="px-5 py-2.5 rounded-xl bg-gray-150 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-bold text-sm transition">
                            إلغاء
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-sm transition shadow-sm">
                            تسجيل الطالب
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>