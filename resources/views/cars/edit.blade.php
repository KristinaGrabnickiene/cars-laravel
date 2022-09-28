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
<form method="post" action= '{{ route("cars.update", $cars->id) }}' enctype='multipart/form-data'>

 <input type="hidden" name ="userId" value='
 {{ ($cars) ? $cars["id"]: "" }}'>
 {{ csrf_field()}}

 <h1> Redaguojamas komentaras : {{ $cars->id }}</h1> 
<table class="table table-striped table-light">
    <tr>
    <td>  Mašinos gamintojas:  </td>
    <td> <input type="text" name="brand"
   value = '{{ ($cars) ? $cars["brand"]: "" }}'
    > </td> 
    </tr>

    <tr>
    <td>  Mašinos modelis: </td>
    <td> <input type="text" name="model"
    value = '{{ ($cars) ? $cars["model"]: "" }}'
    > </td>
    </tr>

    <tr>
    <td>  Mašinos registracijos nr: </td>
    <td> <input type="text" name="reg_number"    
    value = '{{ ($cars) ? $cars["reg_number"]: "" }}'
    > </td>
    </tr>

    <tr>
    <td>  Mašinos paveiklsiukas: </td>
    <td> <input type="file" name="jpg"    
    value = '{{ ($cars) ? $cars["jpg"]: "" }}'
    > </td>
    </tr>


   
    <td> <input type="submit" name="submit" value="Atnaujinti"> </td> <td> </td>
    
    </tr>
</table>
</form>

</div>
@endsection