@extends('layout')

@section('content')

<div class="map-responsive">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230.18453771932136!2d88.26979009311434!3d22.61824502455201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f88273dca2f32d%3A0x40aa0269bf3b6d56!2sKali%20Mandir!5e0!3m2!1sen!2sin!4v1627561080276!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    
</div>
@endsection

<style>
    .map-responsive{
        border: 2px solid black;
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
        margin: 0 100px;
    }

    .map-responsive iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
    }
</style>