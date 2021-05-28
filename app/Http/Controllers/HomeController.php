<?php

namespace App\Http\Controllers;

use App\BeefPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['items']=DB::table('beef_packages')->select('beef_packages.*','galleries.image')
        ->leftJoin('galleries','beef_packages.id','galleries.beef_packages_id')->get();
        // dd($data);
        return view('pages.home',$data);
    }
}
