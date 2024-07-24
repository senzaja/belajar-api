<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\aktor;

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
        $aktor->bio = $request->bio;
        $aktor->save();
        return response()->json([
            'success' => true,
            'message' => 'data berhasil disimpan',
        ], 201);
    }

    public function show($id)
    {
        $aktor = aktor::find($id);
        if ($aktor) {
            return response()->json([
                'success' => true,
                'message' => 'detail aktor',
                'data' => $aktor,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $aktor = aktor::find($id);
        if ($aktor) {
            $aktor->nama_aktor = $request->nama_aktor;
            $aktor->bio = $request->bio;
            $aktor->save();
            return response()->json([
                'success' => true,
                'message' => 'data berhasil diperbarui',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $aktor = aktor::find($id);
        if ($aktor) {
            $aktor->delete();
            return response()->json([
                'success' => true,
                'message' => 'data ' . $aktor->nama_aktor . ' berhasil dihapus',
                'message' => 'data ' . $aktor->bio . ' berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
