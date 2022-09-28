@extends("layouts.app")


@section('content')


<div class="container">
{{-- Klaidu isvedimas pagal laravelio validatoriu--}}
       @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form method="post" action= '{{ route("owners.update", $owners->id) }}'>

 <input type="hidden" name ="userId" value='
 {{ ($owners) ? $owners["id"]: "" }}'>
 {{ csrf_field()}}

 <h1> Redaguojamas mašinos savininkas :</h1> 
<table class="table table-striped table-light">
    <tr>
    <td>  Vartotojo vardas:  </td>
    <td> <input type="text" name="name"
   value = '{{ ($owners) ? $owners["name"]: "" }}'
    > </td> 
    </tr>

    <tr>
    <td>  Vartotojo pavarde: </td>
    <td> <input type="text" name="surname"
    value = '{{ ($owners) ? $owners["surname"]: "" }}'
    > </td>
    </tr>

    <tr>
    <td>  Mašinos modelis: </td>
    <td> <input type="text" name="cars_id"    
    value = '{{ ($owners) ? $owners["cars_id"]: "" }}'
    > </td>
    </tr>

    <tr>
    <td>  Telefono numeris:  </td>
    <td> <input type="text" name="phone"    
    value = '{{ ($owners) ? $owners["phone"]: "" }}'
    > </td>
    </tr>

    <tr>
    <td>  Lytis:  </td>
    <td> <input type="text" name="gender"    
    value = '{{ ($owners) ? $owners["gender"]: "" }}'
    > </td>
    </tr>

   
    <td> <input type="submit" name="submit" value="Atnaujinti"> </td> <td> </td>
    
    </tr>
</table>
</form>

</div>
@endsection