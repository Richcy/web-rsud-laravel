<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function buttons() {
        return view('admin.buttons');
    }

    public function cards() {
        return view('admin.cards');
    }

    public function utilitiesAnimation() {
        return view('admin.utilities-animation');
    }

    public function utilitiesColor() {
        return view('admin.utilities-color');
    }

    public function utilitiesBorder() {
        return view('admin.utilities-border');
    }

    public function utilitiesOther() {
        return view('admin.utilities-other');
    }

    public function login() {
        return view('admin.login');
    }

    public function register() {
        return view('admin.register');
    }

    public function forgotPassword() {
        return view('admin.forgot-password');
    }

    public function page404() {
        return view('admin.404');
    }

    public function blank() {
        return view('admin.blank');
    }

    public function charts() {
        return view('admin.charts');
    }

    public function tables() {
        return view('admin.tables');
    }

    public function aboutProfile() {
        return view('admin.tentang.profil');
    }

    public function aboutDirectur() {
        return view('admin.tentang.direktur');
    }

    public function aboutOrganization() {
        return view('admin.tentang.organisasi');
    }

    public function aboutSketch() {
        return view('admin.tentang.denah');
    }

    public function aboutQuality() {
        return view('admin.tentang.mutu');
    }

    public function aboutNotice() {
        return view('admin.tentang.maklumat');
    }

    public function aboutStandard() {
        return view('admin.tentang.standard');
    }

    public function aboutRight() {
        return view('admin.tentang.hak');
    }
}
