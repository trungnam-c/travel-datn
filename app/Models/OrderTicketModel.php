<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTicketModel extends Model
{
    use HasFactory;
    protected $table = "datve";
    protected $primaryKey = "idve";
    public $timestamps = false;
}
