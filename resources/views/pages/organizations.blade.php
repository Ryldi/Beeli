@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-40 md:px-14">
    <div class="text-3xl font-semibold text-center mb-10">ORGANIZATIONS</div>
    @include('components.organizations_card', ['organizations' => $organizations])
</div>

@endsection