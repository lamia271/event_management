<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebCustomerController extends Controller
{
   public function registration()
   {
      return view('frontend.pages.registration');
   }

   public function doRegistration(Request $request)
   {
      $checkValidation = Validator::make(
            $request->all(),
            [
               'name' => 'required',
               'email' => 'required',
               'address' => 'required',
               
               'phone' => 'required',
               'password' => 'required'       // |size:10000'

            ]
         );

      if ($checkValidation->fails()) {
         notify()->error("Something Went Wrong.");
         // notify()->error($checkValidation->getMessageBag());
         return redirect()->back();
      }

      $customer_image = '';

      if ($request->hasFile('image')) {

         $customer_image = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
         $request->file('image')->storeAs('/customers', $customer_image);
      }

      Customer::create([

         'name' => $request->name,
         'email' => $request->email,
         'address' => $request->address,
         'image' => $customer_image,
         'phone' => $request->phone,
         'password' => bcrypt($request->password)

      ]);
      notify()->success('Registration Successful');
      return redirect()->route('login');
   }


   public function login()
   {
      return view('frontend.pages.login');
   }
   public function doLogin(Request $request)
   {
      $customerInput = ['email' => $request->email, 'password' => $request->password];
      $checklogin = auth()->guard('customerGuard')->attempt($customerInput);
      $checkValidation = Validator::make(
            $request->all(),
            [

               'email' => 'required',
               'password' => 'required'       // |size:10000'

            ]
         );

      if ($checkValidation->fails()) {
         notify()->error("Something Went Wrong.");
         // notify()->error($checkValidation->getMessageBag());
         return redirect()->back();
      }
      if ($checklogin) {
         notify()->success('Login Successful.');
         return redirect()->route('home.page');
      }


      notify()->error('Invalid Credentials.');
      return redirect()->back();
   }

   public function logout()

   {
      auth('customerGuard')->logout();
      // Auth::logout();
      notify()->success('Logout Successful');
      return redirect()->route('home.page');
   }

   public function customerList()

   {
      $customerDetails = Customer::paginate(4);
      return view('backend.pages.customer.customerList', compact('customerDetails'));
   }

   public function search(Request $request)
{
    $query = Customer::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'LIKE', '%' . $search . '%')
              ->orWhere('email', 'LIKE', '%' . $search . '%')
              ->orWhere('phone', 'LIKE', '%' . $search . '%')
              ->orWhere('address', 'LIKE', '%' . $search . '%');
    }

    $customerDetails = $query->paginate(4);

    return view('backend.pages.customer.customerSearch', compact('customerDetails'));
}


   public function deleteCustomer()

   {
      $customer = Customer::find(auth('customerGuard')->user()->id);
      $customer->delete();
      notify()->success('Customer Deleted Successfully.');
      return redirect()->back();
   }
}
