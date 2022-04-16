<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaivechitiet extends Model
{
    use HasFactory;
    protected $table = 'chitietloaive';
    public $timestamps = false;
    public function getloaivebyid($id)
    {
        return $this::where('idlocation_detail', '=', $id)->get()->toArray();
    }
}
