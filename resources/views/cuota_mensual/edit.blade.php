@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('cuota_mensual.update',$cuota_mensual->id) }}" method="POST">
@csrf
@method('PATCH')
@include('cuota_mensual.form',['modo' => 'Editar'])

</form>
</div>
@endsection