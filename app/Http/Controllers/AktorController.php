<?php

namespace App\Http\Controllers;

use App\Models\aktor;
use Illuminate\Http\Request;

class AktorController extends Controller
{
    public function index()
    {
        $aktor = aktor::latest()->get();
        $response = [
            'success' => true,
            'message' => 'Daftar aktor',
            'data' => $aktor,
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $aktor = new aktor();
        $aktor->nama_aktor = $request->nama_aktor;
        $aktor->biodata = $request->biodata;
        $aktor->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $aktor, // Menambahkan data yang baru disimpan ke respon
        ], 201);
    }

    public function show($id)
    {
        $aktor = aktor::find($id);
        if ($aktor) {
            return response()->json([
                'success' => true,
                'message' => 'Detail aktor ditemukan',
                'data' => $aktor,
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
        $aktor = aktor::find($id);
        if ($aktor) {
            $aktor->nama_aktor = $request->nama_aktor;
            $aktor->biodata = $request->biodata;
            $aktor->save();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $aktor,
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
        $aktor = aktor::find($id);
        if ($aktor) {
            $namaaktor = $aktor->nama_aktor; // Menyimpan nama aktor sebelum dihapus
            $aktor->biodata = $aktor->biodata;
            $aktor->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data ' . $namaaktor . ' berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }
}
