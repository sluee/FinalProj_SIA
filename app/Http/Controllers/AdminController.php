<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Admin/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function bulkEmail(Request $request){
        $request->validate([
            'subject'   => 'required',
            'message'   => 'required'
        ]);

        $subject = $request->input('subject');
        $mess = $request->input('message');

        $suppliers = Supplier::all();

        foreach ($suppliers as $supplier) {
            Mail::send('emails.bulk', ['mess' => $mess, 'subject' => $subject, 'supplier' => $supplier], function ($message) use ($supplier, $subject, $mess) {
                $message->to($supplier->email);
                $message->subject($subject);
            });
        }

        return back()->banner('Emails sent successfully');
    }
}
