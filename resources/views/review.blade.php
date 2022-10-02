@extends('layout')
@section('title') Review page @endsection
@section('main_content')
    <h1>Form add review</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
        @endif
    <form method="post" action="/review/check">
        @csrf
        <input type="email" name="email" id="email" placeholder="Enter email" class="form-control"> <br>
        <input type="text" name="subject" id="subject" placeholder="Enter review" class="form-control"> <br>
        <textarea name="message" id="message" class="form-control" placeholder="Enter message" ></textarea> <br>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
    <br>
    <h1>Alle reviews</h1>
    @foreach($reviews as $el)
        <div class="alert alert-warning">
            <h3>{{ $el->subject }}</h3>
            <b>{{ $el->email }}</b>
            <p>{{ $el->message }}</p>
        </div>
    @endforeach
@endsection
