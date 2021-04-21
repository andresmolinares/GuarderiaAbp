@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('nino.index') }}" method="post">
@csrf
@include('niño.form',['modo' => 'Agregar'])



</form>
</div>
@endsection