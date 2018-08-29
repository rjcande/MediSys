<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = "prescriptions";
    protected $primaryKey = "prescriptionID";
}
