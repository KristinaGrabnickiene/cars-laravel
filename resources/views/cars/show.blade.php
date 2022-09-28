

@extends('layouts.app')

@section('content')
<div class="container">

	<a href="{{ route('cars.index') }}"><< Grįžti atgal</a>    
    <div class="container">
    <img src="{{ $carsItem->jpg }}" >
    <table class="table table-striped table-dark">
    <th scope="col"> <h1>Mašinos modelis</h1></th>
    
    <th scope="col"> <h1>Savininkų</h1> </th> 
    <tr scope="row">
		<td> {{ $carsItem->brand }} {{ $carsItem->model }}</td>
	    <td>
            <div class="my-3 p-3 bg-black rounded shadow-sm">
                <h2 class="border-bottom border-gray pb-2 mb-0"> Viso: {{ count($owners)}}  </h2>
                <!-- Suskaiciuoju kiek yra savininku -->
                @if(count($owners) > 0)
                    <!--  Jei savininkus yra tai spausdinu juos -->
                    @foreach($owners as $one)
                        <div class="media text-muted pt-3">
                            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                            
                            </div>
                            <span class="d-block"> Vardas: {{ $one->name }}</span><span class="d-block">Pavardė: {{ $one->surname }}</span>
                            </div>
                        
                        </div>
                    @endforeach
                @else
                    <!-- Jei savininku nera tai atspausdinu kazka kito -->
                    <p>
                        Savininku nėra
                    </p>
                @endif
            </div>
        </td>
        
</div>
@endsection