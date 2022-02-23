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
            'category' => ['required'],
            'top' => ['required','numeric'],
            'anhien' => ['required'],
            'giavetb' => ['required','numeric'],
            'time' => ['required'],
            'mota' => ['required'],
            'images' => ['max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
        ];
    }
}
