@extends('layouts.app')

@section('content')
    <section>
        <h1 class="text-center display-4 mb-5">Comments</h1>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="all-comments">

                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button class="btn more-comments mb-5">More comments</button>
            </div>
        </div>
    </section>
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
@endsection