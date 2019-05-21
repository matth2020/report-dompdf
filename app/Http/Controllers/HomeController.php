<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\View; 
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reports()
    {
        return view('report');
    }
    public function index()
    {
        //$data = findOut::get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('welcome');
        // If you want to store the generated pdf to the server then you can use the store function
        //$pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('reporst.pdf');
    }
}
