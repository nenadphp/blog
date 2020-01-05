@extends('admin.Layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="main-container">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{$users->count() ?: 0}}</span>
                                    <span class="font-weight-light">Total register Users</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-people"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{$posts->count() ?: 0 }}</span>
                                    <span class="font-weight-light">Published posts</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-cloud-download"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">32s</span>
                                    <span class="font-weight-light">Time</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Total Users
                            </div>

                            <div class="card-body p-0">
                                <div class="p-4">
                                    <canvas id="line-chart" width="100%" height="20"></canvas>
                                </div>

                                <div class="justify-content-around mt-4 p-4 bg-light d-flex border-top d-md-down-none">
                                    <div class="text-center">
                                        <div class="text-muted small">Total Posts Published</div>
                                        <div>{{$posts->count()}} Users (40%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">Registered Users</div>
                                        <div>{{$users->count()}} Users ({{(int)$users->count() / 100 }}%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">App guest visitors</div>
                                        <div>957,565 Pages (50%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">Total Downloads</div>
                                        <div>957,565 Files (100 TB)</div>
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
