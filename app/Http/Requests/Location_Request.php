<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Location_Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'diemdi' => ['required'],
            'diemden' => ['required'],
            'phuongtien' => ['required'], 
            // 'top' => ['required'],
            // 'anhien' => ['required'],
            'giavetb' => ['required','numeric'],
            'time' => ['required'],
            'mota' => ['required'],
            // 'images' => ['max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
        ];
    }
    public function attributes()
    {
       return [
        'diemdi' => "Điểm đi",
        'diemden' => "Điểm đến",
        'phuongtien' => "Phương tiện", 
        // 'top' => ['required'],
        // 'anhien' => ['required'],
        'giavetb' => "Giá vé trung bình",
        'time' =>"Thời gian",
        'mota' => "Mô tả",
       ];

    } 
}
