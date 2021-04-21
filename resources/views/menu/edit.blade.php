@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('menu.update',$menu->id) }}" method="POST">
@csrf
@method('PATCH')
@include('menu.form',['modo' => 'Editar'])

</form>
</div>
@endsection