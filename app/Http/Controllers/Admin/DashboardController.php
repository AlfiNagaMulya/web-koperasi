<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\transaction;
use Illuminate\Http\Request;

use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = transaction::where('transaction_status', 'SUCCESS')->sum('total_price');
        $transaction = Transaction::count();
        $transaction = Transaction::count();

        return view('pages.admin.dashboard',[
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
        ]);
    }
}
