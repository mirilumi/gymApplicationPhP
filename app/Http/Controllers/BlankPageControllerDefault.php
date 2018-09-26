<?php

namespace App\Http\Controllers;

use App\BlankPage;
use App\DefaultProgram;
use Illuminate\Http\Request;

class BlankPageControllerDefault extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $blankPageId
     * @param  int  $defaultProgramId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editBlankPage($blankPageId,$defaultProgramId,Request $request)
    {
        $blankPage = BlankPage::find($blankPageId);
        $blankPage->description = $request->get('description');
        $blankPage = $blankPage->save();
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
        $blankPage = new BlankPage();
        $blankPage->description = $request->description;
        $blankPage->default_program_id = $id;
        $blankPage->save();
        return redirect('/admin/defaultProgramm/'.$id);
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
