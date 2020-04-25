<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\listing;

class ListingsController extends Controller
{


      public function __construct()
      {
        $this->middleware('auth',['except'=>['index','show']]);
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings=listing::orderBy('created_at','desc')->get();
        return view('listings')->with('listings',$listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createlisting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

          'name'=>'required',
          'email'=>'required',
        ]);

        $listing =new listing;

        $listing->name=$request->input('name');
        $listing->address=$request->input('address');
        $listing->website=$request->input('website');
        $listing->email=$request->input('email');
        $listing->phone=$request->input('phone');
        $listing->bio=$request->input('bio');
        $listing->user_id=Auth()->user()->id;
        $listing->save();

        return redirect('/dashboard')->with('success','listing created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $listing=listing::find($id);
      return view('showlisting')->with('listing',$listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing=listing::find($id);
        return view('editlisting')->with('listing',$listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $listing=listing::find($id);
      $listing->name=$request->input('name');
      $listing->address=$request->input('address');
      $listing->website=$request->input('website');
      $listing->email=$request->input('email');
      $listing->phone=$request->input('phone');
      $listing->bio=$request->input('bio');
      $listing->user_id=Auth()->user()->id;
      $listing->save();

      return redirect('/dashboard')->with('success','listing updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing=listing::find($id);
        $listing->delete();

        return redirect('/dashboard')->with('success','listing Deleted');

    }
}
