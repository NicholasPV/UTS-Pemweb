@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.customerId') }}
                        </th>
                        <td>
                            {{ $customer->customerId }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.nama') }}
                        </th>
                        <td>
                            {{ $customer->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.alamat') }}
                        </th>
                        <td>
                            {{ $customer->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.email') }}
                        </th>
                        <td>
                            {{ $customer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.telepon') }}
                        </th>
                        <td>
                            {{ $customer->telepon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.produk') }}
                        </th>
                        <td>
                            {{ $customer->produk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.sudahBayar') }}
                        </th>
                        <td>
                            {{ $customer->sudahBayar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection