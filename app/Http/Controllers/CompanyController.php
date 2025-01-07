<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    // Menampilkan daftar Companies dengan pagination
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    // Menampilkan form untuk menambah Company
    public function create()
    {
        return view('companies.create');
    }

    // Menyimpan data Company
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('companies/logos', 'public');
        }

        Company::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'logo' => $logoPath,
            'website' => $validated['website'],
        ]);

        return redirect()->route('companies.index');
    }

    // Menampilkan detail Company
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    // Menampilkan form untuk mengedit Company
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    // Mengupdate data Company
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url',
        ]);

        $logoPath = $company->logo;
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($logoPath) {
                Storage::delete('public/' . $logoPath);
            }
            $logoPath = $request->file('logo')->store('companies/logos', 'public');
        }

        $company->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'logo' => $logoPath,
            'website' => $validated['website'],
        ]);

        return redirect()->route('companies.index');
    }

    // Menghapus data Company
    // public function destroy(int $id)
    // {
    //     $company = Company::where('id', $id);
    //     // Hapus logo jika ada
    //     // if ($company->logo) {
    //     //     Storage::delete('public/' . $company->logo);
    //     // }

    //     $company->delete();

    //     return redirect()->route('companies.index');
    // }

    public function destroy(Company $company)
{
    $company->delete();
    return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
}
}
