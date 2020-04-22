<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function getAbout() {
        return view('about');
    }
    public function getContact() {
        return view('contact');
    }
    public function getProjectList() {
        return view('pages/project');
    }
    public function getBlog() {
        return view('pages/blog');
    }
}
