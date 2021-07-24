<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data['Activity'] = Activity::get();
        // $Data['TotalHours'] = DB::table('activities')->sum(DB::raw("TIME_TO_SEC(total_time)");
         $Data['TotalHours'] = Activity::select('name')->sum('duration');

        return view('client.activity.index',$Data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.activity.create');
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
               $UpdatedDate = Activity::where('date','=',request('date'))->first();
            if ($UpdatedDate === null) {
                
                $Activity = new Activity;
                $Activity->name = $request->name;   
                $Activity->date = $request->date;   
                $Activity->activity = $request->activity;   
                $Activity->duration = $request->duration;   
                $Activity->save();    
                return redirect(action('client\ActivityController@index'))->with('success',['Activity List','Added Successfully']);
            }else{
                return back()->with('sorry','Today Activity Added.Go and Edit you Activity');
            }
        } catch (Exception $e) {
            return $e;
            return back()->with('sorry','Something Went Wrong');
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
        $Data['Activity'] = Activity::findorfail($id);
        return view('client.activity.create',$Data);
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
            $Activity = Activity::findorfail($id);
            $Activity->name = $request->name;   
            $Activity->date = $request->date;   
            $Activity->activity = $request->activity;   
            $Activity->duration = $request->duration;   
            $Activity->save();   
            return redirect(action('client\ActivityController@index'))->with('success',['Activity List','Updaetd Successfully']);
        } catch (Exception $e) {
            return back()->with('sorry','Something Went Wrong');
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
        try {
            $Activity = Activity::findorfail($id)->delete();
            return redirect(action('client\ActivityController@index'))->with('success',['Activity List','Deleted Successfully']);
        } catch (Exception $e) {
            return back()->with('sorry','Something Went Wrong');
        }
    }

}
