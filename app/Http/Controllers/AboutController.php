<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Testimonial;


class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'required'
        ]);

        $path = $request->file('gambar')?->store('about', 'public');

        About::create([
            'gambar' => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('abouts.index')->with('success', 'About berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'required'
        ]);

        $data = ['deskripsi' => $request->deskripsi];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('about', 'public');
            $data['gambar'] = $path;
        }

        $about->update($data);

        return redirect()->route('abouts.index')->with('success', 'About berhasil diupdate!');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('abouts.index')->with('success', 'About berhasil dihapus!');
    }

     public function showAbout()
    {
        $about = About::latest()->first();
        $testimonials = Testimonial::where('status_publish', 1)->get();

        return view('front-end.about', compact('about', 'testimonials'));

    }

    
}
