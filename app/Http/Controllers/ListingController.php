<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class ListingController extends Controller
{
    /**
     * Display a listing of the All Listing.
     */
    public function index()
    {
        return view('listings.index',[
            'heading'=>'Latest Listings',
            'listings'=>Listing::latest()->filter(request(['tag']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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