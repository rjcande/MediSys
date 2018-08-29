<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DentalHistory;

class Patient extends Model
{
    protected $table = "patients";
    protected $fillable = ['patientID'];
    protected $primaryKey = "patientID";

    public function dentalhistory(){
    	return $this->hasOne('App\DentalHistory');
    }
}
