@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')

<!--/.Content Header (Page header)-->
<div class="body-content">
    @include('backend.layouts.common.validation')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">Events</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
{{--                        <a href="#" class="action-item"><i class="ti-reload"></i></a>--}}
{{--                        <a href="{{route('admin.plans.create')}}" class="btn btn-success btn-sm" ><i class="fa fa-plus-circle"></i>&nbsp;Add </a>--}}

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="example" class="table display table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Event Title</th>
                            <th>Event Link</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{$event->event_title }}</td>
                                <td>{{$event->link }}</td>
                                <td>{{ date('d-M-Y',strtotime($event->start_date)) }}</td>
                                <td>{{ date('d-M-Y',strtotime($event->end_date)) }}</td>
                                <td>
                                    Is Free : <span class="badge bg-green">Free</span> <br>
                                    Approved: @if($event->status == 1)<span class="badge bg-green">Approved</span> @else <span class="badge bg-yellow">Not Published</span> @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Dropdown
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                @if($event->status != 1)<li><a href="{{route('admin.event.approve',$event->uuid)}}" class="btn btn-outline-success btn-sm" style="width: 100%; margin-bottom:2px" >Approve</a></li>@endif
                                                <li><a href="{{route('admin.event.decline',$event->uuid)}}" class="btn btn-outline-danger btn-sm me-1" style="width: 100%" >Decline</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $events->links() }}
            </div>
        </div>


    </div>
</div>
<!--/.body content-->
@endsection
@push('js')
       <!-- <script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script> -->
@endpush
