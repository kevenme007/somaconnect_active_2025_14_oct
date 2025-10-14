@extends('layouts.main2_frontend')

@section('title')
Support SomaConnect
@endsection

@section('content')
<!--<< Support Section Start >>-->
<section class="faq-section fix">
    <div class="container">
        <div class="faq-wrapper">
            <div class="row g-4">
                            <div class="col-lg-9">
                                <form action="{{ route('support.submit') }}" method="post">
                                    @csrf
                                    <div class="support-single-wrapper">
                                        <div class="support-single boxshado-single">
                                            <h4>Support SomaConnect</h4>
                                            <p>Fill out the form below to let us know how you can support SomaConnect. We appreciate your help!</p>

                                            <div class="support-single-form">
                                                <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="input-single">
                                                            <span>First Name*</span>
                                                            <input type="text" name="first_name" id="firstName" required placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-single">
                                                            <span>Last Name*</span>
                                                            <input type="text" name="last_name" id="lastName" required placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-single">
                                                            <span>Email Address*</span>
                                                            <input type="email" name="email" id="email" required placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-single">
                                                            <span>Phone (optional)</span>
                                                            <input type="text" name="phone" id="phone" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="input-single">
                                                            <span>How would you like to support?*</span>
                                                            <select name="support_type text-white" id="supportType" required>
                                                                <option value="" style="color: white">Select an option</option>
                                                                <option value="skills" style="color: white important!">Offering Skills (Teaching, IT, etc.)</option>
                                                                <option value="resources" style="color: white">Donating Resources (Books, Devices, etc.)</option>
                                                                <option value="funds" style="color: white">Financial Support</option>
                                                                <option value="other" style="color: white">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-6 ">
                                                        <div class="input-single">
                                                            <span>Details*</span>
                                                            <textarea name="details" id="details" rows="5" cols="35" required placeholder="Provide details about how you would like to support"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-5 mb-2">
                                                        <div class="input-single">
                                                            <button type="submit" class="btn btn-primary">Submit Support Offer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3">
                                <div class="support-info">
                                    <h4>Why Support Soma Connect?</h4>
                                    <p>Your support helps us empower students and teachers with digital tools, educational resources, and training opportunities.</p>
                                    <ul class="support-benefits">
                                        <li>📚 Donate books & materials</li>
                                        <li>💻 Provide technical expertise</li>
                                        <li>💰 Contribute to funding projects</li>
                                        <li>🤝 Volunteer your time and skills</li>
                                    </ul>
                                </div>
                            </div>
                <!-- Support Form Section End -->

            </div>
        </div>
    </div>
</section>
@endsection
