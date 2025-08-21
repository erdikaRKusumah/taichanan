<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        confirmDelete('Hapus data', 'Apakah anda yakin akan menghapus data ini?');
        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'nama_product' => 'required|unique:products,nama_produk,' . $id,
            'harga_jual' => 'required|numeric|min:0',
            'harga_beli_pokok' => 'required|numeric|min:0',
            'harga_beli_pokok' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|numeric|min:0',
            'stok_minimal' => 'required|numeric|min:0'
        ], [
            'nama_product.required' => 'Nama product harus diisi',
            'nama_product.unique' => 'Nama product sudah ada',
            'harga_jual.required' => 'Harga jual harus diisi',
            'harga_jual.numeric' => 'Harga jual harus berupa angka',
            'harga_jual.min' => 'Harga jual minimal 0',
            'harga_beli_pokok.required' => 'Harga beli pokok harus diisi',
            'harga_beli_pokok.numeric' => 'Harga beli pokok harus berupa angka',
            'harga_beli_pokok.min' => 'Harga beli pokok minimal 0',
            'kategori_id.required' => 'Kategori harus diisi',
            'kategori_id.exists' => 'Kategori tidak valid',
            'stok.required' => 'Stok harus diisi',
            'stok.numeric' => 'Stok harus berupa angka'
        ]);

        $newRequest = [
                'id' => $id,
                'nama_product' => $request->nama_product,
                'harga_jual' => $request->harga_jual,
                'harga_beli_pokok' => $request->harga_beli_pokok,
                'kategori_id' => $request->kategori_id,
                'stok' => $request->stok,
                'stok_minimal' => $request->stok_minimal,
                'is_active' => $request->is_active ? true : false
        ];

        if (!$id) {
            $newRequest['sku'] = Product::nomorSku();
        }
        Product::updateOrCreate(
            ["id" => $id],
            $newRequest
        );
        toast()->success('Data berhasil disimpan');
        return redirect()->route('master-data.product.index');
        // dd($request->all());
    }

    public function destroy(String $id)
    {
        $product = Product::find($id);
        $product->delete();
        toast()->success('Data berhasi dihapus');
        return redirect()->route('master-data.product.index');

    }
}
