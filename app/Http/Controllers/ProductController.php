<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Products/Index',[
            'products' => Product::orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function search($searchKey){
        return inertia('Products/Index', [
            'products' => Product::where('name', 'like' , "%$searchKey%")->orWhere('description', 'like' , "%$searchKey%")->get()
        ]);
    }
    public function create()
    {
        return inertia('Products/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $fileName = null;

        //process image
        if($request->pic){
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('images/product_pics'), $fileName);
            $fields['pic'] = $fileName;
        }

        Product::create($fields);

        return redirect('/products')->banner( 'Product Added Successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return inertia('Products/Show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return inertia('Products/Edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',

        ]);

        $product->update($fields);
        return redirect('/products/' . $product->id)->banner( 'Product Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products')->dangerBanner('Product successfully deleted');

    }

    public function toggle(Product $product){
        $product->active = !$product->active;
        $product->save();

        return back()->banner('Toggle Enable');
    }

    // public function email(Product $product){
    //     $pdf = Pdf::loadView('pdf.prod-summary',[
    //         'product'=>$product
    //     ]);

    //     $filename='products/' .$product->name . ".pdf";
    //     $pdf->save($filename);

    //     Mail::send('email.sop' ,['product'=>$product], function($message) use ($product, $filename){
    //         // $message->to($client->email);
    //         // $message->subject('Summary of Product');
    //         // $message->attach($filename);
    //     });

    //     return back()->banner('Email has been sent successfully!');


    // }
}
