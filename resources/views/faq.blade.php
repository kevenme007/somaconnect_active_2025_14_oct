@extends('layouts.main3_frontend')

@section('title')
    FAQ - Soma Connect
@endsection

@section('content')
    <main>
        <!-- ====== faq-area-start=============================================== -->
        <div class="faq-area pt-120 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="container-inner pl-35 pr-35">
                            <div class="faq-title section-title pl-140 pb-50">
                                <span class="secondary-color position-relative">FAQ's</span>
                                <h2 class="pt-10">Frequently Asked Questions</h2>
                            </div>

                            <div class="faq-content">
                                <div class="faq-accordion">
                                    <div class="accordion" id="accordion">
                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#faq1"
                                                        aria-expanded="true" aria-controls="faq1">
                                                    What is Soma Connect?
                                                </button>
                                            </h5>
                                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Soma Connect is a digital learning platform that provides students,
                                                    teachers, and parents with tools to enhance education through curated
                                                    content, reading tools, progress tracking, and interactive learning
                                                    experiences.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#faq2"
                                                        aria-expanded="false" aria-controls="faq2">
                                                    What features are available on SomaConnect?
                                                </button>
                                            </h5>
                                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Soma Connect offers a digital library, topic-based reading tools,
                                                    student progress tracking, teacher dashboards, quizzes, exam modules,
                                                    a collaboration forum, and secure communication between stakeholders.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#faq3"
                                                        aria-expanded="false" aria-controls="faq3">
                                                    Who can use Soma Connect?
                                                </button>
                                            </h5>
                                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Soma Connect is designed for students of all age groups, teachers,
                                                    school administrators, and parents. Each user type gets personalized
                                                    features and dashboards tailored to their needs.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#faq4"
                                                        aria-expanded="false" aria-controls="faq4">
                                                    How does SomaConnect help students improve?
                                                </button>
                                            </h5>
                                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    By providing structured content, quizzes, and a clear view of their
                                                    learning progress, SomaConnect encourages consistency, motivation,
                                                    and targeted learning, helping students focus on areas where they
                                                    need improvement.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#faq5"
                                                        aria-expanded="false" aria-controls="faq5">
                                                    Can teachers upload their own learning materials?
                                                </button>
                                            </h5>
                                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Yes, teachers can upload PDFs, questions, notes, and create quizzes
                                                    for students to access directly. This allows teachers to tailor the
                                                    platform to their specific curriculum.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#faq6"
                                                        aria-expanded="false" aria-controls="faq6">
                                                    Is Soma Connect available on mobile?
                                                </button>
                                            </h5>
                                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Yes, Soma Connect is fully responsive and works on both desktop and
                                                    mobile browsers. A dedicated mobile app is also under development to
                                                    enhance accessibility and performance on smartphones and tablets.
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /accordion -->
                                </div>
                            </div><!-- /faq-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== faq-area-end =============================================== -->
    </main>
@endsection


