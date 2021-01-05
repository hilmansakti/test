@extends('layouts.app')

@section('styles')
    
@endsection

@section('content')
<div class="container" id="regis2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Success</div>

                <div class="card-body">     
                    Success!. <a href="{{ route('login') }}">login</a> Now!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
   
@endsection


