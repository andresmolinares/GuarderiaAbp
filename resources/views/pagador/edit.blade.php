@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('pagador.update',$pagador->id) }}" method="POST">
@csrf
@method('PATCH')
@include('pagador.form',['modo' => 'Editar'])

</form>
</div>
@endsection