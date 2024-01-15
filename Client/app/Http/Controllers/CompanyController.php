<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;


class CompanyController extends Controller
{
    public function index()
    {
    $response = Http::get('http://localhost:8000/api/companies/');
    $companies = $response->json();
    $totalItems = count($companies);

    $companies = $this->paginate($companies, 10);
    $companies->setPath(url('companies'));

    return view('companies.index', compact('companies', 'totalItems'));
    }

    public function paginate($items, $perPage = 4, $page = null)
    {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $total = count($items);
    $currentPage = $page;
    $offset = ($currentPage * $perPage) - $perPage;
    $itemsToShow = array_slice($items, $offset, $perPage);

    return new LengthAwarePaginator($itemsToShow, $total, $perPage);
    }

    public function delete_company($id)
    {
    $response = Http::delete("http://localhost:8000/api/companies/$id");

    if ($response->successful()) {
        return response()->json(['success' => true, 'tr' => 'tr_' . $id]);
    }

    return response()->json(['success' => false, 'message' => 'Failed to delete company.'], $response->status());
    }
    public function create(){
        return view('companies.create');
    }



}