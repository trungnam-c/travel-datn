<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTicketDetail extends Model
{
    use HasFactory;
    protected $table = "chitietdatve";
    protected $primaryKey = "idve";
}
