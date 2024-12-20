@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-40 md:px-14">
    <div class="text-3xl font-semibold text-center mb-10">UNIVERSITIES</div>
    @include('components.universities_card', ['universities' => $universities])
</div>

@endsection