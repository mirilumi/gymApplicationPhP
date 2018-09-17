<?php

namespace App\Http\Controllers;

use App\SecondBox;
use App\User;
use App\UserTable;
use Illuminate\Http\Request;

use App\Http\Requests;

class SecondBoxController extends Controller
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
        SecondBox::create($request->all());
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
        $secondBox = SecondBox::find($id);
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
        $secondBox = SecondBox::find($id);
        $secondBox->title = $request->get('title');
        $secondBox->page_nr = $request->get('page_nr');
        $secondBox->description = $request->get('description');
        $secondBox->save();
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
