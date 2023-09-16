<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $title = 'dashboard';
        return view('client.index', compact('title'));
    }
    public function depo()
    {
        $title = 'depo';
        return view('client.depo_page', compact('title'));
    }
}
