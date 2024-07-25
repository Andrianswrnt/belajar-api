<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genre = genre::latest()->get();
        $response = [
            'success' => true,
            'message' => 'Daftar genre',
            'data' => $genre,
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $genre = new genre();
        $genre->nama_genre = $request->nama_genre;
        $genre->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $genre, // Menambahkan data yang baru disimpan ke respon
        ], 201);
    }

    public function show($id)
    {
        $genre = genre::find($id);
        if ($genre) {
            return response()->json([
                'success' => true,
                'message' => 'Detail genre ditemukan',
                'data' => $genre,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $genre = genre::find($id);
        if ($genre) {
            $genre->nama_genre = $request->nama_genre;
            $genre->save();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $genre, // Menambahkan data yang baru diperbarui ke respon
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $genre = genre::find($id);
        if ($genre) {
            $namagenre = $genre->nama_genre; // Menyimpan nama genre sebelum dihapus
            $genre->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data ' . $namagenre . ' berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }
}
