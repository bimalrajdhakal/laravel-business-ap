<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=> ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dispalying all listing to home page
        $listings = Listing::orderBy('created_at','desc')->get();
        return view('showAllListing')->with('listings',$listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create listing
        return view('createList');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 
           validating data and storing to db
        */
        // validating data 
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'email',
            'phone' => 'required|numeric'
        ]);

        // create listing

        $listing = new Listing();
        $listing->name = $request->input('name');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        $listing->user_id = auth()->user()->id;
        $listing->save();

        return redirect('/dashboard')->with('success','Listing Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show individual listing
        // populating data to edit HTML form 
        $listing = Listing::find($id);
        return view('showList')->with('listing',$listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // populating data to edit HTML form 
        $listing = Listing::find($id);
        return view('editList')->with('listing',$listing);
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
        // updating data to db
        // validating data 
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'email',
            'phone' => 'required|numeric'
        ]);

        // create listing

        $listing = Listing::find($id);
        $listing->name = $request->input('name');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        // $listing->user_id = auth()->user()->id;
        $listing->save();

        return redirect('/dashboard')->with('success','Listing Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // deleting listing from db
        $listing = Listing::find($id);
        $listing->delete();
        return redirect('/dashboard')->with('success','Listing Deleted successfully!');
    }
}
