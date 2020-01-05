@extends('admin.Layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="main-container">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Account Settings
                                </div>

                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="col-md-4 mb-4">
                                            <div>Profile Information</div>
                                            <div class="text-muted small">These information are visible to the public.</div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Name</label>
                                                        <h3 class="text-muted">{{$user->name}} {{$user->last_name}}</h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Username</label>
                                                        <h3 class="text-muted">{{$user->email}}</h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Email Address</label>
                                                        <h3 class="text-muted">{{$user->email}}</h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Account created at</label>
                                                        <h3 class="text-muted">{{date_format($user->created_at,'F m d H:i:s')}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">User roles</label>
                                                        <form>
                                                            @foreach($roles as $role)
                                                                <div class="custom-control custom-checkbox mt-1 offset-1">
                                                                    @csrf
                                                                    <input class="custom-control-input user-roles" data_role_id={{$role->id}}  data_user_id={{$user->id}} id="role_id_{{$role->id}}" type="checkbox" name="role_id_{{$role->id}}" @if(in_array($role->role, $user_has_role)) checked @endif>

                                                                    <label class="custom-control-label" for="role_id_{{$role->id}}">
                                                                        {{$role->role}}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('admin/adminDashboardScript/sidebar-users.js')}}"></script>
@endsection
