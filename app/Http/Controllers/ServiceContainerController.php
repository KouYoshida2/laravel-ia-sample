<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceContainerController extends Controller
{
    public function index()
    {
        // dd('test');
        app()->bind('testservice', function () {
            return 'サービステストです。';
        });
    }
}
