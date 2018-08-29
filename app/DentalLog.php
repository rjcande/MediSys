<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Diagnosis;

class DentalLog extends Model
{
    protected $table = "cliniclogs";
    protected $primaryKey = "clinicLogID";
    protected $fillable = [
    	'clinicLogID' ,'clinicType' ,'patientID', 'patientName', 'patientType', 'symptoms', 'treatment', 'dentistID', 'clinicLogDate', 'clinicLogTime', 'responseStatus'
    ];
    // public $timestamps = false;

    public function diagnosis(){
    	return $this->hasOne('App\Diagnosis');
    }
}
