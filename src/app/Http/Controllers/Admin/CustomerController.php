<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Customer::query()->select(sprintf('%s.*', (new Customer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'customer_show';
                $editGate      = 'customer_edit';
                $deleteGate    = 'customer_delete';
                $crudRoutePart = 'customers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('customerId', function ($row) {
                return $row->customerId ? $row->customerId : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('alamat', function ($row) {
                return $row->alamat ? $row->alamat : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('telepon', function ($row) {
                return $row->telepon ? $row->telepon : '';
            });
            $table->editColumn('produk', function ($row) {
                return $row->produk ? $row->produk : '';
            });
            $table->editColumn('sudahBayar', function ($row) {
                return $row->sudahBayar ? $row->sudahBayar : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.customers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        return redirect()->route('admin.customers.index');
    }

    public function edit(Customer $customer)
    {
        abort_if(Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        return redirect()->route('admin.customers.index');
    }

    public function show(Customer $customer)
    {
        abort_if(Gate::denies('customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customers.show', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
        abort_if(Gate::denies('customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerRequest $request)
    {
        $customers = Customer::find(request('ids'));

        foreach ($customers as $customer) {
            $customer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
    
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->role == 1;
        });
    }
}