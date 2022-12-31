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
                    <h6 class="fs-17 fw-semi-bold mb-0">Articles</h6>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="example" class="table display table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Patented Status</th>
                            <th>No. of views</th>
                            <th>Uploaded Article</th>
                            <th>Published Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$article->title }}</td>
                                <td>{{$article->description }}</td>
                                <td>
                                    @if($article->patented_status == 1) <span class="badge bg-green">Patented</span> @else <span class="badge bg-yellow">Not Patented</span> @endif
                                </td>
                                <td>{{$article->views_count }}</td>
                                <td>{{$article->uploaded_article_url }}</td>
                                <td>
                                    @if($article->publish_status == 1) <span class="badge bg-green">Publish</span> @else <span class="badge bg-yellow">Not Publish</span> @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Dropdown
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                @if($article->status != 1)<li><a href="{{route('admin.research.approve',$article->uuid)}}" class="btn btn-outline-success btn-sm" style="width: 100%; margin-bottom:2px" >Approve</a></li>@endif
                                                <li><a href="{{route('admin.research.decline',$article->uuid)}}" class="btn btn-outline-danger btn-sm me-1" style="width: 100%" >Decline</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $articles->links() }}
            </div>
        </div>


    </div>
</div>
<!--/.body content-->
@endsection
@push('js')
       <!-- <script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script> -->
@endpush
