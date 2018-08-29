<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Patient;

class DentalHistory extends Model
{
    protected $table = "dentalhistories";
    protected $primaryKey = "dentalHistoryID";

    public function patient(){
    	return $this->belongsTo('App\DentalHistory');
    }
}
