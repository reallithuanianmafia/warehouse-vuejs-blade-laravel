@extends('layouts.app')
@section('content')
<div class="container-fluid" id="app">
    <div class="row justify-content-center">
        <div class="col-md-9" style="margin-bottom:1% ">
            <div class="card">
                <div class="card-header">Account Section</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Your name</th>
                            <th scope="col">Your email</th>
                            <th scope="col">Your biography</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">ID</th>
                            <td>{{auth()->user()->name}}</td>
                            <td>{{auth()->user()->email}}</td>
                            <td>Simple kid.</td>
                          </tr>
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>

        <div class="col-md-9" style="margin-bottom:1% ">
            <div class="card">
                <div class="card-header">Email Section <span class="badge badge-danger">Inactive</span></div>
                <div class="card-body">
                    <form>
                        <div class="form-group"><input type="text" class="form-control" placeholder="Enter your old email"></div>
                        <div class="form-group"><input type="text" class="form-control" placeholder="Enter your new email"></div>
                        <div class="form-group"><input type="submit" class="btn btn-primary btn-sm" style="float:right;" disabled></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9" style="margin-bottom:1% ">
            <div class="card">
                <div class="card-header">Password Section <span class="badge badge-danger">Inactive</span></div>
                <div class="card-body">
                    <form>
                        <div class="form-group"><input type="password" class="form-control" placeholder="Enter your old password"></div>
                        <div class="form-group"><input type="password" class="form-control" placeholder="Enter your new password"></div>
                        <div class="form-group"><input type="password" class="form-control" placeholder="Enter new password again"></div>
                        <div class="form-group"><input type="submit" class="btn btn-primary btn-sm" style="float:right;" disabled></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection