<?php

namespace App\Http\Controllers;

use App\Models\TrashType;
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
        $types = TrashType::get();
        return view('client.depo_page', compact('title', 'types'));
    }
}
