<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePodcastRequest extends FormRequest
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
            'name'          => 'required|min:4|max:255|unique:podcasts,name',
            'description'   => 'required|max:1000',
            'marketing_url' => 'required|url',
            'feed_url'      => 'required|url',
            //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048' //TODO: When Implement image
        ];
    }
}
