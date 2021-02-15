@extends('layouts.app')
@section('content')
<div class="container-fluid" id="app">
    <div class="row justify-content-center">
        <!-- -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Edit Product - {{$product->id}} - {{$product->name}}</div>
                <div class="card-body">
                    <form action="/api/products/{{$product->id}}/update" method="POST">
                        <div class="form-group">
                            <input class="form-control" type="text" value="{{$product->name}}" name="name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" value="{{$product->quantity}}" name="quantity">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" value="{{$product->notes}}" name="notes">
                        </div>
                        <div class="form-group">
                            <input class="form-control btn btn-primary" type="submit">
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection