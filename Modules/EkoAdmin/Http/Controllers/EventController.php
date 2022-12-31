<?php

namespace Modules\EkoAdmin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\UserPanel\Entities\UserEvent;

class EventController extends Controller
{
    

    public function index()
    {

        $events = UserEvent::where('status','!=','2')->paginate(10);
        return view('ekoadmin::event.index')->with(['events'=>$events]);
    }


    public function approve ($id) {

        try {
            $event = UserEvent::firstWhere('uuid',$id);
            if($event){
                $event->status = '1';
                $event->save();
                Toastr::success('Approved successfully', 'Success');
                return redirect()->route('admin.event.index');
            }

        } catch (\Exception $e) {
            Toastr::error('something went wrong', 'Failed');
            return redirect()->route('admin.event.index');
        }

    }


    public function decline ($id) {
        
        try {
            $event = UserEvent::firstWhere('uuid',$id);
            if($event){
                $event->status = '2';
                $event->save();
                Toastr::success('Decline successfully', 'Success');
                return redirect()->route('admin.event.index');
            }
        } catch (\Exception $e) {
            Toastr::error('something went wrong', 'Failed');
            return redirect()->route('admin.event.index');
        }

    }

}
