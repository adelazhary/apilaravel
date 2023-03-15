<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;
use App\Traits\GeneralTrats;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use GeneralTrats;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = categories::select('id','name_'.app()->getLocale() . ' as name')->get();

        return response()->json([$cat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getCategori(Request $request)
    {
        $cat = categories::select()->find($request -> id);

        if(!$cat)
            return $this->returnError('001','not found');

        return $this->returnData('Category',$cat);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoriesRequest $request, categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories)
    {
        //
    }
}
