<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::all();
        $payment = Payment::paginate(5);

        return view('payment/index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment/addPayment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //This is the validation of the create form
        $request -> validate([
            'customer_id' => 'required',
            'payment_name' => 'required'
        ]);

        //This is a store function using fillable variation located in model
        Payment::create( $request -> all() );

        return redirect('/payment') -> with('status', 'Payment Data Inputted Successfully');
    }

    //This is a customized error messages for the validation
    public function messages(){
        return[
            'customer_id.required' => 'The Customer ID is required'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payment/editPayment', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request -> validate([
            'customer_id' => 'required',
            'payment_name' => 'required'
        ]);
        
        Payment::where('id', $payment -> id)
                ->update([
                    'customer_id' => $request -> customer_id,
                    'payment_name' => $request -> payment_name
                ]);
        return redirect('/payment') -> with('status', 'Payment Data Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        Payment::destroy($payment->id);
        return redirect('/payment') -> with('status', 'Payment Data Deleted Successfully');
    }
}
