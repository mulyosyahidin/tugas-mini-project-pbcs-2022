<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::orderBy('code', 'ASC')->get();

        return response()
            ->json([
                'success' => true,
                'data' => $faculties
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
            'name' => 'required|min:4|max:255',
            'code' => 'required|min:1|max:1|unique:faculties,code'
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422);
        }

        $faculty = Faculty::create($request->all());

        return response()
            ->json([
                'success' => true,
                'data' => $faculty
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        return response()
            ->json([
                'success' => true,
                'data' => $faculty
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|max:255',
            'code' => 'required|min:1|max:1|unique:faculties,code,' . $faculty->id
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422);
        }

        $faculty->update($request->all());

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil mengubah data fakultas'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus data fakultas'
            ]);
    }
}
