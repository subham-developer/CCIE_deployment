<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use Validator;
use App\Event;
use Carbon\Carbon;
use App\Ccie;
use App\Rack;
use Illuminate\Support\Facades\Auth;


class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = [];
        $data = Event::all();
        $userId = Auth::user()->id;


        // Getting User Id
        if(Auth::user()->role_id == 1){
            $url = '/edit/calendar/';
        }else{
            $url = '#';
        }

        if($data->count()) {
            foreach ($data as $key => $value) {
                if($value->user_id != $userId)
                {
                    $color = "#d9534f";
                }elseif(Auth::user()->role_id == 1){
                    $color = "#668c2d";
                }else
                {
                    $color = "#3a87ad";
                }
                $events[] = Calendar::event(
                    $value->title,
                    false,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                    null,
                    // Add color and link on event
                        [
                            'color' => $color,
                            'url' => $url. $value->id,
                        ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);


        // dd($clientList);
        return view('Testing.CalendarView',compact('calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ccie_track =  Ccie::where('status', 1)->get();
        $racks =  Rack::where('status', 1)->get();
        // dd($ccie_track);
        return view('Testing.AddCalendar', compact('ccie_track', 'racks'));
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
        $this->validate($request,[
            // 'title' => 'required',
            // 'color' => 'required',
            'ccie' => 'required',
            'rack' => 'required',
            'start_date' => 'required',
            // 'end_date' => 'required',
        ]);

        // if($validator->fails())
        // {
        //     return \Redirect::back()->withErrors($validator)->withInput();
        // }
        // dd($request->start_date);
        // $new_start_date = Carbon::parse($request->start_date)->addHour(4)->toDateTimeString();
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->start_date)->addHour(4)->toDateTimeString();
        $totalDuration =  Carbon::parse($request->start_date)->diffInHours($end_date);
        // print_r($start_date);
        // print_r($end_date);
        // exit();

        // First step if user input is for slot booking is before 4 hours.
        $currentTime = Carbon::now()->addHour(3)->toDateTimeString();
        $totalDurationOfUserInput =  Carbon::now()->diffInHours($start_date); 
        // dd(Carbon::Today());


        // Checking if same slot is already booked
        $gettingBookedSlots = Event::where('rack_id', $request->rack)->where('start_date', $start_date)->count();
        if($gettingBookedSlots > 0){
            return redirect()->back()->with('message-error', 'This slot has already been booked')->withInput();
        }

        // $officialDate = Carbon::now()->toRfc2822String();
        // dd($gettingBookedSlots);
        // $gettingBookedSlotBetweenDates = Event::where('rack_id', $request->rack)->whereBetween('end_date', [$start_date, $end_date])->orderBy('end_date','DESC')->get();

        // second check of a users input startdate
        $gettingBookedSlotBetweenDatesWithStartDate = Event::where('rack_id', $request->rack)->whereBetween('start_date', [$start_date, $end_date])->orderBy('end_date','DESC')->get();
        if(!$gettingBookedSlotBetweenDatesWithStartDate->isEmpty()){
            return redirect()->back()->with('message-error', 'You cannot select this slot')->withInput();
        }
            // dd($gettingBookedSlotBetweenDatesWithStartDate);
        // if(count($gettingBookedSlots) ){
        //     return redirect()->back()->with('message-error', 'This slot has already been booked');
        // }
        // second check of a users input startdate
        $gettingBookedSlotBetweenDatesWithEndDate = Event::where('rack_id', $request->rack)->whereBetween('end_date', [$start_date, $end_date])->orderBy('end_date','DESC')->get();
        // dd($gettingBookedSlotBetweenDatesWithEndDate);
        if(!$gettingBookedSlotBetweenDatesWithEndDate->isEmpty()){
            return redirect()->back()->with('message-error', 'You cannot select end this slot')->withInput();
        }
        // print_r($gettingBookedSlotBetweenDates);
        // exit();
        // dd($gettingBookedSlotBetweenDatesWithEndDate);
         
        
        // $bookedSlot = $gettingBookedSlots->start_date;
        // dd($gettingBookedSlots);
        
        // select id  from campaign where ( NOW() BETWEEN start_date AND end_date)

        //Vikash
        // SELECT * FROM shoaib.events WHERE end_date BETWEEN (now()) and  end_date

        
        // Rack Name
        $rack_title = '';
        if($request->rack_id == 1){
            $rack_title = 'Rack 1';
        }
        if($request->rack_id == 2){
            $rack_title = 'Rack 2';
        }
        if($request->rack_id == 3){
            $rack_title = 'Rack 3';
        }

        $events = new Event;
        $events->title = $rack_title;
        // $events->color = $request->color;
        $events->user_id = Auth::user()->id;
        $events->ccie_id = $request->ccie;
        $events->rack_id = $request->rack;
        $events->start_date = $start_date;
        $events->end_date = $end_date;
        $events->save();

        // dd($request->all());
        return redirect('/calendar')->with('success', 'Event Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $eventsList = Event::all();
        return view('Testing.ShowCalendar', compact('eventsList'));

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
        // dd($id);
        $ccie_track =  Ccie::where('status', 1)->get();
        $racks =  Rack::where('status', 1)->get();
        $eventsList = Event::find($id);
        $formated_start_date = Carbon::parse($eventsList->start_date)->format('d/m/Y g:i A');
        $formated_end_date = Carbon::parse($eventsList->end_date)->format('g:i A');
        // format('g:i A')
        // dd($eventsList);
        return view('Testing.EditCalendar', compact('eventsList', 'formated_start_date', 'formated_end_date', 'ccie_track', 'racks', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // dd($request->all());
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->start_date)->addHour(4)->toDateTimeString();

        // Checking if same slot is already booked
        $gettingBookedSlots = Event::where('id', '!=', $request->id)->where('rack_id', $request->rack)->where('start_date', $start_date)->count();
        if($gettingBookedSlots > 0){
            return redirect()->back()->with('message-error', 'This slot has already been booked')->withInput();
        }


        $gettingBookedSlots = Event::where('id', '!=',$request->id)->where('rack_id', $request->rack)->where('start_date', $start_date)->count();
        if($gettingBookedSlots > 0){
            return redirect()->back()->with('message-error', 'This slot has already been booked')->withInput();
        }

        $gettingBookedSlotBetweenDatesWithStartDate = Event::where('id', '!=', $request->id)->where('rack_id', $request->rack)->whereBetween('start_date', [$start_date, $end_date])->orderBy('end_date','DESC')->get();
        if(!$gettingBookedSlotBetweenDatesWithStartDate->isEmpty()){
            return redirect()->back()->with('message-error', 'You cannot select this slot')->withInput();
        }

        // $new_start_date = Carbon::parse($request->start_date)->toDateTimeString();
        // $new_end_date = Carbon::parse($request->start_date)->addHour(4)->toDateTimeString();
        // $new_end_date = Carbon::parse($request->end_date)->format('d/m/Y H:i:s');
        // dd($end_date);
        $this->validate($request,[
            // 'title' => 'required',
            // 'color' => 'required',
            'ccie' => 'required',
            'rack' => 'required',
            'start_date' => 'required',
            // 'end_date' => 'required',
        ]);

        // if($validator->fails())
        // {
        //     return \Redirect::back()->withErrors($validator)->withInput();
        // }
        // dd($request->id);
        $events = Event::find($request->id);
        // $events->title = $request->title;
        $events->ccie_id = $request->ccie;
        $events->rack_id = $request->rack;
        $events->start_date = $start_date;
        $events->end_date = $end_date;
        $events->save();

        // dd($events);
        return redirect('/show/calendar')->with('success', 'Event Updated Successfully');
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
        dd($id);
    }
}
