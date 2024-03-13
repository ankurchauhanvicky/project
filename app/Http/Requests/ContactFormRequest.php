<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    // public function rules()
    // {
    //     return [
    //         'name'=> 'required|min:3|max:100',
    //         'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
    //         'message'=> 'required|min:5|max:200',            
    //     ];
    // }

    // public function messages():array
    // {
    //     return[
    //         'name.required'=> 'Please enter your name is empty',
    //         'email.required'=> 'Please enter your email is empty',
    //         'message.required'=> 'Please enter your message is empty',
    //     ];
    // }
    
}
