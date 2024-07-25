<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Pastikan penulisan model dengan huruf besar
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get();
        $response = [
            'success' => true,
            'message' => 'Daftar kategori',
            'data' => $kategori,
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $kategori, // Menambahkan data yang baru disimpan ke respon
        ], 201);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'Detail kategori ditemukan',
                'data' => $kategori,
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
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $kategori, // Menambahkan data yang baru diperbarui ke respon
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
        $kategori = Kategori::find($id);
        if ($kategori) {
            $namaKategori = $kategori->nama_kategori; // Menyimpan nama kategori sebelum dihapus
            $kategori->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data ' . $namaKategori . ' berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }
}
