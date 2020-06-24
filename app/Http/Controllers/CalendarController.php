<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;
use App\Event;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $events = Event::where('user_id', $user_id)->get();
        return view('calendar.index')->with(compact('events'));
    }

    public function lists()
    {
        $user_id = Auth::id();
        $events = Event::where('user_id', $user_id)
                  ->orderBy('id', 'DESC')
                  ->paginate(10);
        return view('calendar.lists')->with(compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::id();
        $item = (new Event())->create($data);
        //$item->user_id = 1;
        $item->save();
        return redirect()->back()->with('success', 'Event is saved');
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
        $event = Event::where('id', $id)->first();
        
        if(empty($event)) {
            return back()
               ->withErrors(['msg'=>'Event not found'])
               ->withInput();
        }

        return view('calendar.edit')->with(compact('event'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::where('id', $id)->first();

        if(empty($event)) {
            return back()
               ->withErrors(['msg'=>'Record not found'])
               ->withInput();
        }

        $data = $request->all();

        $result = $event->update($data);
           if ($result) {
            return redirect() 
                ->route('calendar.edit', $event->id)
                ->with(['success'=>'Saved']);
        }
        else {
            return  back() 
                ->withErrors(['msg'=>'Error'])
                ->withInput();
            
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
        $result = Event::destroy($id);

        if ($result) {
            return redirect()
                   ->route('calendar.lists')
                   ->with(['success' => 'Deleted']);
        } else {
            return back()
                   ->withErrors(['msg' => 'Can\'t to delete']);
        }
    }

    public function search(Request $request)
    {
       $events = Event::where('title', 'like', '%' . $request->name . '%')->paginate(10);

        return view('calendar.lists')->with(compact('events'));
      
    }
}
