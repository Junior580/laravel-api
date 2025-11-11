<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Http\Requests\TenantRequest;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(TenantRequest $request)
    {
        Tenant::create($request->validated());

        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully');
    }
}
