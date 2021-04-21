@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('ingrediente.index') }}" method="post">
@csrf
@include('ingrediente.form',['modo' => 'Agregar'])



</form>
</div>
@endsection