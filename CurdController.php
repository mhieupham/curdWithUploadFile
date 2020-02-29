<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Curd;
use function Sodium\compare;

class CurdController extends Controller
{
    //
    function index(){
        $curd = Curd::paginate(5);
        return view('index',compact('curd'));
    }
    function create(){
        return view('create');
    }
    function store(Request $request){
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg'
        ]);
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$new_name);
        $profile = new Curd([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'image'=>$new_name,
        ]);
        $profile->save();
        return redirect()->route('home')->with('success','Add profile success');
    }
    function show($id){
        $profile = Curd::findOrFail($id);
        return view('show',compact('profile'));
    }
    function edit($id){
        $profile = Curd::findOrFail($id);
        return view('edit',compact('profile'));
    }
    function update(Request $request,$id){
        $image = $request->file('image');
        $profile = Curd::findOrFail($id);
        if($image != null){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg'
            ]);
            $new_image = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$new_image);
            $profile->image = $new_image;
        }else{
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
            ]);
        }
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->save();
        return redirect()->route('curd.show',$id)->with('success','Edit Success');
    }
    function delete($id){
        $profile = Curd::findOrFail($id);
        $profile->delete();
        return redirect()->route('home')->with('success','Delete Success');
    }
}
