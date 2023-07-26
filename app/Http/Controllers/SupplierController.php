<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Supplier/Index',[
            'suppliers' => Supplier::orderBy('name')->get()
        ]);
    }

    public function search($searchKey){
        return inertia('Supplier/Index', [
            'suppliers' => Supplier::where('name', 'like' , "%$searchKey%")->orWhere('email', 'like' , "%$searchKey%")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Supplier/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
        ]);

        Supplier::create($fields);

        return redirect('/suppliers')->banner( 'Supplier Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return inertia('Supplier/Show', compact('suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return inertia('Supplier/Edit', [
            'supplier'=>$supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',


        ]);

        $supplier->update($fields);
        return redirect('/suppliers/' . $supplier->id)->banner( 'Supplier Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/suppliers')->dangerBanner('Supplier successfully deleted');
    }


    public function email(Supplier $supplier){
        //create a pdf of the statement of account
        $pdf = Pdf::loadView('pdf.product-summary',[
            'supplier' =>$supplier
        ]);

        $filename = 'records/' . $supplier->name . ".pdf";
        $pdf->save($filename);

        Mail::send('emails.soa' ,['supplier'=>$supplier], function($message) use ($supplier, $filename){
            $message->to($supplier->email);
            $message->subject('Product Record');
            $message->attach($filename);
        });

        return back()->banner('Email sent successfully');
    }
}
