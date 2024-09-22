<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('index', ['appointments'=> $appointments]);
    }

  

    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
            // Validate the request
    $request->validate([
        'patient_name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required|date_format:H:i',
    ]);

    // Get the currently authenticated user's ID
    $userId = auth()->id(); // This will be null if the user is not logged in

    if (!$userId) {
        return response()->json(['error' => 'User not authenticated.'], 401);
    }

    // Create the appointment with the user ID
    Appointment::create([
        'user_id' => $userId,
        'patient_name' => $request->input('patient_name'),
        'title' => $request->input('title'),
        'date' => $request->input('date'),
        'time' => $request->input('time'),
    ]);

        return redirect(route('appointments.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail( $id );

        return view('show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail( $id );
        return view(route('appointments.edit'), ['id' => $appointment->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        $userId = auth()->id(); // This will be null if the user is not logged in

        if (!$userId) {
            return response()->json(['error' => 'User not authenticated.'], 401);
        }
        
        $appointment->update([
            'user_id' => $userId,
            'patient_name' => $request->input('patient_name'),
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);
        

        return redirect(route('appointments.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect(route('appointments.index'));
    }
}
