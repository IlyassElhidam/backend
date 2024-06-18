<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Component;
use App\Models\Order;
class HouseUserController extends Controller
{
    public function index()
    {
        $houses=House::get();
        return response()->json([
            'houses'=>$houses,
        ],200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $is_done='non';
        $is_confirmed='non';
        $is_done=Order::create([
            'houseID'=>strip_tags($request->houseID),
            'name'=>strip_tags($request->name),
            'phone'=>strip_tags($request->phone),
            'nb_day'=>strip_tags($request->nb_day),
            'from'=>strip_tags($request->from),
            'to'=>strip_tags($request->to),
            'is_confirmed'=>$is_confirmed,
            'is_done'=>$is_done,
        ]);
        if($is_done){
           return response()->json([
              'message'=>'passed',
           ],200);
        }
        
    }

    public function show($id)
    {
        $house_compos= Component::where('houseId',$id)->get();
        if($house_compos){
          return response()->json([
            'house_compos'=>$house_compos,
          ],200);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
