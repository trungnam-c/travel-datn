<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailLocationModel extends Model
{
    use HasFactory;

    public $timestamp = false;
    protected $table = "detail_location";
    protected $primaryKey = "id";
    protected $fillable = [
        'idlocation',
        'ngaykhoihanh',
        'giokhoihanh',
        'socho',
        'idhdv',
        'anhien'
    ];
}
