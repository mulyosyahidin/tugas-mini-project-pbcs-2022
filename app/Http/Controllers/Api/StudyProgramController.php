<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Study_program;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study_programs = Study_program::with('faculty')->get();

        return response()->json([
            'success' => true,
            'data' => $study_programs
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
        $validator = Validator::make($request->all(), [
            'faculty_id' => 'required|numeric|exists:faculties,id',
            'name' => 'required|min:4|max:255',
            'code' => 'required|min:1|max:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $study_program = Study_program::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $study_program
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Study_program  $study_program
     * @return \Illuminate\Http\Response
     */
    public function show(Study_program $study_program)
    {
        $study_program->load('faculty');

        return response()->json([
            'success' => true,
            'data' => $study_program
        ]);
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
        $validator = Validator::make($request->all(), [
            'faculty_id' => 'required|numeric|exists:faculties,id',
            'name' => 'required|min:4|max:255',
            'code' => 'required|min:1|max:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $study_program->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $study_program
        ]);
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

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus program studi'
        ]);
    }
}
