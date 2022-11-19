<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grades;
use App\Models\Student_classes;
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
        ->groupBy('school_subject', 'student', 'teacher_classes.class_name', 'grades.id')
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
    public function create()
    {
        return view('grades.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Grades $grades
     * @return View
     */
    public function show(Grades $grades): View
    {
        return view('grades.show', [
            'grades'=> $grades
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('grades.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
