<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::paginate(5);

        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'room_number' => 'required|max:50',
            'capacity' => 'required|integer',
            'building' => 'required|max:50',
        ]);

        $classrooms = Classroom::create($validateData);

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classrooms = Classroom::findOrFail($id);

        return view('classrooms.detail', compact('classrooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classroom = Classroom::findOrFail($id);

        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'room_number' => 'required|max:50',
            'capacity' => 'required|integer',
            'building' => 'required|max:50',
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update($validateData);

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom deleted successfully.');
    }
}
