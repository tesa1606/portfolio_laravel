<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // GET /admin/contact
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts')); // admin/contact/index.blade.php
    }

    // GET /admin/contact/create
    public function create()
    {
        return view('admin.contact.add'); // admin/contact/add.blade.php
    }

    // POST /admin/contact
    public function store(Request $request)
    {
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'status_publish' => 'required|boolean',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Data berhasil ditambahkan');
    }

    // GET /admin/contact/{id}/edit
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact')); // admin/contact/edit.blade.php
    }

    // PUT /admin/contact/{id}
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'status_publish' => 'required|boolean',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validated);

        return redirect()->route('contacts.index')->with('success', 'Data berhasil diupdate');
    }

    // DELETE /admin/contact/{id}
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Data berhasil dihapus');
    }
}
