<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Backend: tampil di admin
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('gambar')->store('portfolio', 'public');

        Portfolio::create([
            'gambar' => $path
        ]);

        return redirect()->route('portfolios.index')->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $path = $request->file('gambar')->store('portfolio', 'public');

            // Hapus gambar lama
            if ($portfolio->gambar && file_exists(public_path('storage/' . $portfolio->gambar))) {
                unlink(public_path('storage/' . $portfolio->gambar));
            }

            $portfolio->update([
                'gambar' => $path
            ]);
        }

        return redirect()->route('portfolios.index')->with('success', 'Portfolio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->gambar && file_exists(public_path('storage/' . $portfolio->gambar))) {
            unlink(public_path('storage/' . $portfolio->gambar));
        }

        $portfolio->delete();

        return redirect()->route('portfolios.index')->with('success', 'Portfolio berhasil dihapus!');
    }

    // ✅ FRONTEND
    public function showFrontend()
    {
        $portfolios = \App\Models\Portfolio::all();
        $contact = \App\Models\Contact::latest()->first();
        return view('front-end.portfolio', compact('portfolios', 'contact'));
    }

    public function showHome()
    {
        $portfolios = \App\Models\Portfolio::latest()->take(3)->get(); // tampilkan 3 terbaru misalnya
        $contact = \App\Models\Contact::latest()->first();
        $about = \App\Models\About::latest()->first(); 

        return view('front-end.home', compact('portfolios', 'contact', 'about'));
    }


}
