<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('إضافة صف دراسي جديد') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('classrooms.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700 dark:text-gray-200">اسم الصف الدراسي</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full mt-1 p-2 rounded border dark:bg-gray-700 dark:text-white" required>
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-200">القدرة الاستيعابية (العدد الافتراضي
                            30)</label>
                        <input type="number" name="capacity" value="{{ old('capacity', 30) }}" min="1"
                            class="w-full mt-1 p-2 rounded border dark:bg-gray-700 dark:text-white" required>
                        @error('capacity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-200">وصف الصف (اختياري)</label>
                        <textarea name="description" rows="3"
                            class="w-full mt-1 p-2 rounded border dark:bg-gray-700 dark:text-white">{{ old('description') }}</textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">
                            حفظ الصف الجديد
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>