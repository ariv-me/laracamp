<?php

namespace App\Http\Controllers\User;

use App\Models\Camps;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Mail\User\AfterCheckout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\User\Checkout\Store;

class CheckoutController extends Controller
{
    
    public function index()
    {
        
    }

    public function create(Camps $camp, Request $request)
    {
      
        
        if ($camp->isRegistered) {

            $request->session()->flash('error',"You already registered on {$camp->title} camp.");
            return redirect(route('dashboard'));

        }

        return view('checkout.create',[
            'camp' => $camp
        ]);
    }

    
    public function store(Store $request, Camps $camp)
    {

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camp->id;

        // Update User Data

        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        // Create Checkout

        $checkout = Checkout::create($data);

        // Send Email

        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));

        return redirect(route('checkout.success'));
    }

   
    public function show(Checkout $checkout)
    {
        //
    }


    public function edit(Checkout $checkout)
    {
        //
    }


    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    public function destroy(Checkout $checkout)
    {
        //
    }
    public function success(Checkout $checkout)
    {
        return view ('checkout.success_checkout');
    }
    public function invoice(Checkout $checkout)
    {
        return $checkout;
        //return view ('checkout.success_checkout');
    }
}
