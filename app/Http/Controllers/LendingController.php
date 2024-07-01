<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function create(Product $product) {
        return view('lendings.create', compact('product'));
    }

    public function store(Request $request, Product $product) {
        $request->validate([
            'borrower_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ]);

        $lending = new Lending([
            'product_id' => $product->id,
            'lender_id' => Auth::id(),
            'borrower_id' => $request->borrower_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending'
        ]);

        $lending->save();

        return redirect()->route('products.index');
    }

    public function updateStatus(Lending $lending, $status) {
        $lending->update(['status' => $status]);
        return redirect()->route('lendings.index'); 
    }
}
