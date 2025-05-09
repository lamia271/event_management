<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
       public function paymentDetails() 
       {
         $payments=Payment::paginate(4);
          return view('backend.pages.payment.paymentDetails',compact('payments'));
       }

       public function createPayment()
       {
          return view('backend.pages.payment.createPayment');
       }

       public function paymentDetailsStore(Request $request)
       {
              $checkValidation = Validator::make($request->all(),
              [
                     'transaction_id'=>'required',
                     'amount'=>'required',
                     'payment_method'=>'required',
                     'due'=>'required'
              ]);

              if($checkValidation->fails())
              {
                     notify()->error("something went wrong");
                     return redirect()->back();
              }

              Payment::create
              ([
                  'transaction_id'=>$request-> transaction_id,
                  'amount'=>$request->amount,
                  'payment_method'=>$request->payment_method,
                  'due'=>$request->due  

              ]);
              
              notify()->success("Payment Created Successfully");
              return redirect()->back();
       }
}
