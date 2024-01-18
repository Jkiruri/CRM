<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/deals/');
        $responseData = $response->json();

        // Check if 'data' key exists in the response
        $deals = isset($responseData['data']) ? $responseData['data'] : [];

        $totalItems = count($deals);

        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($deals, ($currentPage - 1) * $perPage, $perPage);

        $paginator = new LengthAwarePaginator($currentItems, $totalItems, $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('deals.index', compact('paginator', 'totalItems', 'deals'));
    }
    public function create()
{
    // Fetch companies
    $companiesResponse = Http::get('http://localhost:8000/api/companies');
    $companies = $companiesResponse->json();

    // Fetch contacts
    $contactsResponse = Http::get('http://localhost:8000/api/contacts');
    $contacts = $contactsResponse->json();

    return view('deals.create', compact('companies', 'contacts'));
}
}