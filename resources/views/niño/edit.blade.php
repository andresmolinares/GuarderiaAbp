@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('nino.update',$niño->id) }}" method="POST">
@csrf
@method('PATCH')
@include('niño.form',['modo' => 'Editar'])

</form>
</div>
@endsection




