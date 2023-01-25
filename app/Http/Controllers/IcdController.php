<?php

namespace App\Http\Controllers;

use App\Models\Icd;
use Illuminate\Http\Request;

class IcdController extends Controller
{

    

    public function icd(){
        $data = Icd::where('name_id', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }

    public function nama($name_id){
        $data = Icd::where('name_id', $name_id)->where('code', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }
}
