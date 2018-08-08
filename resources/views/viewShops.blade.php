@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Shops</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($shops as $shop)
                <tr>
                    <td>{{$sno++}}</td>
                    <td>{{$shop->name}}</td>
                    <td>{{$shop->address}}</td>
                    <td><a href="{{url('/order').'/'.$shop->id}}" class="btn btn-primary">Visit</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
