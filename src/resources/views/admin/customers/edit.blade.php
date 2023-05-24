@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.update", [$customer->customerId]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.customer.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $customer->nama) }}" required>
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat">{{ trans('cruds.customer.fields.alamat') }}</label>
                <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text" name="alamat" id="alamat" value="{{ old('alamat', $customer->alamat) }}" required>
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.customer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $customer->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telepon">{{ trans('cruds.customer.fields.telepon') }}</label>
                <input class="form-control {{ $errors->has('telepon') ? 'is-invalid' : '' }}" type="text" name="telepon" id="telepon" value="{{ old('telepon', $customer->telepon) }}" required>
                @if($errors->has('telepon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telepon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.telepon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="produk">{{ trans('cruds.customer.fields.produk') }}</label>
                <input class="form-control {{ $errors->has('produk') ? 'is-invalid' : '' }}" type="text" name="produk" id="produk" value="{{ old('produk', $customer->produk) }}" required>
                @if($errors->has('produk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('produk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sudahBayar">{{ trans('cruds.customer.fields.sudahBayar') }}</label>
                <input class="form-control {{ $errors->has('sudahBayar') ? 'is-invalid' : '' }}" type="text" name="sudahBayar" id="sudahBayar" value="{{ old('sudahBayar', $customer->sudahBayar) }}" required>
                @if($errors->has('sudahBayar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sudahBayar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.sudahBayar_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection