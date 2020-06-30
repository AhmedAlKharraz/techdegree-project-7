<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(TodoResource::collection(Todo::all(), 200));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->toArray(),[
            'name' => 'required',
            'status' => 'required'
        ]);

        return response(new TodoResource(Todo::create($validate->validate())), 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $id)
    {
        return response(new TodoResource($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $id)
    {
        $validate = Validator::make($request->toArray(),[
            'name' => 'required',
            'status' => 'required'
        ]);

        $id->update($validate->validate());
        return response(new TodoResource($id), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $id)
    {
        
        $id->delete();
        return response(null, 204);

    }
}
