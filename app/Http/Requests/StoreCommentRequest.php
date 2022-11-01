<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
    public function rules()
    {
        return [

            //TODO: Check best way to send better/custom response validation message
            
            'podcast_id' => 'required|exists:podcasts,id',
            'name'       => 'required|unique:comments,name,null,null,email,'.$this->email.',body,'.$this->body.',podcast_id,'.$this->podcast_id,
            'email'      => 'required|email',
            'body'       => 'required', 
        ];
    }
}
