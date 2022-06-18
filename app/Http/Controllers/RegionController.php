<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
class RegionController extends Controller
{
    //


    public function list(){
        return response()->json(['success'=>true, 'data'=>Region::where('status','=','A')->select('id_reg','description')->get()]);
    }
}
