@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('persona.update',$persona->id) }}" method="POST">
@csrf
@method('PATCH')
@include('persona.form',['modo' => 'Editar'])

</form>
</div>
@endsection