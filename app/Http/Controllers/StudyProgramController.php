<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\Study_program;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study_programs = Study_program::paginate();

        return view('study-programs.index', compact('study_programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();

        return view('study-programs.create', compact('faculties'));
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
            'faculty_id' => 'required|numeric|exists:faculties,id',
            'name' => 'required|min:4|max:255',
            'code' => 'required|min:1|max:1',
        ]);

        Study_program::create($request->all());

        return redirect()->route('study-programs.index')
            ->withSuccess('Berhasil menambahkan program studi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Study_program  $study_program
     * @return \Illuminate\Http\Response
     */
    public function edit(Study_program $study_program)
    {
        $faculties = Faculty::all();

        return view('study-programs.edit', compact('study_program', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study_program  $study_program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study_program $study_program)
    {
        $request->validate([
            'faculty_id' => 'required|numeric|exists:faculties,id',
            'name' => 'required|min:4|max:255',
            'code' => 'required|min:1|max:1',
        ]);

        $study_program->update($request->all());

        return redirect()->route('study-programs.index')
            ->withSuccess('Berhasil memperbarui data program studi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study_program  $study_program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study_program $study_program)
    {
        $study_program->delete();

        return redirect()->route('study-programs.index')
            ->withSuccess('Berhasil menghapus program studi');
    }
}
