<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseStoreRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }
    public function rules(): array
    {
        if(Request()->isMethod('post')){
            return [
             'price'=>'required|string|max:255',
             'distance'=>'required|string|max:255',
             'image'=>'required|simagemmimes:jpg,jpeg,png,gif,svg|ax:22048',
             'is_avilaible'=>'required|string|max:255',
             'h_phone'=>'required|string|max:255',
             'name1'=>'required|string|max:255',
             'image1'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
             'name2'=>'required|string|max:25',
             'image2'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
             'name3'=>'required|string|max:255',
             'image3'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
             'name4'=>'required|string|max:255',
             'image4'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048 ',
             'name5'=>'required|string|max:255',
             'image5'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
             'name6'=>'required|string|max:255',
             'image6'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ];
        }
        else{
            return [
             'price'=>'required|string|max:255',
             'distance'=>'required|string|max:255',
             'image'=>'required|simagemmimes:jpg,jpeg,png,gif,svg|ax:22048',
             'is_avilaible'=>'required|string|max:255',
             'h_phone'=>'required|string|max:255',
             'name1'=>'required|string|max:255',
             'image1'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
             'name2'=>'required|string|max:25',
             'image2'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
             'name3'=>'required|string|max:255',
             'image3'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
             'name4'=>'required|string|max:255',
             'image4'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048 ',
             'name5'=>'required|string|max:255',
             'image5'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
             'name6'=>'required|string|max:255',
             'image6'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ];
        }
    }
    public function message(){
        if(Request()->isMethod('post')){
           return [
            'price'=>'price is required',
            'distance'=>'distance is required',
            'image'=>'image is required',
            'is_avilaible'=>'is_avilaible is required',
            'h_phone'=>'h_phone is required',
            'name1'=>'name1 is required',
            'image1'=>'image1 is required',
            'name2'=>'name2 is required',
            'image2'=>'image2 is required',
            'name3'=>'name3 is required',
            'image3'=>'image3 is required',
            'name4'=>'name4 is required',
            'image4'=>'image4 is required',
            'name5'=>'name5 is required',
            'image5'=>'image5 is required',
            'name6'=>'name6 is required',
            'image6'=>'image6 is required',
           ];
        }
        else{
            return [
                'price'=>'price is required',
                'distance'=>'distance is required',
                'image'=>'image is required',
                'is_avilaible'=>'is_avilaible is required',
                'h_phone'=>'h_phone is required',
                'name1'=>'name1 is required',
                'image1'=>'image1 is required',
                'name2'=>'name2 is required',
                'image2'=>'image2 is required',
                'name3'=>'name3 is required',
                'image3'=>'image3 is required',
                'name4'=>'name4 is required',
                'image4'=>'image4 is required',
                'name5'=>'name5 is required',
                'image5'=>'image5 is required',
                'name6'=>'name6 is required',
                'image6'=>'image6 is required',
               ];
        }
    }
}
