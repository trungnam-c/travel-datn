<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMbaivietModel extends Model
{
    use HasFactory;
    protected $table = 'danhmuc_baiviet';
    public $timestamps = false;
}
