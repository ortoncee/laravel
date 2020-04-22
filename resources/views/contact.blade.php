@extends('layouts.app')

@include('inc.navbar')

@section('content')
    <div class="container my-5">
        <h1>Contact Me</h1>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" placeholder="enter email" name="email">
            </div>
            <div class="form-group">
                <label for="">Subject</label>
                <input type="text" class="form-control" placeholder="subject" name=" enter subject">
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea class="form-control" name="message" id="" cols="30" rows="4" placeholder="type your message here..."></textarea>
            </div>
            <button class="btn btn-success">Send Message</button>
        </form>
    </div>
@endsection