<?php

namespace App\Http\Controllers;

use App\DefaultProgram;
use App\SecondBoxDefault;
use Illuminate\Http\Request;

class SecondBoxControllerDefault extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $secondBoxId
     * @param  int  $defaultProgramId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editSecondBox($secondBoxId,$defaultProgramId,Request $request)
    {
        $secondBox = SecondBoxDefault::find($secondBoxId);
        $secondBox->title = $request->get('title');
        $secondBox->description = $request->get('description');
        $secondBox = $secondBox->save();
        return redirect('/admin/defaultProgramm/'.$defaultProgramId);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save($id,Request $request)
    {
        $secondBox = SecondBoxDefault::create($request->all());
        $defaultProgram = DefaultProgram::find($id);
        $defaultProgram->second_box_id = $secondBox->id;
        $defaultProgram->save();
        return redirect('/admin/defaultProgramm/'.$id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
