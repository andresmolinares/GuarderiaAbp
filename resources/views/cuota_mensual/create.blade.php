@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('cuota_mensual.index') }}" method="post">
@csrf
@include('cuota_mensual.form',['modo' => 'Agregar'])



</form>
</div>
@endsection