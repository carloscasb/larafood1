<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpadatPlan extends FormRequest
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

                $url= $this->segment(3);   //Posição na Url (endereço)

        return [
            'name' => "required|min:4|max:255|unique:plans,name,{$url},url",
            'price'=> 'required|regex:/^\d+(\.\d{1,2})?$/',   
             'description' => 'required|min:4|max:255',
        ];
    }
}
