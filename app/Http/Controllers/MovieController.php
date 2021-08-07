<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class MovieController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Movies = Movie::
                    select('id','name','image')
                    ->get();
        return $this->sendResponse($Movies,"Get movies successfully");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $Movie = new Movie();
            $Movie->name = $request->input('name');
            $Movie->image = $request->input('image');
            $Movie->save();

            return $this->sendResponse($Movie,"Movie created successfully");
        } catch (Exception $e) {
            return $this->sendError("Error", 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Movie = Movie::find($id);

        if(!$Movie){
            return $this->sendError("Movie not found");
        }

        return $this->sendResponse($Movie,"Obtained movie successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            // $Movie = Movie::findOrFail($id);
            // $Movie->name = $request->input('name');
            // $Movie->image = $request->input('image');

            // $Movie->save();

            return $this->sendResponse($request,"Movie created successfully");
        } catch (Exception $e) {
            return $this->sendError("Error", 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::destroy($id);   
        return $this->sendResponse([], "Deleted movie successfully");
    }
}
