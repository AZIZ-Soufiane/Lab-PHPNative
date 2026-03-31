<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct(private ApiService $apiService)
    {
    }

    public function index()
    {
        $search = request('search');

        $data = $search
            ? $this->apiService->searchBooks($search)
            : $this->apiService->getBooks();

        return view('books', compact('data', 'search'));
    }
}
