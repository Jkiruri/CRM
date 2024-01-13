<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = Company::create([
            ... $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'industry' => 'required|string|max:255',
            'phone' => 'required|string'
            ]),
        
        ]);
        return $company;
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return $company;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'nullable|email',
            'industry' => 'nullable|string|max:255',
            'phone' => 'sometimes|string'
        ]));
        return $company;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();


        return response(status: 204);
    }
}