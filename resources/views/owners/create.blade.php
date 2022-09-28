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
<form method="post" action= "{{ route('owners.store') }}">

 <input type="hidden" name ="userId" value=''>
 {{ csrf_field()}}
<table class="table table-striped table-light">
    <tr>
    <td>  Vartotojo vardas:  </td>
    <td> <input type="text" name="name"
    {{-- Jei validacija nepraejo, tai atspausdiname senus duomenis--}}
     value="{{ old('name') }}"
  
      > </td>
    </tr>

    <tr>
    <td>  Vartotojo pavardė: </td>
    <td> <input type="text" name="surname"
    value="{{ old('surname') }}"
    > </td>
    </tr>

    <tr>
    <td>  Telefono numeris: </td>
    <td> <input type="text" name="phone"    
    value = "{{ old('phone') }}"
    > </td>
    </tr>

    <tr>
    <td>  Mašinos tipas: </td>
    <td> <input type="text" name="cars_id"    
    value="{{ old('cars_id') }}"
    > </td>
    </tr>

    <tr>
    <td>  Lytis:  </td>
    <td> <input type="text" name="gender"    
    value = "{{ old('gender') }}"
    > </td>
    </tr>
    



    <tr>
   
    <td> <input type="submit" name="submit" value="Pridėti naują"> </td> <td> </td>
    </tr>
    
</table>
</form>

</div>
@endsection