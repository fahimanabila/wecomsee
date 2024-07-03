<?php $css = 'style-fl.css'; ?>
@extends('wecomesee_layout.master')
@section('content')
    <section id="blog" class="sec works container" style="width:100%;height:100%">
        <div class="works-list">
            @include('wecomesee_partial/filter')
            <div class="works-item" style="width:70%;padding-top:50px">
                <div id="filter-destinasi" style="    
                display: flex;
                flex-direction: column;
                align-items: center;">
                    
                </div>
            </div>
        </div>
    </section>
@endsection