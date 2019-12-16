@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <h1 class="text-center display-4 mb-5 success">Contact us</h1>

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            <form action="{{ url('/contact-us/store') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right required-star" for="contact-name">Name</label>
                    <div class="col-md-6 has-name">
                        <input type="text" class="form-control" id="contact-name" aria-describedby="emailHelp" name="name" value="{{ auth()->user()->first_name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right required-star" for="contact-email">Email</label>
                    <div class="col-md-6 has-email">
                        <input type="email" class="form-control" id="contact-email" name="email" value="{{ auth()->user()->email }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right required-star" for="contact-msg">Message</label>
                    <div class="col-md-6 has-message">
                        <textarea class="form-control" id="contact-msg" rows="4" name="message"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4 d-flex justify-content-md-start justify-content-center">
                        <button type="button" id="btn-contact-us" class="btn send-message" disabled>Send message</button>
                    </div>
                </div>

                {{--<div id="loader-wrapper">--}}
                    {{--<div id="loader"></div>--}}
                {{--</div>--}}
            </form>
        </div>
    </section>

@endsection