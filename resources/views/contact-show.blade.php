@extends('layouts.app')

@section('content')
<div class="container">
    <div id="root">
        <contact-show-component :is_current_user="{{ $is_current_user }}" :id="{{ $id }}" :contacts="{{ json_encode($contacts) }}"></contact-show-component>
    </div>
</div>
@endsection
