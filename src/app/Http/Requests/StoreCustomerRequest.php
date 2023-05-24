<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_create');
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