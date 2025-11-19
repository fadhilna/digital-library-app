<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $buku = Buku::when($search, function($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                        ->orWhere('penulis', 'like', "%{$search}%");
        })->paginate(10);

        return view('buku.index', compact('buku', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:3|max:255',
            'penulis' => 'required|min:3|max:255',
            'penerbit' => 'required|min:2|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:'.(date('Y')+1),
        ], [
            'judul.required' => 'Judul buku harus diisi',
            'judul.min' => 'Judul buku minimal 3 karakter',
            'penulis.required' => 'Penulis harus diisi',
            'tahun_terbit.min' => 'Tahun terbit tidak valid',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required|min:3|max:255',
            'penulis' => 'required|min:3|max:255',
            'penerbit' => 'required|min:2|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:'.(date('Y')+1),
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}