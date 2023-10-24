<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use Illuminate\Foundation\Http\FormRequest;

class FormPostRequest extends FormRequest
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
            'title' =>  ['min:2'],
            'slug' => ['min:2', 'regex:/^[0-9a-z\-]+$/' , Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            'content' => ['min:2'],
            'name' => ['min:2'],
            'category_id' => [  'exists:categories,id'],
            'tags' => ['array', 'exists:tags,id', ],
            'image' => ['image', 'max:2000' ],
            
        ];
    }

    protected function prepareForValidation()
    {
            $this->merge([
                'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
            ]);
        
    }
}
