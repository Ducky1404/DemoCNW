<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Classroom;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('classroom')->paginate(5);

        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();

        return view('schedules.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'course_name' => 'required|string|max:255',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'time_slot' => 'required|in:08:00 - 10:00,10:00 - 12:00,13:00 - 15:00,15:00 - 17:00,18:00 - 20:00',
        ]);

        $schedule = Schedule::create($validateData);

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schedules = Schedule::findOrFail($id);

        return view('schedules.detail', compact('schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedules = Schedule::findOrFail($id);
        $classrooms = Classroom::all();
        return view('schedules.edit', compact('schedules', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'course_name' => 'required|string|max:255',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'time_slot' => 'required|in:08:00 - 10:00,10:00 - 12:00,13:00 - 15:00,15:00 - 17:00,18:00 - 20:00',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($validateData);

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule deleted successfully.');
    }
}
