@extends('layouts.backend.app')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> User Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <!-- <div class="col-sm-12">
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            <span class="badge badge-pill badge-success"
                >Success</span
            >
            You successfully read this important alert message.
            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close"
            >
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div> -->

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib">
                        <i
                            class="ti-file text-success border-success"
                        ></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Posts</div>
                        <div class="stat-digit">4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib">
                        <i
                            class="ti-user text-primary border-primary"
                        ></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Users</div>
                        <div class="stat-digit">5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib">
                        <i
                            class="ti-comment-alt text-warning border-warning"
                        ></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Comments</div>
                        <div class="stat-digit">5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib">
                        <i
                            class="ti-thumb-up text-warning border-warning"
                        ></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Categories</div>
                        <div class="stat-digit">5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Recent Comments</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Comment</th>
                            <th scope="col">From</th>
                            <th scope="col">Post</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <th scope="row">1</th>
                            <td>hello worlf message</td>
                            <td>sabbir</td>
                            <td><a href="">hello world post</a></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- .content -->
@endsection