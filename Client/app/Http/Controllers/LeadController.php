<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $sanctumToken = env('SANCTUM_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $sanctumToken,
            'Accept' => 'application/json',
        ])->get('http://localhost:8000/api/leads/');
        $responseData = $response->json();

        $responseCompany = Http::withHeaders([
        'Authorization' => 'Bearer ' . $sanctumToken,
        'Accept' => 'application/json',
        ])->get('http://localhost:8000/api/companies/');
        $companies = $responseCompany->json();

        // Check if 'data' key exists in the response
        $leads = isset($responseData['data']) ? $responseData['data'] : [];

        $totalItems = count($leads);

        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($leads, ($currentPage - 1) * $perPage, $perPage);

        $paginator = new LengthAwarePaginator($currentItems, $totalItems, $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('leads.index', compact('paginator', 'totalItems', 'leads', 'companies'));
    }
    public function create (){

    $sanctumToken = env('SANCTUM_TOKEN');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $sanctumToken,
        'Accept' => 'application/json',
    ])->get('http://localhost:8000/api/companies/');
    $companies = $response->json();

    return view('leads.create', compact('companies'));
    }
}