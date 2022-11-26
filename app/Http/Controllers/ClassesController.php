<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student_classes;
use App\Models\Teacher_classes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $classes = DB::table('teacher_classes')
        ->join('users','users.id' ,'=', 'teacher_classes.user_id')
        ->select('class_name', 'users.name as teacher', 'teacher_classes.id')
        ->get();
        return view('classes.classes',[
            'classes' => $classes
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClass(Request $request)
    { 
        $users = DB::table('users')
        ->select('name', 'id')
        ->whereRaw("role = 'teacher'")
        ->get();
        return view('classes.addclass',[
            'teachers' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Request $request): View
    {
        $teacher_classes_id = $request->session()->get('teacher_classes_id');
        $class_name = $request->session()->get('class_name');
        $class_id = DB::table('teacher_classes')
        ->select('teacher_classes.id', 'teacher_classes.class_name')
        ->join('users','users.id' ,'=', 'teacher_classes.user_id')
        ->whereRaw('teacher_classes.id = ?',[$teacher_classes_id])
        ->get();

        $students = DB::table('users')
        ->select('users.id', 'users.name')
        ->distinct()
        ->leftJoin('student_classes','student_classes.user_id' ,'=', 'users.id')
        ->whereRaw("role = 'student' and student_classes.user_id is null")
        ->get();
        
        return view('classes.add',[
            'class_name' => $class_name,
            'teacher_classes_id' => $teacher_classes_id,
            'class' => $class_id,
            'students' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_classes = new Student_classes($request->all());
        $student_classes->save();
        $classes = DB::table('teacher_classes')
        ->join('users','users.id' ,'=', 'teacher_classes.user_id')
        ->select('class_name', 'users.name as teacher', 'teacher_classes.id')
        ->get();
        return view('classes.classes',[
            'classes' => $classes
        ]);

    }
    public function storeClass(Request $request)
    {
        $Teacher_classes = new Teacher_classes($request->all());
        $Teacher_classes->save();
        $classes = DB::table('teacher_classes')
        ->join('users','users.id' ,'=', 'teacher_classes.user_id')
        ->select('class_name', 'users.name as teacher', 'teacher_classes.id')
        ->get();
        return view('classes.classes',[
            'classes' => $classes
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @param  Teacher_classes $class
     * @return View
     */
    public function edit(Request $request, Teacher_classes $class): View
    {
        $classes = DB::table('teacher_classes')
        ->join('users','users.id' ,'=', 'teacher_classes.user_id')
        ->select('class_name', 'users.name as teacher', 'teacher_classes.id')
        ->whereRaw('teacher_classes.id = ?',[$class->id])
        ->get();
        $request->session()->put('teacher_classes_id', $class->id);
        $request->session()->put('class_name', $class->class_name);

        $users = DB::table('users')
        ->select('name', 'id')
        ->whereRaw("role = 'teacher'")
        ->get();

        $student_classes = DB::table('student_classes')
        ->select('student_classes.id', 'users.name')
        ->join('teacher_classes','teacher_classes_id' ,'=', 'teacher_classes.id')
        ->join('users','users.id' ,'=', 'student_classes.user_id')
        ->whereRaw('teacher_classes_id = ?',[$class->id])
        ->get();

        return view('classes.edit',[
            'classes' => $classes,
            'teachers' => $users,
            'students' => $student_classes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Teacher_classes $teacher_classes
     */
    public function update(Request $request, Teacher_classes $class)
    {
        $class->fill($request->all());
        $class->save();

        $classes = DB::table('teacher_classes')
        ->join('users','users.id' ,'=', 'teacher_classes.user_id')
        ->select('class_name', 'users.name as teacher', 'teacher_classes.id')
        ->get();
        return view('classes.classes',[
            'classes' => $classes
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Student_classes::find($id);
        $flight->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
