<?php

namespace App\Http\Controllers;

use App\Models\Buraco;
use Illuminate\Http\Request;

use GrahamCampbell\Flysystem\FlysystemManager;

class BuracoController extends Controller
{
    private $buraco;

    public function __construct(Buraco $buracoModel, FlysystemManager $flysystem)
    {
        // $this->middleware('auth:api');
        $this->buraco = $buracoModel;
        $this->flysystem = $flysystem;
    }

    public function index() {
        return Buraco::all();
    }

    public function store(Request $request) {
        $this->buraco->cadastro($request);
    }
}
