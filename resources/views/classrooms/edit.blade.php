<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('تعديل بيانات الصف الدراسي: ') }} <span class="text-blue-600">{{ $classroom->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">اسم الصف
                            الدراسي</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $classroom->name) }}"
                            class="w-full mt-1 p-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                            required>
                        @error('name')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="capacity" class="block text-sm font-medium text-gray-700 dark:text-gray-200">السعة
                            الاستيعابية</label>
                        <input type="number" name="capacity" id="capacity"
                            value="{{ old('capacity', $classroom->capacity) }}"
                            class="w-full mt-1 p-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                            required>
                        @error('capacity')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">الوصف (اختياري)</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full mt-1 p-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500">{{ old('description', $classroom->description) }}</textarea>
                        @error('description')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div
                        class="flex justify-end space-x-3 space-x-reverse pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('classrooms.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg text-sm transition duration-150">
                            إلغاء
                        </a>

                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-5 rounded-lg text-sm transition duration-150">
                            تحديث البيانات
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
