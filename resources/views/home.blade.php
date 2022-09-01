@extends('layouts.app')

@section('content')
<div class="container">
    <div id="root">
        <home-component :users="{{ json_encode($users) }}"></home-component>
    </div>
</div>
@endsection
