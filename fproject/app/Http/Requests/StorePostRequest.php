<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title"=>["required","max:255","unique:posts","min:2"],
            "body"=>"required"
        ];
    }
    public function messages(): array
    {
        return[
            'title.required'=>'A title is required ',
            'title.max'=>'A title is required ',
            'body.required'=>'A message is required ',
        ];
    }
}
