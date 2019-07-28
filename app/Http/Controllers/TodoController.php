<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task=Todo::paginate(3);
        return request()->json(200,$task);
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
    public function store(TodoRequest $request)
    {
       
        $todo=Todo::create($request->all());
        if ($todo)
        {
            $task=Todo::paginate(3);
            return request()->json(200,$task);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo,$task)
    {
                    $data=Todo::find($task);
                    return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
//        Log::info("you are in");
//        $val=Todo::updated($task);
//        return $val;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $task)
    {
        $var = Todo::find($task);

            Log::info($task);

          $var->name = $request->input('name');
             $var->save();
        return $this->_result();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo,$task)
    {
             $id=Todo::find($task);
        if ( $id->destroy($task))
            return $this->_result();
        else
            response()->json(425,['delete'=>'unable to delete']);
    }
    public function _result()
    {
        $task=Todo::paginate(3);
        return request()->json(200,$task);
    }
}
