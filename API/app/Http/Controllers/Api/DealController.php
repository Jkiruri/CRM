<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    } 
    public function index()
{
    return DealResource::collection(Deal::with('company', 'contact')->orderBy('created_at', 'desc')->get());
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $deal = Deal::create([
            ... $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'contact_id' => 'required|exists:contacts,id'

            ]),
            
        
        ]);
        return new DealResource($deal);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deal $deal)
    {
        $deal->load('company');
        $deal->load('contact');
        return new DealResource($deal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal)
    {
        $deal->update($request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:255',
            'amount' => 'sometimes|numeric'
        ]));
        return new DealResource($deal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();
        return response(status: 204);
    }
}