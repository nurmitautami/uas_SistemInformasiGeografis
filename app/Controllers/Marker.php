<?php

namespace App\Controllers;

class Marker extends BaseController
{
    public function index()
    {
        $data['title'] = 'Marker';
        return view('Marker/IndexView',$data);
    }
}
