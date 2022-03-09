<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\categoriesModel;
use Illuminate\Http\Request;

class category extends Controller
{
    public $md;
    function __construct()
    {
        $this->md = new categoriesModel();
    }
    public function getall()
    {
        return $this->md::all();
    }
    public function getcateid($id)
    {
        return $this->md::find($id);
    }
    // SELECT id,ngaykhoihanh FROM detail_location WHERE idlocation = 1;
}
