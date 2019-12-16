@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <h1 class="text-center display-4 mb-5">Contact us</h1>

            <form action="">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right required-star" for="contact-name">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="contact-name" aria-describedby="emailHelp" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right required-star" for="contact-email">Email</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="contact-email" name="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right required-star" for="contact-txt">Message</label>
                    <div class="col-md-6">
                        <textarea class="form-control" id="contact-txt" rows="4" name="contact_txt"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4 d-flex justify-content-md-start justify-content-center">
                        <button type="submit" class="btn btn-primary" id="contact-submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection