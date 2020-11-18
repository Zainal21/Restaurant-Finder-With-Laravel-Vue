<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Validator;

class RestaurantController extends Controller
{
    public function index($id = false)
    {
        if($id){
           $data = Restaurant::findOrfail($id);
           return JSONFormatter::success($data,'Data Restaurant Detail Berhasil diambil');
        }else{
            $data = Restaurant::all();
           return JSONFormatter::success($data,'Data Restaurant Berhasil Diambil');
        }
    }

    public function save(Request $req, $id= false)
    {
        $error = Validator::make(request()->all(),[
            'name' => 'required',
            'address' => 'required',
            'rating' => 'required',
        ]);

        if($error->fails()){
            return JSONFormatter::error($error->errors()->all(),404);
        }else{
          if($id){
            $data = Restaurant::where(['id' => $id])->update([
                'name' => $req->name,
                'address' => $req->address,
                'rating' => $req->rating,
            ]);
            return JSONFormatter::success($data,'Data Restaurant Berhasil Diubah');
        }else{
                $data = Restaurant::create([
                    'name' => $req->name,
                    'address' => $req->address,
                    'rating' => $req->rating,
                ]);
                return JSONFormatter::success($data,'Data Restaurant Berhasil Diambil');
          }
        }
    }



    public function destroy($id)
    {
        if(!$id){
            return JSONFormatter::error('Id Tidak ditemukan','Terjadi kesalahan',404);
        }else{
            $data = Restaurant::destroy($id);
            return JSONFormatter::success($data,'Data Restaurant Berhasil Dihapus');
        }
    }
}
