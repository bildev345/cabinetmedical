@extends('layouts.master')
@section('main')
    <div class="container w-50">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" id="password" class="form-control mb-2">
            <input type="submit" value="Se connecter" class="btn btn-primary form-control">
        </form>
    </div>
@endsection
