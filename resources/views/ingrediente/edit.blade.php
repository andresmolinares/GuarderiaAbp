@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('ingrediente.update',$ingrediente->id) }}" method="POST">
@csrf
@method('PATCH')
@include('ingrediente.form',['modo' => 'Editar'])

</form>
</div>
@endsection