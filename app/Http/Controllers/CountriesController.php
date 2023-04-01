<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "All Countries";
        $data['countries'] = Country::all();
        return view('countries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Add Country";
        return view('countries.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:countries|max:255',
        ]);
        $title = $request->input('title');
        $url_title = Str::slug($title, '_');

        $info = array(
            'title' => $title,
            'url_title' => $url_title,
        );
        $country = Country::create($info);
        if (!empty($country)) {
            return redirect(route('countries.create'))->with('message', 'Country has been added.');
        } else {
            return redirect()->back()->with('message', 'Error! Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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