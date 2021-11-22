<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
            'app_type' => 'required',
            'app_city' => 'required',
            'app_location' => 'required',
            'app_lake' => 'required',
            'app_river' => 'required',
            'app_sea' => 'required',
            'app_resource_name' => 'required',
            'app_sort_title' => 'required',
            'app_description' => 'required',
            'app_address' => 'required',
            'nearest_location' => 'required',
            'app_phone' => 'required | unique:resources,phone',
            'app_email' => 'required | email | unique:resources,email',
            'app_single_min_price' => 'required',
            'app_single_max_price' => 'required',
            'app_single_price_type' => 'required',
            'app_total_min_price' => 'required',
            'app_total_max_price' => 'required',
            'app_total_room' => 'required',
            'app_total_people' => 'required',
            'app_seasion' => 'required',
            'app_payment_type' => 'required',
            'app_note' => 'required',
            'app_contact_person' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'app_type.required' => ':attribute is required',
            'app_email.required' => ':attribute is required',
            'app_email.email' => ':attribute is not a vlaid email',
            'app_email.unique' => ':attribute already taken',
        ];
    }

    public function attributes()
    {
        return [
            'app_type' => 'A title',
            'app_email' => 'valid email'
        ];
    }
}
