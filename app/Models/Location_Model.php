<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location_Model extends Model
{
    use HasFactory;
    protected $table = "location";
	public $timestamps = false;
}
