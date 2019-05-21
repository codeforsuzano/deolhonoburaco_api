<?php

namespace App\Http\Controllers;

use App\Models\Buraco;
use Illuminate\Http\Request;

class BuracoController extends Controller
{
    private $buraco;

    public function __construct(Buraco $buracoModel)
    {
        $this->middleware('auth:api');
        $this->buraco = $buracoModel;
    }

    public function index() {
        return Buraco::all();
    }

    public function store(Request $request) {
        $this->buraco->cadastro($request);
    }
}
