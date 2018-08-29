<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsedMedSupply extends Model
{
    protected $table = "medsuppliesused";
    protected $primaryKey = "medSupplyUsedID";
}
