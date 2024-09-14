<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{

    public function denah() {
        return view('tentang.denah');
    }

    public function hak() {
        return view('tentang.hak');
    }

    public function maklumat() {
        return view('tentang.maklumat');
    }

    public function mutu() {
        return view('tentang.mutu');
    }

    public function profil() {
        return view('tentang.profil');
    }

    public function sambutan() {
        return view('tentang.sambutan');
    }

    public function standard() {
        return view('tentang.standard');
    }

    public function struktur() {
        return view('tentang.struktur');
    }
}
