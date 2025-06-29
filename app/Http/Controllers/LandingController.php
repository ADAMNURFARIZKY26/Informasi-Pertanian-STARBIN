<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosmed;

class LandingController extends Controller
{
    public function welcome() {
        $sosmeds = Sosmed::all();
        return view('welcome', compact('sosmeds'));
    }
    public function tentangKami() {
        return view('sub_page_landing/tentangKami');
    }
    public function detaiStaf() {
        return view('sub_page_landing/sub_sub_page/detailStaf');
    }
    public function listProduk() {
        return view('sub_page_landing/list-product');
    }
    public function detailProduk() {
        return view('sub_page_landing/detail-product');
    }
    public function organik() {
        return view('sub_page_landing/organik');
    }
    public function sayuranOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/jenis-jenis/sayuran');
    }
    public function buahOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/jenis-jenis/buah');
    }
    public function herbalOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/jenis-jenis/herbal');
    }
    public function panganOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/jenis-jenis/pangan');
    }
    public function persiapanOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/langkah-langkah/persiapan');
    }
    public function penyemaianOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/langkah-langkah/penyemaian');
    }
    public function penanamanOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/langkah-langkah/penanaman');
    }
    public function perawatanOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/langkah-langkah/perawatan');
    }
    public function pengendalianOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/langkah-langkah/pengendalian');
    }
    public function panenOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/langkah-langkah/panen');
    }
    public function pengolahanOrganik() {
        return view('sub_page_landing/sub_sub_page/organik/langkah-langkah/pengolahan');
    }
    public function hidroponik() {
        return view('sub_page_landing/hidroponik');
    }
    public function sayuranDaunHidrophonik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/jenis-jenis/sayurandaun');
    }
    public function sayuranBuahHidrophonik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/jenis-jenis/sayuranbuah');
    }
    public function herbalHidroponik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/jenis-jenis/herbal');
    }
    public function persiapanHidrophonik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/langkah-langkah/persiapan');
    }
    public function penyemaianHidrophonik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/langkah-langkah/penyemaian');
    }
    public function pemeliharaanHidrophonik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/langkah-langkah/pemeliharaan');
    }
    public function pengendalianHidrophonik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/langkah-langkah/pengendalian');
    }
    public function panenHidrophonik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/langkah-langkah/panen');
    }
    public function PascaPanenHidrophonik() {
        return view('sub_page_landing/sub_sub_page/hidrophonik/langkah-langkah/pascapanen');
    }
    public function blog() {
        return view('sub_page_landing/blog');
    }
    public function detailBlog() {
        return view('sub_page_landing/sub_sub_page/detailblog');
    }
    public function Kontak() {
        return view('welcome');
    }
}