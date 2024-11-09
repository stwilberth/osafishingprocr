<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //show the dashboard
    public function index()
    {
        //check if the user is an super admin
        if (auth()->user()->hasRole('Super Admin')) {
            //return view('dashboard.super_admin');
        }

        //show the view dashboard.admin.index if the user is an admin
        if (auth()->user()->hasRole('admin')) {
            return view('dashboard.admin');
        }

        //show the view dashboard.user.index if the user is not an admin
        return view('dashboard.customer');
    }

    //show the settings

}
