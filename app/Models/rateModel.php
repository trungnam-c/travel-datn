<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rateModel extends Model
{
    use HasFactory;
    protected $table = "rate";
    protected $primaryKey = "idrate";
    public $timestamps = false;
}
