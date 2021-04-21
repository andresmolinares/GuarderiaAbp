@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('pagador.index') }}" method="post">
@csrf
@include('pagador.form',['modo' => 'Agregar'])



</form>
</div>
@endsection