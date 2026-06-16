<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\StoreTeacherRequest;
use App\Http\Requests\API\V1\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Classroom;
use App\Models\Teacher;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // جلب المعلمين مع علاقة الصف (Eager Loading) لتحسين الأداء ومنع مشكلة الـ N+1
        $teachers = Teacher::with('classroom')->get();

        return view('teachers.index', compact('teachers'));
    }


    public function create()
    {
        // جلب كافة الصفوف لكي نختار منها داخل الـ <select> في صفحة الـ Blade
        $classrooms = Classroom::all();

        return view('teachers.create', compact('classrooms'));
    }
    public function store(StoreTeacherRequest $request)
    {
        // 1. التحقق من صحة البيانات المدخلة
        $validated = $request->validated();
        $teacher=Teacher::create($validated);
        if ($request->wantsJson()) {
            // إذا كان الطلب قادم من بوست مان، ارجع له بيانات جيسون فوراً
            return response()->json([
                'message' => 'تم الحفظ بنجاح (JSON)',
                'data' => $teacher
            ], 201);
        }

        return redirect()->route('teachers.index')->with('success', 'تم إضافة المعلم بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json([
                "message" => "Teacher not found"
            ], 404);
        }
        return response()->json([
            "message" => "Teacher retrieved successfully",
            "data" => new TeacherResource($teacher)
        ], 200);
    }
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $classrooms = Classroom::all();
        
        return view('teachers.edit', compact('teacher', 'classrooms'));
    }


    public function update(UpdateTeacherRequest $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);
        if (!$teacher) {
            return response()->json([
                "message" => "Teacher not found"
            ], 404);
        }
        $validated = $request->validated();
        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', "تم تحديث بيانات المعلم ({$teacher->name}) بنجاح.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacherName = $teacher->name;

        $teacher->delete();

        return redirect()->back()->with('success', "تم حذف المعلم ({$teacherName}) من النظام.");
    }
}
