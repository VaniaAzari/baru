<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestMhsStore extends FormRequest
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
            'username' =>'required|integer',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'prodi_id' => 'required',
            'kelas_id' => 'required',
            'angkatan_id' => 'required',
            'password' =>'required',
            'file_name' => 'required|max:10000|mimes:jpg,png,jpeg'

        ];
    }
}
