<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'post_image'  => 'nullable',
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
            // 'supplier_name.required'    => 'Supplier Name must be filled in.',
            // 'supplier_address.required' => 'Supplier Address must be filled in.',
            // 'supplier_phone.required'   => 'Supplier Phobe Number must be filled in.',

        ];
    }
}
