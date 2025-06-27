@extends('layouts.main_layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="col card p-5 text-center">
                @include('top_bar')
                <span class="display-3 mb-5"><i class="fa-solid fa-triangle-exclamation text-warning opacity-50"></i></span>
                <h4 class="text-info mb-3">{{$nota->titulo}}</h4>
                <p class="text-secondary">Are you sure you want to delete this note?</p>
                <div class="mt-3">
                    <a href="{{ route('home')}}" class="btn btn-primary px-5 m-2"><i class="fa-solid fa-xmark me-2"></i>No</a>
                    <a href="{{route('deletarForm', ['id' => Crypt::encrypt($nota->id)])}}" class="btn btn-danger px-5 m-2"><i class="fa-solid fa-trash me-2"></i>Yes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection