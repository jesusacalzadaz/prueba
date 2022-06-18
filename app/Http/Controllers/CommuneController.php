<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
class CommuneController extends Controller
{
    //

    public function list($id_reg){
        return response()->json(['success'=>true, 'data'=>Commune::join('regions','communes.id_reg','=','regions.id_reg')->where('communes.id_reg','=',$id_reg)->where('communes.status','=','A')->where('regions.status','=','A')->select('communes.id_reg','communes.id_com','communes.description')->get()]);
    }
}
