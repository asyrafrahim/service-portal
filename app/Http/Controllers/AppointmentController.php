<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index')->with(compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // get current logged in user
         $user = Auth::user();
        
         if ($this->authorize('create', Appointment::class)) {
             echo '';
         } else {
             echo 'Not Authorized';
         }
        
        $services = Service::all();
        return view('appointments.create')->with(compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = auth()->user();
        $user->appointment()->create($request->all());

        // $appointment = Appointment::create($input);

        // dd($request);

        return redirect('/appointments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show')->with(compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $this->authorize('update', $appointment);
        $services = Service::all();
        // $appointments = Appointment::all();
        return view('appointments.edit')->with(compact('appointment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        
        // get current logged in user
        $user = Auth::user();
            
        // load appointment
        // $appointment = Appointment::find(1);
        
        if ($this->authorize('update', $appointment)) {
            echo "";
        } else {
            echo 'Not Authorized.';
        }
        
        $appointment->update($request->only('service_id', 'appointment_time', 'address'));
        return redirect()
            ->route('appointments.index')
            ->with(['alert-type' => 'alert-success','alert'=> 'Appointment updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        // get current logged in user
        $user = Auth::user();
            
        // load appointment
        // $appointment = Appointment::find(1);
        
        if ($this->authorize('delete', $appointment)) {
            echo "";
        } else {
            echo 'Not Authorized.';
        }
        
        $appointment->delete();

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted successfully');
    }
}
