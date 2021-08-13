@extends('myapp.layout')

@section('title','सम्पर्क')

@section('body')
<!-- Breadcrumbs -->

{{-- @include('include.breadcrumps',[
'title'=>'सम्पर्क',
'hasParent'=>0,
]) --}}
<div class="inner-content-wrapper contact-section pt-0  bg-light">
    <div class="container">

        <div class="contact-info mb-0">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(count($errors)>=1)
            <div class="alert alert-danger">
                Oops!! There was a problem when sending the message. Please recheck and submit it.
            </div>
            @endif
            <div class="sec-title centered mb-20">
                <h1>सम्पर्कमा रहनुहोला</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="contact-info-block">
                        <i class="fas fa-map-marker-alt fa-2x mb-2"></i>
                        <h5>ठेगाना</h5>
                        <div class="text">हात्तीसार, कठमाण्डौ</div>
                        <div class="text">बाग्मती, नेपाल</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="contact-info-block">
                        <i class="fa fa-envelope fa-2x mb-2"></i>
                        <h5>ई-मेल</h5>
                        <div class="text">dfoktm@gmail.com</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="contact-info-block fa-2x mb-2" style="min-height: 197px">
                        <i class="fa fa-phone"></i>
                        <h5>फोन</h5>
                        <div class="text">+९७७ ०३६ ४२०१३४ </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="inner-content-wrapper contact-section pt-0  bg-light">

    <div class="container map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.1993783294815!2d85.32012561408334!3d27.711129731934616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x84e2ef896904f231!2z4KSc4KS_4KSy4KWN4KSy4KS-IOCkteCkqCDgpJXgpL7gpLDgpY3gpK_gpLLgpK8sIOCkleCkvuCkoOCkruCkvuCkoeCljA!5e0!3m2!1sne!2snp!4v1628842503307!5m2!1sne!2snp" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="inner-content-wrapper contact-section">
    <div class="container">

        <div class="sec-title centered mb-20">
            <h1>सन्देश पठाउनुहोस्</h1>
        </div>
        <div class="default-form-area">
            <p class="text-secondary primary text-left font-weight-normal">तपाईंले निम्न फारम मार्फत आफ्ना सन्देश यस डिभिजन वन कार्यालयलाई पठाउन सक्नुहुन्छ। सो
                तरिका ले पठायिएको कुनै पनि सन्देशले तपाईंले भरेका निम्न विवरण बाहेकका ब्यक्तिगत जानकारी सम्प्रेशन गरेर राख्ने छैन। तपाईंकाे
                सन्देशलाई यस डिभिजन वन कार्यालयले गम्भिर्ताका साथ हेर्नेछ।</p>
            <form action="/contact" id="contact-form" method="POST">
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6 column">
                        <div class="form-group">
                            <input type="text" name="form_name" class="form-control" value="{{ old('form_name') }}"
                                placeholder="नाम" required>
                        </div>
                    </div>
                    <div class="col-md-6 column">
                        <div class="form-group">
                            <input type="email" name="form_email" class="form-control required email"
                                value="{{ old('form_email') }}" placeholder="ई-मेल" required>
                        </div>
                    </div>
                    <div class="col-md-6 column">
                        <div class="form-group">
                            <input type="text" name="form_phone" value="{{ old('form_phone') }}" class="form-control"
                                value="" placeholder="फोन">
                        </div>
                    </div>
                    <div class="col-md-6 column">
                        <div class="form-group">
                            <input type="text" name="form_address" class="form-control"
                                value="{{ old('form_address') }}" placeholder="ठेगाना">
                        </div>
                    </div>
                    <div class="col-md-12 column">
                        <div class="form-group">
                            <textarea name="form_message" class="form-control textarea required"
                                placeholder="सन्देश">{{ old('form_message') }}</textarea>
                        </div>
                    </div>
                </div>
                @if(env('CAPTCHA_KEY'))
                <div class="row clearfix mt-2 mb-2">
                    <div class="col-md-12 column">
                        <div class="input-group d-flex justify-content-center">
                            <div class="g-recaptcha  is-invalid" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                            </div>
                            @error('g-recaptcha-response')
                            <div class="invalid-feedback">
                                {{ $errors->first('g-recaptcha-response') }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

            @endif
            <div class="contact-section-btn">
                <div class="form-group style-two">
                <button class="bttn" type="submit" data-loading-text="Please wait...">पठाउनुहोस्</button>
                </div>
            </div>
            </form>
        </div>

    </div>
</div>
@endsection
