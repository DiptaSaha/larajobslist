<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the All Listing.
     */
    public function index()
    {
        return view('listings.index',[
            'heading'=>'Latest Listings',
            'listings'=>Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField = $request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
            'tags'=>'required',
            'email'=>['required','email'],
            'website'=>'required',
            'description'=>'required',
            

        ]);
        Listing::create( $formField);
        return redirect('/');
    }

    /**
     * Display the specified  Single Listing.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing'=>$listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
