<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalSupply extends Model
{
    protected $table = "medsupplies";
    protected $primaryKey = "medSupID";
    // protected $fillable = ['medSupID'];
}
