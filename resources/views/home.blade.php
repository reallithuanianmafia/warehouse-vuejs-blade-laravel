@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
    <div class="row justify-content-center">

<!--        <div class="col-md-9" style="margin-bottom:1% ">
            <div class="card">
                <div class="card-header">Recent updates related to System</div>
                    <ul class="list-group">
                        <li class="list-group-item">13.02.2021 - Expenditure System - now you can add and delete reactive rows.</li>
                        <li class="list-group-item">14.02.2021 - Search System - Fully functional search system has been added.</li>
                      </ul>
            </div>
            
        </div>
 -->
        
        <!-- -->
        <div class="col-md-9" style="margin-bottom:1% ">
            <div class="card">
                <add-product></add-product>
            </div>
            
        </div>
        <!-- -->
        <div class="col-md-9">
            <div class="card">
                <expenditure-product></expenditure-product>
            </div>
        </div>
        <!-- -->
        
    </div>
</div>
@endsection
