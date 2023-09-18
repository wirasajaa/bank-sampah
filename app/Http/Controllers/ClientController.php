<?php

namespace App\Http\Controllers;

use App\Models\TrashType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $title = 'dashboard';
        return view('client.index', compact('title'));
    }
    public function depo(TrashType $trash)
    {
        $title = 'list_trash';
        $trash->picture = Storage::url('public/TrashImage/' . $trash->picture);
        return view('client.depo_page', compact('title', 'trash'));
    }
    public function list_trash()
    {
        $title = "list_trash";
        $trash = TrashType::get();
        foreach ($trash as $item) {
            $item->picture = Storage::url('public/TrashImage/' . $item->picture);
        }
        return view('client.list_trash_page', compact('title', 'trash'));
    }
}
