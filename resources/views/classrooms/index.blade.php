<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('إدارة الصفوف الدراسية') }}
            </h2>
            <a href="{{ route('classrooms.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-sm">
                + إضافة صف جديد
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-right border-collapse">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                            <th class="p-3 border-b">اسم الصف</th>
                            <th class="p-3 border-b">السعة الاستيعابية</th>
                            <th class="p-3 border-b">الوصف</th>
                            <th class="p-3 border-b text-center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classrooms as $classroom)
                        <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-900 dark:text-gray-100">
                            <td class="p-3">
                                <a href="{{ route('classrooms.show', $classroom->id) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $classroom->name }}
                                </a>
                            </td>
                            <td class="p-3">{{ $classroom->capacity }}</td>

                            <td class="p-3">
                                {{ (trim($classroom->description) != '') ? $classroom->description : 'لا يوجد' }}
                            </td>

                            <td class="p-3 flex justify-center space-x-2 space-x-reverse">
                                <a href="{{ route('classrooms.edit', $classroom->id) }}"
                                    class="text-yellow-600 hover:text-yellow-700">تعديل</a>

                                <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST"
                                    onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>