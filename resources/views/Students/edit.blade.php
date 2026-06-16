<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('تعديل ملف الطالب:') }} <span class="text-purple-600">{{ $student->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-750 p-6">

                <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">اسم
                            الطالب بالكامل</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">البريد
                            الإلكتروني</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition text-left"
                            dir="ltr">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">رقم
                                الهاتف</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone', $student->phone) }}"
                                required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition text-left"
                                dir="ltr">
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="birth_date"
                                class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">تاريخ
                                الميلاد</label>
                            <input type="date" name="birth_date" id="birth_date"
                                value="{{ old('birth_date', $student->birth_date ? \Carbon\Carbon::parse($student->birth_date)->format('Y-m-to') : '') }}"
                                required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition text-right">
                            @error('birth_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="classroom_id"
                            class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">نقل إلى صف دراسي
                            آخر</label>
                        <select name="classroom_id" id="classroom_id" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 text-sm transition">
                            @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" class="dark:bg-gray-800"
                                {{ old('classroom_id', $student->classroom_id) == $classroom->id ? 'selected' : '' }}>
                                {{ $classroom->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('classroom_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div
                        class="flex items-center justify-end space-x-3 space-x-reverse pt-4 border-t border-gray-100 dark:border-gray-750">
                        <a href="{{ route('students.index') }}"
                            class="px-5 py-2.5 rounded-xl bg-gray-150 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-bold text-sm transition">
                            إلغاء
                        </a>
                        <button type="submit"
                            class="px-6 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-sm transition shadow-sm">
                            تحديث البيانات والنقل
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
