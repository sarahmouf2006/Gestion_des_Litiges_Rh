<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Calculate real statistics from jugement table
        $totalLitiges = DB::table('jugement')->count();
        
        // En Cours: records where منفذة أو غير منفذة is 0 or null (not executed)
        $enCours = DB::table('jugement')
            ->where(function($query) {
                $query->where('منفذة أو غير منفذة', 0)
                      ->orWhereNull('منفذة أو غير منفذة');
            })
            ->count();
        
        // Résolus: records where منفذة أو غير منفذة is 1 (executed)
        $resolus = DB::table('jugement')
            ->where('منفذة أو غير منفذة', 1)
            ->count();
        
        // En Retard: records with overdue dates (تاريخ التسوية is in the past and not executed)
        $enRetard = DB::table('jugement')
            ->where(function($query) {
                $query->where('منفذة أو غير منفذة', 0)
                      ->orWhereNull('منفذة أو غير منفذة');
            })
            ->whereDate('تاريخ التسوية', '<', now())
            ->count();
        
        // Get recent 5 litiges for the table
        $recentLitiges = DB::table('jugement')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        
        // Get statistics by type
        $statsByType = DB::table('jugement')
            ->select('نوع السجل', DB::raw('count(*) as count'))
            ->groupBy('نوع السجل')
            ->pluck('count', 'نوع السجل')
            ->toArray();

        // إرجاع بيانات إلى view dashboard مع البيانات
        return view('dashboard', compact(
            'totalLitiges',
            'enCours',
            'resolus',
            'enRetard',
            'recentLitiges',
            'statsByType'
        ));
    }
}
