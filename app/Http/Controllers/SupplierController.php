<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Http\Request;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd("ss");
        $suppliers = Supplier::get();
        $counter = 1;
        return view("layouts.supplier-view", compact("suppliers", 'counter'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        return view("forms.supplier-details", compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "supplier" => "required",
            "date" => "required",
            "product" => "required",
            "quantity" => "required",
            "price" => "required|min:2",

        ]);

        $supplier = new Supplier;
        $bill = new Bill;

        $date = date("d-m-Y",strtotime($request->date));


        $supplier->name = $request->supplier;
        $supplier->save();
        $bill->product_id = $request->product;
        $bill->quantity = $request->quantity;
        $bill->price = $request->price;
        $bill->total_bill = $request->total;
        $bill->created_at = $date;
        $bill->save();

        $message = "Product Added SUCCESSFULLY";
        return view("layouts.supplier-add", compact('message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
