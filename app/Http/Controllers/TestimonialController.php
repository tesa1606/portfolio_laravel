<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'status_publish' => 1, // Default sudah dipublish
        ]);

        return redirect()->back()->with('success', 'Testimoni berhasil dikirim! Akan tampil setelah disetujui.');
    }

   public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->update([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'status_publish' => $request->status_publish ? 1 : 0,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        $testimonials->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}