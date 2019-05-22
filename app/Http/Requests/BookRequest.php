<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        {
            $id = $this->request->get('id');
            return [
                'name' => 'required|min:3|max:30|unique:books,name,' . $id . 'id',
                'description' => 'min:3|max:1000',
                'author' => 'required|min:3|max:30',
                'image'  => 'nullable|image:jpeg,png,jpg',
                'quantity' => 'numeric|min:1|max:10000',
            ];
        }
    }

    public
    function messages()
    {
        return [
            'name.min' => 'Tên sách phải từ 3 đến 30 ký tự',
            'name.max' => 'Tên sách phải từ 3 đến 30 ký tự',
            'name.unique' => 'Sách đã có trong danh mục',
            'name.required' => 'Tên sách không được trống',
            'description.min' => 'Mô tả phải từ 3 đến 255 ký tự',
            'description.max' => 'Mô tả phải từ 3 đến 255 ký tự',
            'author.min' => 'Tên tác giả phải từ 3 đến 30 ký tự',
            'author.max' => 'Tên tác giả phải từ 3 đến 30 ký tự',
            'author.required' => 'Tên tác giả không được trống',
            'image.image' => 'Ảnh không đúng định dạng: jpeg,png,jpg',
            'quantity.numeric' => 'Hãy nhập đúng số',
            'quantity.min' => 'Số lượng nhỏ nhất là 1',
            'quantity.max' => 'Số lượng lớn nhất là 10000',
        ];
    }
}
