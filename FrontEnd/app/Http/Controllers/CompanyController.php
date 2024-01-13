<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;



class CompanyController extends Controller
{
    public function index()
    {
        // Make a GET request to your API endpoint
        
        $response = Http::get('http://localhost:8000/api/companies/');

        // Check if the request was successful (status code 200)
        if ($response->successful()) {
            // Decode the JSON response and assign it to the $companies variable
            $companies = $response->json();
        } else {
            // Handle the case where the request was not successful
            $companies = []; // or set to null or handle the error as needed
        }

        // Pass $companies to the view
        return view('companies.index', ['companies' => $companies]);
    }
}