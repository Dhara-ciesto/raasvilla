@extends('layouts.master')

@section('title') @lang('translation.Home') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Utility @endslot
        @slot('title') Home @endslot
    @endcomponent

@endsection
