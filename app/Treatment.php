<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = "treatments";

    protected $primaryKey = "treatmentID";


    // treatmentID, clinicLogID, diagnosisID, treatmentDescription, recommendations, isDeleted, created_at, updated_at, deleted_at
}
