<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grades;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $grades = DB::table('grades') 
        ->join('teacher_classes','teacher_classes.id' ,'=', 'grades.teacher_classes_id')
        ->join('users','users.id' ,'=', 'grades.user_id')
        ->join('school_subjects','school_subjects.id' ,'=', 'grades.school_subject_id')
        ->select('school_subjects.name as school_subject', 'users.name as student', 'teacher_classes.class_name','grades.id')
        ->groupBy('school_subject', 'student')
        ->orderBy('grades.teacher_classes_id')
        ->get();

        return view('grades.grades',[
            'grades'=> $grades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        $subject = $request->session()->get('subject');
        $teacher = $request->session()->get('teacher');
        $student = DB::table('grades') 
        ->join('teacher_classes','teacher_classes.id' ,'=', 'grades.teacher_classes_id')
        ->join('users','users.id' ,'=', 'grades.user_id')
        ->join('school_subjects','school_subjects.id' ,'=', 'grades.school_subject_id')
        ->select('school_subjects.name as school_subject', 'users.name as student', 'teacher_classes.class_name', 'grades.user_id', 'grades.teacher_classes_id', 'grades.school_subject_id')
        ->whereRaw('grades.user_id = ? and grades.teacher_classes_id = ? and grades.school_subject_id = ?', [$user, $teacher, $subject])
        ->get();
        return view('grades.add',[
            'student'=> $student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 
     */
    public function store(Request $request)
    {
        $grade = new Grades($request->all());
        $grade->save();

        $grades = DB::table('grades') 
        ->join('teacher_classes','teacher_classes.id' ,'=', 'grades.teacher_classes_id')
        ->join('users','users.id' ,'=', 'grades.user_id')
        ->join('school_subjects','school_subjects.id' ,'=', 'grades.school_subject_id')
        ->select('school_subjects.name as school_subject', 'users.name as student', 'teacher_classes.class_name','grades.id')
        ->groupBy('school_subject', 'student')
        ->orderBy('grades.teacher_classes_id')
        ->get();

        return view('grades.grades',[
            'grades'=> $grades
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Grades $grades
     * @return View
     */
    public function show(Request $request, Grades $grades): View
    {
        $request->session()->put('user', $grades->user_id);
        $request->session()->put('subject', $grades->school_subject_id);
        $request->session()->put('teacher', $grades->teacher_classes_id);
        $grades_student = DB::table('grades') 
        ->join('users','users.id' ,'=', 'grades.user_id')
        ->join('school_subjects','school_subjects.id' ,'=', 'grades.school_subject_id')
        ->selectRaw('school_subjects.name as school_subject, users.name as student, note, grades.id')
        ->whereRaw('grades.user_id = ? and grades.school_subject_id = ?', [$grades->user_id, $grades->school_subject_id])
        ->get();
        

        return view('grades.show', [
            'grades'=> $grades_student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Grades $grade
     * @return View
     */
    public function edit(Grades $grade): View
    {
        $grade_student = DB::table('grades') 
        ->join('teacher_classes','teacher_classes.id' ,'=', 'grades.teacher_classes_id')
        ->join('users','users.id' ,'=', 'grades.user_id')
        ->join('school_subjects','school_subjects.id' ,'=', 'grades.school_subject_id')
        ->selectRaw('grades.*, school_subjects.name as school_subject, users.name as student, note, teacher_classes.class_name as classes')
        ->whereRaw('grades.id = ?',[$grade->id])
        ->get();

        return view('grades.edit',[
            'grade'=> $grade_student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     ** @param  Request  $request
     * @param  Grades $grade
     */
    public function update(Request $request, Grades $grade)
    {
        //dd($request->all());
        $grade->fill($request->all());
        $grade->save();

        $grades = DB::table('grades') 
        ->join('teacher_classes','teacher_classes.id' ,'=', 'grades.teacher_classes_id')
        ->join('users','users.id' ,'=', 'grades.user_id')
        ->join('school_subjects','school_subjects.id' ,'=', 'grades.school_subject_id')
        ->select('school_subjects.name as school_subject', 'users.name as student', 'teacher_classes.class_name','grades.id')
        ->groupBy('school_subject', 'student')
        ->orderBy('grades.teacher_classes_id')
        ->get();

        return view('grades.grades',[
            'grades'=> $grades
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
        //
    }
}
