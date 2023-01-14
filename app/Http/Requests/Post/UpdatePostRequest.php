<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'post_title'  => 'required',
            'category_id' => 'required',
            'post_body'   => 'required',
            'tag_list'    => 'required',
            'post_image'  => 'mimes:jpg,png,jpig,gif',
        ];
    }

    /**
     * Validation custom message.
     *
     * @return array<string>
     */
    public function messages(): array
    {
        return [
            'post_title.required'  => 'Post title must be filled in.',
            'category_id.required' => 'Category must be filled in.',
            'post_body.required'   => 'Post content must be filled in.',
            'tag_list.required'    => 'Tags must be filled in.',
        ];
    }
}
