<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:70'],
            'detail' => ['required', 'string'],
            'category_id' => ['integer'],
            'preview' => ['image', 'max:4096', 'mimes:jpg,png,jpeg,gif,svg'],
            // 'file' => File::image()->max(4096),
            // ['image', 'max:4096', 'mimes:jpg,png,jpeg,gif,svg'],
            'active' => ['boolean']
        ];
    }
}
