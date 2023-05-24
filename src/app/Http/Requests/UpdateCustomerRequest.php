<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'alamat' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'telepon' => [
                'string',
                'required',
            ],
            'produk' => [
                'string',
                'required',
            ],
            'sudahBayar' => [
                'boolean',
                'required',
            ],
        ];
    }
}
