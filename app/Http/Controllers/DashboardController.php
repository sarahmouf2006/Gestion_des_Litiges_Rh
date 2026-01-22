<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // جلب جميع القضايا من جدول litiges
        $litiges = DB::table('litiges')->get();

        // إرجاع بيانات إلى view dashboard مع البيانات
        return view('dashboard', compact('litiges'));
    }
}
