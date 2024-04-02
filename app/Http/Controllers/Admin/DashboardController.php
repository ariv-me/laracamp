<?php

namespace App\Http\Controllers\Admin;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index ()
    {
        $chekcouts = Checkout::with('Camp')->get();
        return view('admin.dashboard',[
            'checkouts' => $chekcouts
        ]);
    }
}
