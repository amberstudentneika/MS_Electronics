<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    //
    function createview(){
        return view('admin.create');
    }

    function create(Request $request){

        $data =DB::table('products')->where('ProductMNum','=',$request->pmnumber)->count();
//       dd($data);
        if($data>0){
            $err=" Model number already exist in system";
            session()->put('msg',$err);
        }
        else {
            $imageName = time().'.'.$request->pimage->extension();
            $request->pimage->move(public_path('product_images'), $imageName);

            /* Store $imageName name in DATABASE from HERE */

            DB::Table('products')->insert([
        'ProductImg' => $imageName,
        'ProductType' => $request->ptype,
        'ProductMNum' => $request->pmnumber,
        'ProductBrand' => $request->pbrand,
        'ProductNm' => $request->pname,
        'ProductCst' => $request->pcost,
        'ProductDesc' => $request->pdesc
        ]);
//         dd($data);
        }
        return view('admin.create');

    }

    function view()
    {
        $data = DB::table('products')->get();
        return view('admin.view',compact('data'));
        }
//
    function edit($id)
    {
        $data = DB::table('products')->where('ProductID', '=', $id)->get();
//       dd($data);
        foreach ($data as $info) {
            $a = $info->ProductNm;
            $b = $info->ProductType;
            $c = $info->ProductMNum;
            $d = $info->ProductBrand;
            $e = $info->ProductCst;
            $f = $info->ProductDesc;
            $g = $info->ProductImg;

        }

        return view('admin.edit',['id'=>$id, 'pname'=>$a, 'ptype'=>$b, 'pmnumber'=>$c, 'pbrand'=>$d, 'pcost'=>$e, 'pdesc'=>$f, 'pimage'=>$g ]);
}

        function update(Request $request){
        DB::table('products')->where('ProductID','=',$request->id)->update([
            'ProductImg' => $request->pimage,
            'ProductType' => $request->ptype,
            'ProductMNum' => $request->pmnumber,
            'ProductBrand' => $request->pbrand,
            'ProductNm' => $request->pname,
            'ProductCst' => $request->pcost,
            'ProductDesc' => $request->pdesc
        ]);
        return redirect(route('view'));
    }
}
