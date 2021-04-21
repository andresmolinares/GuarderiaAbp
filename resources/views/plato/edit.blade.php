@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('plato.update',$plato->id) }}" method="POST">
@csrf
@method('PATCH')
@include('plato.form',['modo' => 'Editar'])

</form>
</div>
@endsection