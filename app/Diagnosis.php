<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DentalLog;

class Diagnosis extends Model
{
    protected $table = "diagnoses";
    protected $primaryKey = "diagnosisID";

    public function dentalLog(){
    	return $this->belongsTo('App\DentalLog');
    }
}
