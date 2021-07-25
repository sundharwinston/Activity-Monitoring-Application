<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime;

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

         $time = Activity::get('duration');


        $sum = strtotime('00:00:00');
  
$totaltime = 0;
  
foreach( $time as $element ) {
    // return $element->duration;
      
    // Converting the time into seconds
    $timeinsec = strtotime($element->duration) - $sum;
      
    // Sum the time with previous value
    $totaltime = $totaltime + $timeinsec;
}
  
// Totaltime is the summation of all
// time in seconds
  
// Hours is obtained by dividing
// totaltime with 3600
$h = intval($totaltime / 3600);
  
$totaltime = $totaltime - ($h * 3600);
  
// Minutes is obtained by dividing
// remaining total time with 60
$m = intval($totaltime / 60);
  
// Remaining value is seconds
$s = $totaltime - ($m * 60);
  
// Printing the result
 $Data['TotalHours'] = ("$h:$m:$s");
  

        // return gmdate("H:i:s", 120000);

//         $init = 120000;
// $hours = floor($init / 3600);
// $minutes = floor(($init / 60) % 60);
// $seconds = $init % 60;

// return "$hours:$minutes:$seconds";


// $seconds = 120000;
// $zero    = new DateTime("@0");
// $offset  = new DateTime("@$seconds");
// $diff    = $zero->diff($offset);
// dd("%02d:%02d:%02d", $diff->days * 24 + $diff->h, $diff->i, $diff->s);


// return CarbonInterval::seconds(120000)->cascade()->forHumans();



//         $value = '90060';
// $dt = Carbon::now();
// $days = $dt->diffInDays($dt->copy()->addSeconds($value));
// $hours = $dt->diffInHours($dt->copy()->addSeconds($value)->subDays($days));
// $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($value)->subDays($days)->subHours($hours));
// return CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();


        // $Data['TotalHours'] = DB::table('activities')->sum(DB::raw("TIME_TO_SEC(total_time)");
         // $Data['TotalHours'] = Activity::select('name')->sum('duration');

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
