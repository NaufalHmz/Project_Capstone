<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Obat;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request) {
        $sort = $request->query('sort');
        $filterCat = $request->query('kategori');
        $ar_cat = explode('-', $filterCat);

        $keyword = $request->query('keyword');
        // $obat = Obat::all();
        $kategori = Kategori::all();

        $query = new Obat;
        if (!empty($filterCat)) {
            $query = $query->whereIn('kategori_obat_id', $ar_cat);
        }

        if (!empty($keyword)) {
            $query = $query->where('nama_obat', 'LIKE', '%' .$keyword. '%');
        }

        if (!empty($sort) && $sort == 'low-high') {
            $query = $query->orderBy('harga', 'asc');
        } elseif (!empty($sort) && $sort == 'high-low') {
            $query = $query->orderBy('harga', 'desc');
        }

        $data = $query->paginate(6);

        return view('landing-page.shop.index', compact('data', 'kategori', 'keyword', 'filterCat'));
    }

    public function show($id) {
        $obat = Obat::find($id);
        return view('landing-page.shop.show', compact('obat'));
    }
}
