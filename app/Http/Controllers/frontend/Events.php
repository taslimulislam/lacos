<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\UserPanel\Entities\UserEvent;

class Events extends Controller
{
    
    public function index(Request $request){

        if($request->keyword!=''){
            $keyword = $request->keyword;
            $events = UserEvent::when($keyword, function ($q) use ($keyword) {
                return $q->where('event_title', 'LIKE', '%' . $keyword . '%');;
            })->where('status','!=','0')->latest()->paginate(12)->appends('keyword', $keyword);
        }else{
            $events = UserEvent::where('status','!=','0')->latest()->paginate(12);
        }


        return view('frontend.pages.events.event',[
            'events' => $events,
            'keyword' => $request->keyword?$request->keyword:''
        ]);
        
    }


    public function eventDetails($id){

        $event = UserEvent::with('speakers')->firstWhere('uuid',$id);

        return view('frontend.pages.events.__event_details',[
           'event' => $event,
        ]);

   }
}
