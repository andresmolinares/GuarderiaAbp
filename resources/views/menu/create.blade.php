@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('menu.index') }}" method="post">
@csrf
@include('menu.form',['modo' => 'Agregar'])



</form>
</div>
@endsection