<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function productsSummary(){
        $pdf = Pdf::loadView('pdf.product-summary',[
            'products' => Product::orderBy('name')->get()
        ]);

        return $pdf->stream();
    }

    public function prodSummary(Product $product){
        $pdf = Pdf::loadView('pdf.prod-summary',[
            'product'=>$product
        ]);

        return $pdf->stream();
    }
}
