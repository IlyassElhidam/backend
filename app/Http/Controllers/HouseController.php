<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Component;
use App\Http\Requests\HouseStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    public function index()
    {
      $houses=DB::table('houses')->orderby('distance','desc')->get();
       return response()->json([
           'houses'=>$houses,
       ],200);
    }
 
    public function create()
    {
        //nothing here... with api we dont need to show any view to create with laravel
    }
 
    public function store(Request $request)
     {
        $id=rand(10,10000000000);
        $limit_items=6;
         $is_added1=House::create([
               'id'=>$id,
               'price'=> strip_tags( $request->price),
               'distance'=> strip_tags($request->distance),
               'image'=> $request->file('image')->store('houses'),
               'is_avilaible'=> strip_tags($request->is_avilaible),
               'chambre_nb'=>$request->chambre_nb,
               'category'=>$request->category,
               'h_phone'=> strip_tags($request->h_phone),
         ]);
         Component::create([
             'houseId'=>$id,
             'compo_name'=>$request->name1,
             'image'=>$request->file('image1')->store('houses'),
         ]);
         Component::create([
            'houseId'=>$id,
            'compo_name'=>$request->name2,
            'image'=>$request->file('image2')->store('houses'),
        ]);
        Component::create([
            'houseId'=>$id,
            'compo_name'=>$request->name3,
            'image'=>$request->file('image3')->store('houses'),
        ]);
        Component::create([
            'houseId'=>$id,
            'compo_name'=>$request->name4,
            'image'=>$request->file('image4')->store('houses'),
        ]);
        Component::create([
            'houseId'=>$id,
            'compo_name'=>$request->name5,
            'image'=>$request->file('image5')->store('houses'),
        ]);
       $is_added2= Component::create([
            'houseId'=>$id,
            'compo_name'=>$request->name6,
            'image'=>$request->file('image6')->store('houses'),
        ]);
         
         if($is_added1 && $is_added2){
            return ['message'=>'added with succes!'];
         }
    }
 
    public function show($id)
    {
      //
    }
 
    public function edit($id)
    {
        
    }

 
    public function update(Request $request, $id)
    {
        $to_update=$request->all();
       $is_exist=House::find($id);
       if($is_exist){
            // Storage::delete($is_exist['image']);
            House::where('id',$id)->update([
                'price'=>$request->price,
                'is_avilaible'=>$request->is_avilaible,
            ]);
            return 'done';
       }
       else{
        return 'house not exist';
       }
    // return $to_update['price'];
    }

    public function destroy($id)
    {
        $limit=6;
        for ($i=0; $i < $limit ; $i++) { 
           Component::where('houseID',$id)->delete();
        }
        $is_deleted1=House::where('id',$id)->delete();
        if($is_deleted1){
           return response()->json([
               'message'=>'deleted',
           ],200);
        }
    }
}
