
@extends('layout.main')

@section('body')


<section class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <br>

                <div class="box-body no-padding">
                <table id="vitor" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>Owner</th>
                                <th>Name</th>
                                <th>Breed</th>
                                <th>Specie</th>
                                <th>Color</th>
                                <th>Age</th>
                                <th>Birth Date</th>
                                <th>Weight</th>
                                <th>Gender</th>
                                <th>Photo</th>
                                <th>Descript</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pets as $pet)

                            <tr>
                               <td>{{$pet->client->name}}</td>
                               <td>{{$pet->name}}</td>
                               <td>{{$pet->breed}}</td>
                               <td>{{$pet->specie}}</td>
                               <td>{{$pet->color}}</td>
                               <td>{{$pet->age}}</td>
                               <td>{{\Carbon\Carbon::parse($pet->birth_date)->format('d/m/Y')}}</td>
                               <td>{{$pet->weight}}</td>
                               <td> @if ($pet->gender == "F")
                                    <p>Female</p>
                                    @else
                                    <p>Male</p>
                                    @endif
                           </td>
                               <td> <img src="{{asset('storage/' .$pet->photo)}}" alt="photo" style="max-width:40%"> </td>
                               <td>{{$pet->descript}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
