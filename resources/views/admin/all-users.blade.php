@extends('admin.Layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="main-container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <form id="search-users">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="User name" value="" id="search-users-term" required data-validation-required-message="Please enter term">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>

                <div class="container-fluid">
                    <div id="append-founded-users"></div>
                    <div class="row" id="users-list">
                        @foreach($users as $user)
                        <div class="col-md-12">
                            <div class="card p-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="h4 d-block font-weight-normal mb-2">
                                            <i class="icon icon-people"></i>
                                            <a href="{{route('userProfile', $user->id)}}"> {{$user->name}} {{$user->last_name}}</a>
                                        </span>
                                        <div class="col-md-12">
                                            <span class="font-weight-light">Total posts | {{$user->posts->count()}}</span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="font-weight-light">Total comments | {{$user->comments->count()}}</span>
                                        </div>
                                    </div>

                                    <div class="h2 text-muted">
                                        <button class="btn btn-rounded btn-danger">Block user</button>
                                        <button class="btn btn-rounded btn-primary">Unblock</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('admin/adminDashboardScript/sidebar-users.js')}}"></script>
@endsection
