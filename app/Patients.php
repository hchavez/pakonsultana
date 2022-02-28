<?php

namespace App;

use App\Models\PatientBilling;
use App\Models\PatientConsultations;
use App\Models\PatientMedications;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname','age','birthdadate','gender','civilstatus','address','municipality','contactno'
    ];

    public function consultations(){
        return $this->hasMany(PatientConsultations::class, 'id', 'patient_id'); 
    }

    public function medications(){
        return $this->hasMany(PatientMedications::class, 'id', 'patient_id'); 
    }

    public function billing(){
        return $this->hasMany(PatientBilling::class, 'id', 'patient_id'); 

    }

}
