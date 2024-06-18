<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class externController extends Controller
{
    public function search($low=null, $up=null){
        $houses= House::whereBetween('price',[$low,$up])->get();
        if($houses){
            return response()->json([
                'houses'=>$houses,
            ],200);
        }
    }
    public function orders(){
         $orders=DB::table('orders')
         ->join('houses','orders.houseID','=','houses.id')
         ->select('orders.id as id','orders.name as name','orders.phone as phone'
                  ,'orders.nb_day as nb_day','orders.from as from','orders.to as to',
                   'orders.is_done as is_done','orders.is_confirmed as is_confirmed',
                   'houses.id as H_id','houses.h_phone as h_phone')
         ->get();
         if($orders){
             return response()->json([
                'orders'=>$orders,
             ],200);
         }
        
        }
    public function deleteOrder($id=null){
      $is_deleted=DB::table('orders')->where('id',$id)->delete();
      if($is_deleted){
        return 'deleted with succes';
      }
    } 
    public function  confirmationTest($id){
         $is_confirmed=Order::where('id',$id)->first();
         if($is_confirmed['is_confirmed'] =="confirmed"){
           Order::where('id',$id)->update([
                'is_confirmed' => "unconfirmed"
            ]);
         
         }
         else{
            Order::where('id',$id)->update([
                'is_confirmed' => "confirmed"
            ]);
        
         }
    }
    public function doneOrder($id){
        $to_done=Order::where('id',$id)->first();
        if($to_done){
            if($to_done['is_done']=="non"){
              Order::where('id',$id)->update([
                  'is_done'=>'yes',
              ]);
              return 'now: yes';
            }
            else{
                Order::where('id',$id)->update([
                    'is_done'=>'non',
                ]);
                return 'now: non';
            }
        }
        else{
          return 'order with this id is not found';
        }
        return $to_done;
    }
    public function checkAdmin(Request $request){
        $data=$request->post();
        $credentials=[
            'email'=>$data['email'],
            'password'=>$data['password'],
        ];
        $is_exist= Auth::attempt($credentials);
        if ($is_exist) {
            $admin=User::where('email',$data['email'])->first();
           return [
                'message'=>'succes',
                'name'=>$admin['name'],
           ];
        }
        else{
            return 'failed';
        }
        //    User::create([
        //     'name'=>'adamlaila',
        //     'email'=>$data['email'],
        //     'password'=>Hash::make($data['password']),
        //    ]);
        //    return $data['email'];
    }
}
