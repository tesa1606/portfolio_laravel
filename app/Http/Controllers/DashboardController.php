<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Testimonial;
use App\Models\Portfolio;
use App\Models\Contact;     // ✅ Tambahkan
use App\Models\Team;        // ✅ Tambahkan

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data jumlah kontak per bulan untuk Chart
        $contactChart = DB::table('contacts')
            ->selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = [];
        $data = [];

        foreach ($contactChart as $item) {
            $labels[] = Carbon::create()->month($item->bulan)->format('F');
            $data[] = $item->total;
        }

        // Hitung total data
        $jumlahContact = Contact::count();              // ✅ Tambahkan
        $jumlahTestimonial = Testimonial::count();
        $jumlahPortfolio = Portfolio::count();
        $jumlahTeam = Team::count();                   // ✅ Tambahkan

        return view('admin.dashboard', compact(
            'labels',
            'data',
            'jumlahContact',
            'jumlahTestimonial',
            'jumlahPortfolio',
            'jumlahTeam'
        ));
    }
}
