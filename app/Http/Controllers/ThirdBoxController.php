<?php

namespace App\Http\Controllers;

use App\ThirdBoxTable;
use App\User;
use Illuminate\Http\Request;

class ThirdBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        ThirdBoxTable::create($request->all());
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().$request->get('user_id').'.'.$extension;
            $file->move(public_path('img/'), $filename);
            $thirdBoxTable = ThirdBoxTable::where('user_id', $request->get('user_id'))->get()[0];
            $thirdBoxTable->image = $filename;
            $thirdBoxTable->save();
        }

        return redirect('admin/user/'. User::find($request->get('user_id'))->id.'/'.$request->page_nr);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $secondBox = ThirdBoxTable::find($id);
        return view('cars.show', array('cars' => $secondBox));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id,Request $request)
    {
        $thirdBox = ThirdBoxTable::find($id);
        $thirdBox->description = $request->get('description');
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().$request->get('user_id').'.'.$extension;
            $file->move(public_path('img/'), $filename);
            $thirdBox->image = $filename;
        }
        $thirdBox->page_nr = $request->get('page_nr');
        $thirdBox->save();
        return redirect('admin/user/'. User::find($request->get('user_id'))->id.'/'.$request->page_nr);
    }
    public function thirdBoxEdit($id,Request $request)
    {
        $thirdBox = ThirdBoxTable::find($id);
        $thirdBox->description = $request->get('description');
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().$request->get('user_id').'.'.$extension;
            $file->move(public_path('img/'), $filename);
            $thirdBox->image = $filename;
        }
        $thirdBox->save();
        return redirect('admin/user/'. User::find($request->get('user_id'))->id.'/'.$request->page_nr);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }


}
