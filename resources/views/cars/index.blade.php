@extends("layouts.app")


@section('content')
<div class="container">

 <h5> Viso mašinų yra: {{ $cars->count() }} </h5>
 <p> testas</p>
 <a href="{{ route('cars.create') }}">
    <button  type="button" class="btn btn-dark btn-lg">Sukurti naują mašinos įrašą </button>
				</a> 

                <br>
                <br>
        <div class="row">
            <div class="col-8">
                Filtruojame pagal   |
                <a href="?brand=TOYOTA" > TOYOTA   </a>|
                 <a href="?brand=FORD" > FORD    </a>|
                 <a href="?brand=MERCEDES%20BENZ" > MERCEDES Benz    </a>|
                 <a href="?brand=HYUNDAI" > HYUNDAI    </a>|
                 <a href="?brand=NISSAN" > NISSAN    </a>| 
                 <a href="?brand=KIA" > KIA    </a>|
                 <a href="?" > Visi </a>
            </div>
            <div class="col-4">
                Rikiavimas :   |
               <a href="?sort=asc" > A -> Z | </a>
               <a href="?sort=desc" > Z -> A  | </a>
            </div>
        </div>
    <table class="table table-striped table-dark">
    <th scope="col"> <h1> Mašinos modelis </h1></th>
    <th scope="col"> <h1>Savininkai</h1> </th> 
    <th scope="col"> </th> 
    <th scope="col"> </th> 
    
	<!-- Einame per visa masinu masyva gauta is CarsController -->
	@foreach($cars as $carsItem)
    <tr scope="row">
		<td>
			
                <!--  Spausdiname masinos pavadinima -->
                
                @if($carsItem->id == 33 || $carsItem->id == 34 )

                    {{ $carsItem->brand }} {{ $carsItem->model }} 
                <img src="{{ asset('storage/' . $carsItem->jpg) }}" height="100" width="150">
                  @else
                    {{ $carsItem->brand }} {{ $carsItem->model }} 
                <img src="{{ $carsItem->jpg }}" height="100" width="150" > 
                
                @endif
        </td>
        <td>
			<!-- Kreipimasis i route'a su parametrais -->
				<a href="{{ route('cars.show', $carsItem->id) }}"> 
                
                << kiekis  ({{ $carsItem->owners->count() }})
               
               </a>
		
        </td>
        <td>
				<a href="{{ route('cars.edit', $carsItem->id)}}"> <button  type="button" class="btn btn-secondary">
                
                 Taisyti </button>
				</a>
        </td>
        <td>  
         <form action="{{ route('cars.delete', $carsItem->id) }}" method="POST">
                <!--  Su post metodu dirbant sau formom visada butina ideti sita laukeli  -->
                {{ csrf_field() }}
                <input
                class="btn btn-danger"
                type="submit" value="Trinti">
            </form>
         </td>
	</tr>
	@endforeach

</table>
<br>

{{ $cars->links() }}

@endsection