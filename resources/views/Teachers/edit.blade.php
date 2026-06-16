<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('تعديل بيانات المعلم:') }} <span class="text-blue-600">{{ $teacher->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-750 p-6">

                <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">اسم
                            المعلم</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $teacher->name) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm transition">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="specialization"
                            class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">التخصص
                            الأكاديمي</label>
                        <input type="text" name="specialization" id="specialization"
                            value="{{ old('specialization', $teacher->specialization) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm transition">
                        @error('specialization') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="classroom_id"
                            class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">تعديل الصف الدراسي
                            المعين له</label>
                        <select name="classroom_id" id="classroom_id"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-250 dark:border-gray-700 bg-transparent dark:text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm transition">
                            <option value="" class="dark:bg-gray-800">-- بدون صف حالياً --</option>
                            @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" class="dark:bg-gray-800"
                                {{ old('classroom_id', $teacher->classroom_id) == $classroom->id ? 'selected' : '' }}>
                                {{ $classroom->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('classroom_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div
                        class="flex items-center justify-end space-x-3 space-x-reverse pt-4 border-t border-gray-100 dark:border-gray-750">
                        <a href="{{ route('teachers.index') }}"
                            class="px-5 py-2.5 rounded-xl bg-gray-150 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-bold text-sm transition">
                            إلغاء التعديل
                        </a>
                        <button type="submit"
                            class="px-6 py-2.5 rounded-xl bg-yellow-550 bg-yellow-600 hover:bg-yellow-700 text-white font-bold text-sm transition shadow-sm">
                            تحديث البيانات
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
