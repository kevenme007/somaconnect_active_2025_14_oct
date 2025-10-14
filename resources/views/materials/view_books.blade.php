@extends('layouts.root')
@section('title')
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1></h1>
    </div><!-- End Page Title -->

    <section class="section students-nav">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Books resources</h5>

                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 active" id="form1-tab" data-bs-toggle="tab" data-bs-target="#form1-justified" type="button" role="tab" aria-controls="form1" aria-selected="true">Form 1</button>
                        </li>

                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="form2-tab" data-bs-toggle="tab" data-bs-target="#form2-justified" type="button" role="tab" aria-controls="form2" aria-selected="false">Form 2</button>
                        </li>

                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="form3-tab" data-bs-toggle="tab" data-bs-target="#form3-justified" type="button" role="tab" aria-controls="form3" aria-selected="false">Form 3</button>
                        </li>

                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="form4-tab" data-bs-toggle="tab" data-bs-target="#form4-justified" type="button" role="tab" aria-controls="form4" aria-selected="false">Form 4</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="form5-tab" data-bs-toggle="tab" data-bs-target="#form5-justified" type="button" role="tab" aria-controls="form5" aria-selected="false">Form 5</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="form6-tab" data-bs-toggle="tab" data-bs-target="#form6-justified" type="button" role="tab" aria-controls="form6" aria-selected="false">Form 6</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2" id="myTabjustifiedContent">
                        {{-- TAB ONE --}}
                        <div class="tab-pane fade show active" id="form1-justified" role="tabpanel" aria-labelledby="form1-tab">
                            <div class="row">
                                @if(count($book1) > 0)
                                @foreach ($book1 as $book )
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="row g-0 mt-2">
                                            <div class="col-md-4">
                                                <img src="assets/images/book.png" class="img-fluid rounded-start" alt="{{ $book->name }}">
                                            </div>
                                            <div class="col-md-5">
                                                <div class="card-body">
                                                    <h5 class="card-title"> <a href="{{ URL('view-book', $book->id) }}">{{ $book->name }}</a></h5>
                                                    <p class="card-text">Form {{ $book->class_level }}</p>
                                                    <p class="card-text">Book</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="row g-0 mt-2">
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <p class="card-text">No book at the moment</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- END OF TAB ONE --}}


                    {{-- TAB TWO --}}
                    <div class="tab-pane fade" id="form2-justified" role="tabpanel" aria-labelledby="form2-tab">
                        <div class="row">
                            @if(count($book2) > 0)
                            @foreach ($book2 as $book )
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="row g-0 mt-2">
                                        <div class="col-md-4">
                                            <img src="assets/images/book.png" class="img-fluid rounded-start" alt="{{ $book->name }}">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card-body">
                                                <h5 class="card-title"> <a href="{{ URL('view-book', $book->id) }}">{{ $book->name }}</a></h5>
                                                <p class="card-text">Form {{ $book->class_level }}</p>
                                                <p class="card-text">Book</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row g-0 mt-2">
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <p class="card-text">No book at the moment</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                {{-- END OF TAB TWO --}}


                {{-- TAB THREE --}}
                <div class="tab-pane fade" id="form3-justified" role="tabpanel" aria-labelledby="form3-tab">
                    <div class="row">
                        @if(count($book3) > 0)
                        @foreach ($book3 as $book )
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="row g-0 mt-2">
                                    <div class="col-md-4">
                                        <img src="assets/images/book.png" class="img-fluid rounded-start" alt="{{ $book->name }}">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <h5 class="card-title"> <a href="{{ URL('view-book', $book->id) }}">{{ $book->name }}</a></h5>
                                            <p class="card-text">Form {{ $book->class_level }}</p>
                                            <p class="card-text">Book</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row g-0 mt-2">
                            <div class="col-md-5">
                                <div class="card-body">
                                    <p class="card-text">No book at the moment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            {{-- END OF TAB THREE --}}

            {{-- TAB FOUR --}}
            <div class="tab-pane fade" id="form4-justified" role="tabpanel" aria-labelledby="form4-tab">
                <div class="row">
                    @if(count($book4) > 0)
                    @foreach ($book4 as $book )
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row g-0 mt-2">
                                <div class="col-md-4">
                                    <img src="assets/images/book.png" class="img-fluid rounded-start" alt="{{ $book->name }}">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h5 class="card-title"> <a href="{{ URL('view-book', $book->id) }}">{{ $book->name }}</a></h5>
                                        <p class="card-text">Form {{ $book->class_level }}</p>
                                        <p class="card-text">Book</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row g-0 mt-2">
                        <div class="col-md-5">
                            <div class="card-body">
                                <p class="card-text">No book at the moment</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        {{-- END OF TAB FOUR --}}

        {{-- TAB FIVE --}}
        <div class="tab-pane fade" id="form5-justified" role="tabpanel" aria-labelledby="form5-tab">
            <div class="row">
                <div class="row">
                    @if(count($book5) > 0)
                    @foreach ($book5 as $book )
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row g-0 mt-2">
                                <div class="col-md-4">
                                    <img src="assets/images/book.png" class="img-fluid rounded-start" alt="{{ $book->name }}">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h5 class="card-title"> <a href="{{ URL('view-book', $book->id) }}">{{ $book->name }}</a></h5>
                                        <p class="card-text">Form {{ $book->class_level }}</p>
                                        <p class="card-text">Book</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row g-0 mt-2">
                        <div class="col-md-5">
                            <div class="card-body">
                                <p class="card-text">No book at the moment</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
        </div>
        {{-- END OF TAB FIVE --}}

        {{-- TAB SIX --}}
        <div class="tab-pane fade" id="form6-justified" role="tabpanel" aria-labelledby="form6-tab">
            <div class="row">
                <div class="row">
                    @if(count($book6) > 0)
                    @foreach ($book6 as $book )
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row g-0 mt-2">
                                <div class="col-md-4">
                                    <img src="assets/images/book.png" class="img-fluid rounded-start" alt="{{ $book->name }}">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h5 class="card-title"> <a href="{{ URL('view-book', $book->id) }}">{{ $book->name }}</a></h5>
                                        <p class="card-text">Form {{ $book->class_level }}</p>
                                        <p class="card-text">Book</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row g-0 mt-2">
                        <div class="col-md-5">
                            <div class="card-body">
                                <p class="card-text">No book at the moment</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        </div>
        {{-- END OF TAB SIX --}}
        </div><!-- End Default Tabs -->

        </div>
        </div>
        </div>
    </section>

</main>
@endsection
