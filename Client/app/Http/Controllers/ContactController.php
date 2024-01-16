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
    

    // public function index()
    // {
    // $response = Http::get('http://localhost:8000/api/contacts/');
    // $contacts = $response->json();
    // $totalItems = count($contacts);

    // $contacts = $this->paginate($contacts, 10);
    // $contacts->setPath(url('contacts'));

    // return view('contacts.index', compact('contacts', 'totalItems'));
    // }

    // public function paginate($items, $perPage = 4, $page = null)
    // {
    // $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    // $total = count($items);
    // $currentPage = $page;
    // $offset = ($currentPage * $perPage) - $perPage;
    // $itemsToShow = array_slice($items, $offset, $perPage);

    // return new LengthAwarePaginator($itemsToShow, $total, $perPage);
    // }
}