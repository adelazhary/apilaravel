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
        return $this->getCurrent();
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
    public function changeStatus(request $request)
    {
        $category = categories::select()->find($request->id);
        if(!$category)
            return $this->returnData('001','this category not exist');

        return $this->returnData('category',$category);
    }

    /**
     * Display the specified resource.
     */
    public function changStatus(request $request)
    {
        categories::where('id',$request -> id) -> update(['status' => $request -> active]);

        return $this -> returnSuccess('002','the status has been changed');
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
