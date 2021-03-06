<?php

namespace App\Http\Controllers;

use App\Client;
use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
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
        $client = new Client();
        $event = new Event;
        $this->validate(
            $request,
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                "dob"=>"required",
                'basicInfo' => 'required',
                'profpic'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $image = $request->file('profpic');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/img/clients');

        $image->move($destinationPath, $input['imagename']);

        // Create an event  on receiving DOB
        $event->name = $request->get('name');
        $event->details = $request->get('name')." birthday";
        $dob = Carbon::parse($request->get('dob'));
        $current_year = Carbon::now()->year;
        $day = $dob->day;
        // return $dob;
        $month = $dob->month;
        $new_event_date = Carbon::create($current_year, $month, $day, 0);
        $event_from = $new_event_date->toTimeString();
        $event_to = $new_event_date->toTimeString();

        //Pluggin event variables
        $event->event_date = $new_event_date;
        $event->time_from = $event_from;
        $event->time_to = $event_to;

        //
        $client->name = $request->get('name');
        $client->phone = $request->get('phone');
        $client->email = $request->get('email');
        $client->basicInfo = $request->get('basicInfo');
        $client->profpic=$input['imagename'];
        $client->dob=$request->get("dob");

        $client->save();
        //Save event
        $event->save();

        return redirect()->back()->with('success', 'Client saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($client)
    {
        //
        $clients = Client::find($client);

        return view('clients.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $client = Client::find($id);
        if (request('profpic')) {
        // code...
        $this->validate($request, [

          'profpic'=>'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $image = $request->file('profpic');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/img/clients');

        $image->move($destinationPath, $input['imagename']);
        $client->update(['profpic'=>$input['imagename']]);
      }else{

        $this->validate(
            $request,
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'basicInfo' => 'required',
                "dob"=>"required"
            ]
        );

        $client->name = $request->get('name');
        $client->phone = $request->get('phone');
        $client->email = $request->get('email');
        $client->basicInfo = $request->get('basicInfo');
        $client->dob=$request->get("dob");

        $client->save();
      }

        return redirect()->back()->with('success', 'Client Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //

        if ($client->delete()) {

            return redirect()->back()->with('success', 'Client Deleted successfully');

        } else {

            return redirect()->back()->with('success', 'an unespected error occured');

        }
    }
}
