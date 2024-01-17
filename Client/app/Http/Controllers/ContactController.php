<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{

    public function index()
    {
        $response = Http::get('http://localhost:8000/api/contacts/');
        $responseData = $response->json();

        // Check if 'data' key exists in the response
        $contacts = isset($responseData['data']) ? $responseData['data'] : [];

        $totalItems = count($contacts);

        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($contacts, ($currentPage - 1) * $perPage, $perPage);

        $paginator = new LengthAwarePaginator($currentItems, $totalItems, $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('contacts.index', compact('paginator', 'totalItems', 'contacts'));
    }
    

    public function create (){

    $response = Http::get('http://localhost:8000/api/companies');
    $companies = $response->json();

    return view('contacts.create', compact('companies'));
    }
}