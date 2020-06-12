<?php

namespace App\Http\Controllers;

use App\Order;
use DB;
use Illuminate\Http\Request;

class OmzetController extends Controller
{
    /**
     * Display total revenue.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totals = DB::table('orders')
        ->select(DB::raw('SUM(amount) as total_amount'),
                 DB::raw('SUM(tax_amount) as total_tax_amount'),
                 DB::raw('MIN(created_at) as min_created_at'))->get();
        return view('omzet.index',['totals' => $totals ]);
    }

    /**
     * Display yearly revenue.
     *
     * @return \Illuminate\Http\Response
     */
    public function year($year)
    {
        $totals = DB::table('orders')->whereYear('created_at',$year)
        ->select(DB::raw('SUM(amount) as total_amount'),
                 DB::raw('SUM(tax_amount) as total_tax_amount'),
                 DB::raw('MIN(created_at) as min_created_at'),
                 DB::raw('MAX(created_at) as max_created_at'))->get();
        return view('omzet.year',['totals' => $totals, 'year' => $year ]);
    }

    /**
     * Display monthly revenue.
     *
     * @return \Illuminate\Http\Response
     */
    public function month($year,$month)
    {
        $totals = DB::table('orders')->whereYear('created_at',$year)->whereMonth('created_at',$month)
        ->select(DB::raw('SUM(amount) as total_amount'),
                 DB::raw('SUM(tax_amount) as total_tax_amount'))->get();
        return view('omzet.month',['totals' => $totals, 'year' => $year, 'month' => $month ]);
    }

}
