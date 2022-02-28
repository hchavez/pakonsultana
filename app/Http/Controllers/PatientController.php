<?php

namespace App\Http\Controllers;

use App\Patients;
use App\PatientConsultations;
use App\PatientMedications;
use App\PatientBilling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Auth;
use DB;
use Image;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::all();
        return view('patients/index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('patients/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $patient = new Patients;
        $patient->physician_id = $request->input('physician');
        $patient->lastname = $request->lastname;
        $patient->firstname = $request->firstname;
        $patient->middlename = $request->middlename;
        $patient->namext = $request->extname;
        $patient->age = $request->age;
        $patient->birthdate =  Carbon::parse($request->birthdate)->format('Y-m-d');
        $patient->gender = $request->gender;
        $patient->civilstatus = $request->civilstatus;
        $patient->address = $request->address;
        $patient->municipality = $request->municipality;
        $patient->citizenship = $request->citizenship;
        $patient->religion = $request->religion;
        $patient->philhealth = $request->philhealth;
        $patient->insurance = $request->insurance;
        $patient->contactno = $request->contactno;
        $patient->emailad = '1';
        $patient->photo = '1';
        $patient->status = '1';
        $patient->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patients  $Patients
     * @return \Illuminate\Http\Response
     */
    public function show(Patients $Patients)
    {
        return view('patients.edit', [
            'patients' => $patients
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patients  $Patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patients $patients)
    {
        return view('patients.edit', [
            'patients' => $patients
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patients  $Patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patients $Patients)
    {
        $flight = App\Flight::find(1);
 
        $flight->name = 'New Flight Name';
        
        $flight->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patients  $Patients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patients $Patients)
    {
        //
    }
}
