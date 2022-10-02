<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Study_program;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with(['study_program' => function ($query) {
            $query->orderBy('code', 'ASC');
        }])->orderBy('npm', 'ASC')->paginate();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study_programs = Study_program::all();

        return view('students.create', compact('study_programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'study_program_id' => 'required|numeric|exists:study_programs,id',
            'name' => 'required|min:4|max:255',
            'npm' => 'required|min:9|max:9',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->withSuccess('Berhasil menambahkan mahasiswa');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $study_programs = Study_program::all();

        return view('students.edit', compact('student', 'study_programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'study_program_id' => 'required|numeric|exists:study_programs,id',
            'name' => 'required|min:4|max:255',
            'npm' => 'required|min:9|max:9',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->withSuccess('Berhasil mengubah mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->withSuccess('Berhasil menghapus mahasiswa');
    }
}
