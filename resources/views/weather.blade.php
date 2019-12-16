@extends('layouts.app')

@section('content')
    <section>
        <h1 class="text-center display-4 mb-5">Weather</h1>

        <div class="container">
            <div class="row">

                <div class="col-12 col-md-4 text-center py-3 now border rounded" data-toggle='tooltip' data-placement='top' title="{{ $tooltips[0] }}">
                    <div class="row">
                        <div class="col-6">
                            <div class="col">
                                <span>Now </span>
                            </div>
                            <div class="col"><span>{{ $doc->find('time')->text() }}</span></div>
                        </div>
                        <div class="col-6">
                            <div class="img" style='width:55px; height:36px;'>{!! $imgs[0] !!}</div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div>
                            <div class="col">
                                <span><i class="fas fa-temperature-low"></i> {{ $temperatures->elements[0]->textContent }}&deg;</span>
                            </div>
                            <div class="col">
                                <span>Feels like {{ $temperatures->elements[1]->textContent }}&deg;</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 text-center py-3 today border rounded" data-toggle='tooltip' data-placement='top' title="{{ $tooltips[1] }}">
                    <div class="row">
                        <div class="col-6">
                            <div><span>{{ $doc->find('.tab .tab_wrap .tab-content .date')->elements[2]->textContent }}</span></div>
                            <div><span>Today</span></div>
                        </div>
                        <div class="col-6">
                            <div class="img" style='width:55px; height:36px;' >{!! $imgs[1] !!}</div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <span><i class="fas fa-temperature-low"></i> {{ $temperatures->elements[2]->textContent }}&deg; - {{ $temperatures->elements[3]->textContent }}&deg;</span>
                    </div>
                </div>

                <div class="col-12 col-md-4 text-center py-3 tomorrow border rounded" data-toggle='tooltip' data-placement='top' title="{{ $tooltips[2] }}">
                    <div class="row">
                        <div class="col-6">
                            <div><span>{{ $doc->find('.tab .tab_wrap .tab-content .date')->elements[4]->textContent }}</span></div>
                            <div><span>Tommorow</span></div>
                        </div>
                        <div class="col-6">
                            <div class="img" style='width:55px; height:36px;' >{!! $imgs[2] !!}</div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <span><i class="fas fa-temperature-low"></i> {{ $temperatures->elements[4]->textContent }}&deg; - {{ $temperatures->elements[5]->textContent }}&deg;</span>
                    </div>
                </div>
            </div>

            <div class="row mt-5 text-center">
                @for($w = 0, $i = 3, $temp = 6, $time = 2; $i < 11; $i++, $temp++, $w++, ($time += 3))
                    <div class="col-3 mb-4 py-3">
                        <div class="col mb-2">
                            <span><i class="fas fa-clock"></i> {{ $time }}</span><sup>00</sup>
                        </div>
                        <div class="col mb-2">
                            <div style='width:55px; height:36px; margin: 0 auto;' data-toggle='tooltip' data-placement='top' title="{{ $tooltips[$i] }}">{!! $imgs[$i] !!}</div>
                        </div>
                        <div class="col mb-2">
                            <div class="row">
                                <div class="col-6 text-right"><i class="fas fa-temperature-low"></i></div>
                                <div class="col-6 text-left">{{ $temperatures->elements[$temp]->textContent }}&deg;</div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="row">
                                <div class="col-6 text-right"><i class="fas fa-wind"></i></div>
                                <div class="col-6 text-left">{{ $wind->elements[$w]->textContent }} m/s</div>

                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="row">
                                <div class="col-6 text-right"><i class="fas fa-umbrella"></i></div>
                                <div class="col-6 text-left">@if(empty($precipitation->elements)) 0 mm </span> @else {{ $precipitation->elements[$w]->textContent }} mm @endif</div>

                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection