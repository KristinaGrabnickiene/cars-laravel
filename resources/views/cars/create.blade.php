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
<form method="post" action= "{{ route('cars.store') }}" enctype="multipart/form-data"> //multipart naudojama failams ikelti

 <input type="hidden" name ="userId" value=''>
 {{ csrf_field()}}
<table class="table table-striped table-light">
    <tr>
    <td>  Mašinos gamintojas:  </td>
    <td> <input type="text" name="brand"
   value = 'MERSEDES BENZ'
    > </td>
    </tr>

    <tr>
    <td>  Mašinos modelis: </td>
    <td> <input type="text" name="model"
    value = 'A Class'
    > </td>
    </tr>

    <tr>
    <td>  Mašinos registracijos nr: </td>
    <td> <input type="text" name="reg_number"    
    value = '123456'
    > </td>
    </tr>

    <tr>
    <td>  Mašinos paveiklsiukas: </td>
    <td> <input type="file" name="jpg"    
    value = ''
    > </td>
    

    <tr>
   
    <td> <input type="submit" name="submit" value="Pridėti naują"> </td> <td> </td>
    </tr>
    
</table>
</form>

</div>
@endsection