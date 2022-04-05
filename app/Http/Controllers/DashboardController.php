<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('client')){
            return view('clientdashboard');
        }
        elseif(Auth::user()->hasRole('vendeur')){
            return view('vendeurdashboard');
        }
        elseif(Auth::user()->hasRole('societelivraison')){
          return view('societelivraison');
      }
      elseif(Auth::user()->hasRole('admin')){
          return view('dashboard');
      }
    }
}
