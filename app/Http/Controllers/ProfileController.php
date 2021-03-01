<?php


namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\User;
use App\Ccie;
use Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profiles = User::where('id', Auth::user()->id)->get()->toArray();
        $events = Event::where('user_id', 1)->get();
        // dd($events);
        return view('clientDashboard.Profile', compact('profiles', 'events'));
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
        $profiles = User::find($id);
        $ccies = Ccie::get();
        $events = Event::where('user_id', $id)->get();
        return view('clientDashboard.EditProfile', compact('profiles', 'events', 'ccies', 'id'));
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
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'dob' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'ccie' => 'required|array|max:255',
        ]);
        if($validator->fails())
        {
            // return Response::json(array(
            //     'errors' => $validator->getMessageBag()->toArray()
            // ));
            // dd(123);
            return \Redirect::back()->withErrors($validator)->withInput();
            // withInput(Input::except('password', 'password_confirm'));
            // return redirect('store-clients');
        }
        else 
        {
            // dd($data);
            $datas = User::find($request->id);
            $datas->name = $request->name;
            // $datas->email = $request->email;
            $datas->dob = $request->dob;
            $datas->city = $request->city;
            $datas->country = $request->country;
            $datas->phone = $request->phone;
            // $datas->ccie = $request->ccie;
            $datas->save();

            $ccies = Ccie::find($data['ccie']);
            $datas->ccies()->syncWithoutDetaching($ccies);

            return \Redirect::back()->with('message','New User Added successfully !!');;
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
        //
    }
}
