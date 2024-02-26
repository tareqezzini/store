@extends('website.layouts.master')

@section('content')
    <!--section start-->
    <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-7 map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1605.811957341231!2d25.45976406005396!3d36.3940974010114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1550912388321"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="col-lg-5">
                    <div class="contact-right">
                        @if (App\Models\Settings::first())
                            <ul>
                                <li style="display: flex;align-items: center; margin-bottom: 10px;">
                                    <div class="contact-icon"><img src="{{ asset('frontend/assets/images/icon/phone.png') }}"
                                            alt="Generic placeholder image">
                                        <h6>Contact Us</h6>
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $settings->phone }}</p>
                                    </div>
                                </li>
                                <li style="display: flex;align-items: center; margin-bottom: 10px;">
                                    <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <h6>Address</h6>
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $settings->address }}</p>
                                    </div>
                                </li>
                                <li style="display: flex;align-items: center; margin-bottom: 10px;">
                                    <div class="contact-icon"><img
                                            src="{{ asset('frontend/assets/images/icon/email.png') }}"
                                            alt="Generic placeholder image">
                                        <h6>Email</h6>
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $settings->email }}</p>
                                    </div>
                                </li>

                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form" method="POST" action="{{ route('send.email') }}">
                        @csrf
                        @method('post')
                        <div class="form-row row">

                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="subject">subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="subject" required>
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="message">Write Your Message</label>
                                <textarea class="form-control" placeholder="Write Your Message" id="message" name="message" rows="6"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit">Send Your Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
