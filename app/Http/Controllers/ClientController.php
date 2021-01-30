<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Client;
use App\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientList = User::paginate(5);
        // dd($clientList);
        return view('AdminDashboard.ViewClientsList',compact('clientList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('AdminDashboard.addClients');
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
        // $rules = array(
        //     "rolename" => "required",
        //     "display_name" => "required",
        // );
        // $validator = Validator::make( $request->all(),$rules);
        
        $password = '1234567';
        $data = array_merge($request->all(), ['password' => $password, 'password_confirmation' => $password]);
        // dd($data);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($validator->fails())
        {
            // return Response::json(array(
            //     'errors' => $validator->getMessageBag()->toArray()
            // ));
            return \Redirect::back()->withErrors($validator);
            // return redirect('store-clients');
        }
        else 
        {
            // $data = New Role();
            // $data->name = $request->rolename;
            // $data->display_name = $request->display_name;
            // $data->created_at = time();
            // $data->updated_at = time();
            // $data->save();
            // return response()->json(array('data'=>$data), 200);
            $registerClient = Client::create($data);
            // dd($registerClient);
            // return redirect()->back()->with('message', 'IT WORKS!');
            return \Redirect::back()->with('message','New User Added successfully !!');;
        }
        // $file= new Child_parent();
        //  $file->user_id=$data['userid'];
        //  $file->child_id=$data['id'];
        //  // $file->document_id= json_encode($document_id); 
        //  $file->save();
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
