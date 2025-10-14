@extends('layouts.main2_frontend')

@section('title')
@endsection

@section('content')
    <!--<< Faq Section Start >>-->
    <section class="faq-section fix section-padding">
    <div class="container">
        <div class="faq-wrapper">
            <div class="row g-4">
                {{-- <div class="col-lg-3">
                    <div class="faq-left">
                        <ul class="nav" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#trust" data-bs-toggle="tab" class="nav-link active" aria-selected="true" role="tab">
                                    SomaConnect FAQs
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
               <center>
                 <div class="col-lg-9">
                    <div class="tab-content">
                        <div id="trust" class="tab-pane fade show active" role="tabpanel">
                            <div class="faq-content">
                                <div class="faq-accordion">
                                    <div class="accordion" id="accordion">
                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                                    What is Soma Connect?
                                                </button>
                                            </h5>
                                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Soma Connect is a digital learning platform that provides students, teachers, and parents with tools to enhance education through curated content, reading tools, progress tracking, and interactive learning experiences.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                                    What features are available on SomaConnect?
                                                </button>
                                            </h5>
                                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Soma Connect offers a digital library, topic-based reading tools, student progress tracking, teacher dashboards, quizzes, exam modules, a collaboration forum, and secure communication between stakeholders.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                                    Who can use Soma Connect?
                                                </button>
                                            </h5>
                                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Soma Connect is designed for students of all age groups, teachers, school administrators, and parents. Each user type gets personalized features and dashboards tailored to their needs.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                                    How does SomaConnect help students improve?
                                                </button>
                                            </h5>
                                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    By providing structured content, quizzes, and a clear view of their learning progress, SomaConnect encourages consistency, motivation, and targeted learning, helping students focus on areas where they need improvement.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                                    Can teachers upload their own learning materials?
                                                </button>
                                            </h5>
                                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Yes, teachers can upload PDFs, questions, notes, and create quizzes for students to access directly. This allows teachers to tailor the platform to their specific curriculum.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                                    Is Soma Connect available on mobile?
                                                </button>
                                            </h5>
                                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Yes, Soma Connect is fully responsive and works on both desktop and mobile browsers. A dedicated mobile app is also under development to enhance accessibility and performance on smartphones and tablets.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </center>
            </div>
        </div>
    </div>
</section>

@endsection
