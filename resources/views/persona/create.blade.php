@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('persona.index') }}" method="post">
@csrf
@include('persona.form',['modo' => 'Agregar'])



</form>
</div>
@endsection