<?php

namespace App\Http\Controllers\API\V1;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\API\V1\StoreClassRequest;
// use App\Http\Requests\API\V1\UpdateClassRequest;
// use App\Http\Resources\ClassRoomResource;
// use App\Models\Classroom;

// class ClassRoomController extends Controller
// {
/**
 * Display a listing of the resource.
 */
// public function index()
// {
//     $classrooms = Classroom::all();
//    return view('classrooms.index', compact('classrooms'));
// }
/**
 * Store a newly created resource in storage.
 */
// public function store(StoreClassRequest $request)
// {
//     $validated = $request->validated();
//     $classroom = Classroom::create($validated);
//     return response()->json([
//         "message" => "Classroom created successfully",
//         "data" => new ClassRoomResource($classroom)
//     ], 201);
// }

/**
 * Display the specified resource.
 */
// public function show(string $id)
// {
//     $classroom = Classroom::find($id);
//     if (!$classroom) {
//         return response()->json([
//             "message" => "Classroom not found"
//         ], 404);
//     }
//     return response()->json([
//         "message" => "Classroom retrieved successfully",
//         "data" => new ClassRoomResource($classroom)
//     ]);
// }
/**
 * Update the specified resource in storage.
 */
// public function update(UpdateClassRequest $request, string $id)
// {
//     $classroom = Classroom::find($id);
//     if (!$classroom) {
//         return response()->json([
//             "message" => "Classroom not found"
//         ], 404);
//     }
//     $validated = $request->validated();
//     $classroom->update($validated);
//     return response()->json([
//         "message" => "Classroom updated successfully",
//         "data" => new ClassRoomResource($classroom)
//     ]);
// }

/**
 * Remove the specified resource from storage.
 */
//     public function destroy(string $id)
//     {
//         $classroom = Classroom::find($id);
//         if (!$classroom) {
//             return response()->json([
//                 "message" => "Classroom not found"
//             ], 404);
//         }
//         $classroom->delete();
//         return response()->json([
//             "message" => "Classroom deleted successfully"
//         ]);
//     }
// }/////////////////////////////////////////////////////


// namespace App\Http\Controllers\API\V1; // يمكنك نقل الملف إلى مجلد Controllers الرئيسي إذا أردت فصله عن الـ API

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\StoreClassRequest;
use App\Http\Requests\API\V1\UpdateClassRequest;
use App\Models\Classroom;

class ClassRoomController extends Controller
{
    /**
     * 1. عرض جدول جميع الصفوف الدراسية
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {

        return view('classrooms.create');
    }

    public function store(StoreClassRequest $request)
    {
        // التحقق من المدخلات
        $request->validated();

        // إنشاء الصف في قاعدة البيانات
        Classroom::create([
            'name' => $request->name,
            "description" => $request->description,
            "capacity"=>$request->capacity
        ]);

        // إعادة التوجيه إلى صفحة عرض كل الصفوف مع رسالة نجاح
        return redirect()->route('classrooms.index')->with('success', 'تم إضافة الصف بنجاح');
    }

    /**
     * 4. عرض تفاصيل صف معين (مع الطلاب والمعلمين التابعين له)
     */
    public function show(string $id)
    {
        // شحن العلاقات (Eager Loading) لعرض الطلاب والمعلمين حسب شروط المشروع
        $classroom = Classroom::with(['students', 'teachers'])->findOrFail($id);

        return view('classrooms.show', compact('classroom'));
    }

    /**
     * 5. عرض صفحة فورم تعديل بيانات صف موجود مسبقاً (تابع جديد للـ Blade)
     */
    public function edit(string $id)
    {
        $classroom = Classroom::findOrFail($id);

        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * 6. استقبال البيانات المعدلة وتحديثها في القاعدة
     */
    public function update(UpdateClassRequest $request, string $id)
    {
        $classroom = Classroom::findOrFail($id);
        $validated = $request->validated();

        $classroom->update($validated);

        // التوجيه بعد التعديل
        return redirect()->route('classrooms.index')->with('success', 'تم تحديث بيانات الصف بنجاح.');
    }

    /**
     * 7. حذف الصف من النظام
     */
    public function destroy($id)
    {
        // جلب الصف أو إرجاع 404 إذا لم يكن موجوداً
        $classroom = Classroom::findOrFail($id);

        $classroomName = $classroom->name;

        // حذف الصف من قاعدة البيانات
        $classroom->delete();

        // العودة إلى الصفحة السابقة (أو صفحة الـ index) مع رسالة نجاح
        return redirect()->back()->with('success', "تم حذف الصف الدراسى ({$classroomName}) بنجاح.");
    }
}
