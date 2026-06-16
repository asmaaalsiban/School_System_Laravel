<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\StoreStudentRequest;
use App\Http\Requests\API\V1\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // جلب الطلاب مع صفوفهم (Eager Loading) لمنع ثقل الاستعلامات
        $students = Student::with('classroom')->get();

        return view('students.index', compact('students'));
    }
    public function create()
    {
        // جلب الصفوف مع حساب عدد الطلاب الحاليين في كل صف لمعرفة المقاعد المتاحة
        $classrooms = Classroom::withCount('students')->get();

        return view('students.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
        Student::create($validated);
        // إعادة التوجيه لجدول الطلاب مع رسالة نجاح بنفسجية
        return redirect()->route('students.index')->with('success', 'تم تسجيل الطالب بنجاح وتسكينه في الصف.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classrooms = Classroom::all(); // لإتاحة خيارات النقل بين كافة الصفوف

        return view('students.edit', compact('student', 'classrooms'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        if (!$student) {
            return response()->json([
                "message" => "student not found",

            ], 404);
        }
        return response()->json([
            "message" => "Student retrieved successfull",
            "data" => new StudentResource($student)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);
        if (!$student) {
            return response()->json([
                "message" => "student not found",
            ], 404);
        }
        ;
        $validated = $request->validated();
        $student->update($validated);
        return redirect()->route('students.index')->with('success', "تم تحديث بيانات الطالب ({$student->name}) بنجاح.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', "تم حذف ملف الطالب ({$student->name}) من النظام بنجاح.");
    }
}