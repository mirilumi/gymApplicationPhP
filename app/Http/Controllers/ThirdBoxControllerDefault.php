<?php

namespace App\Http\Controllers;

use App\DefaultProgram;
use App\ThirdBoxTableDefault;
use Illuminate\Http\Request;

class ThirdBoxControllerDefault extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save($id,Request $request)
    {
        $thirdBox = ThirdBoxTableDefault::create($request->all());
        $defaultProgram = DefaultProgram::find($id);
        $defaultProgram->third_box_id = $thirdBox->id;
        $defaultProgram->save();
        return redirect('/admin/defaultProgramm/'.$id);
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
     * Display the specified resource.
     *
     * @param  int  $thirdBoxId
     * @param  int  $defaultProgramId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editThirdBox($thirdBoxId,$defaultProgramId,Request $request)
    {
        $thirdBox = ThirdBoxTableDefault::find($thirdBoxId);
        $thirdBox->description = $request->get('description');
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().$request->get('user_id').'.'.$extension;
            $file->move(public_path('img/'), $filename);
            $thirdBox->image = $filename;
        }
        $thirdBox = $thirdBox->save();
        return redirect('/admin/defaultProgramm/'.$defaultProgramId);
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
