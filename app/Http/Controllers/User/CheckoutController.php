<?php

namespace App\Http\Controllers\User;

use App\Models\Camps;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create(Camps $camp)
    {
        return view('checkout.create',[
            'camp' => $camp
        ]);
    }

    
    public function store(Request $request, Camps $camp)
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
}
