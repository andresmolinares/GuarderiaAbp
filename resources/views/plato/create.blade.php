@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('plato.index') }}" method="post">
@csrf
@include('plato.form',['modo' => 'Agregar'])



</form>
</div>
@endsection