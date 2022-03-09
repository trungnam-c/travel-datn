<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magiamgia extends Model
{
    use HasFactory;
    protected $table = 'magiamgia';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	// protected $fillable = [
	// 	'magiamgia', 'chitiet','ngaybatdau','ngayketthuc','loaima','anhien','giatri'
	// ];
}
