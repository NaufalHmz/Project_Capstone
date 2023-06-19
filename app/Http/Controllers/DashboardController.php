<?php
namespace App\Http\Controllers;
use App\Models\Obat;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $ar_gender = DB::table('pasien')
                ->selectRaw('gender, count(gender) as jumlah')
                ->groupBy('gender')
                ->get();
        return view('dashboard.index', compact('ar_gender'));
    }
}

