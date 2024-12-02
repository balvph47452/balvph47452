<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $postId = $this->route('id');

        return [
            'title' => ['required', 'min:6', Rule::unique('posts')->ignore($postId)],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['required'],
            'price' => ['required', 'min:0'],
            'view' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Nhập tên sản phẩm',
            'title.min' => 'Phải có ít nhất 6 ký tự',
            'title.unique' => 'Tên sản phẩm đã tồn tại',
            'image.image' => 'Vui lòng chọn hình ảnh',
            'image.max' => 'Kích thước quá lớn (2MB)',
            'description.required' => 'Vui lòng nhập mô tả',
            'price.required' => 'Vui lòng nhập giá tiền',
            'price.min' => 'Giá tiền không được là số âm',
            'view.required' => 'Vui lòng chọn',
            'view.integer' => 'lượt xem phải là số nguyên dương',
            'view.min' => 'Lượt xem không được là số âm',
        ];
    }
}
