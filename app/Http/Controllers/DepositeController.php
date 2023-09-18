<?php

namespace App\Http\Controllers;

use App\Models\Deposite;
use App\Models\TrashType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class DepositeController extends Controller
{
    public function store(Request $req, TrashType $trash)
    {
        $validated = $req->validate([
            'qty' => 'required|numeric|min:1',
        ]);
        try {
            $validated['type_id'] = $trash->id;
            $validated['total'] = $req->qty * $trash->price;
            $validated['order_id'] = Str::uuid();


            Deposite::create($validated);

            return redirect()->route('depo.detail')->with('success', 'Trash has stored!')->with('order_id', $validated['order_id']);
        } catch (Throwable $e) {
            $message = config('env') == 'production' ? 'Failed to store trash!' : $e->getMessage();
            return redirect()->back()->withErrors(['error' => $e])->withInput();
        }
    }
    public function detail()
    {
        $title = "list_trash";
        // $order = session()->has('order_id') ? Deposite::where('order_id', session('order_id'))->first() : null;
        $order = Deposite::where('order_id', 'de9a32a3-8b60-4cfc-9baf-a3c0fe5a524a')->first();

        $trend = Deposite::select(DB::raw('SUM(qty) as jumlah'), 'name')->leftJoin('trash_types', 'deposites.type_id', '=', 'trash_types.id')->whereBetween(DB::raw('MONTH(deposites.created_at)'), [date('m'), date('m')])->whereExists(function ($query) use ($order) {
            $query->select('id')->from('trash_types')->whereColumn('trash_types.id', 'deposites.type_id')->where('category_id', $order->type->category_id);
        })->groupBy('type_id')->get()->toArray();

        return view('client.detail_depo', compact('title', 'order', 'trend'));
    }
}
