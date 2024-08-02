
@extends('layout.main')

@section('body')


<section class="content container m-4">
    <div class="row">
        <div class="col-sm-4 border border-black">
        <h2 class="text-center">Your Profile</h2>
        <hr>
            <div class="mt-3 ">
                <div class="d-block ">
                    <p> <img class="rounded-5" src="{{asset('storage/' .Auth::guard('clients')->user()->photo)}}" alt="photo" style="max-width:50%"></p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Name : </h5>
                    <p class="d-inline">{{Auth::guard('clients')->user()->name}}</p> </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">E-mail : </h5>
                    <p class="d-inline">{{Auth::guard('clients')->user()->email}}</p> </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Cell Phone : </h5>
                    <p class="d-inline">{{Auth::guard('clients')->user()->cell_phone}}</p> </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                <h5 class="d-inline">Address : </h5>
                    <p class="d-inline">{{Auth::guard('clients')->user()->address}}</p> </div>

                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm" >
                <h5 class="d-inline">City : </h5>
                    <p class="d-inline">{{Auth::guard('clients')->user()->city}}</p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                <h5 class="d-inline">UF : </h5>
                    <p class="d-inline">{{Auth::guard('clients')->user()->UF}}</p>
                </div>
            </div>
            <div class="mt-5">
            <a href="/client/edit/{{Auth::guard('clients')->user()->id}}" class="btn btn-primary btn-xs d-block "><i class="fa fa-edit"></i>Edit </a>
            </div>
        </div>
        <div class="col-sm-4 border border-black">
            <h2 class="text-center">Your Pets</h2>
            <hr>
            @foreach ($pets as $pet)
                <div class="mt-3">
                <div class="d-block ">
                    <img class="rounded-5" src="{{asset('storage/' .$pet->photo)}}" alt="photo" style="max-width:50%">
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Name : </h5>
                    <p class="d-inline"> {{$pet->name}}</p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Breed : </h5>
                    <p class="d-inline">{{$pet->breed}}</p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Specie : </h5>
                    <p class="d-inline">{{$pet->specie}}</p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Color : </h5>
                    <p class="d-inline">{{$pet->color}}</p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Age : </h5>
                    <p class="d-inline">{{$pet->age}}</p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Birth Date : </h5>
                    <p class="d-inline">{{$pet->birth_date}}</p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Weight : </h5>
                    <p class="d-inline">{{$pet->weight}}kg</p>
                </div>
                <div class="mb-2 mt-2 border border-black p-3 rounded-pill shadow-sm">
                    <h5 class="d-inline">Gender : </h5>
                    @if ($pet->gender === 'F')
                        <p class="d-inline">Female</p>
                    @else
                        <p class="d-inline">Male</p>
                    @endif
                </div>
                <div class="mt-3">
                    <a href="/pet/edit/{{$pet->id}}" class="btn btn-primary btn-xs mb-2 d-block "><i class="fa fa-edit"></i>Edit </a>
                    <a href="/pet/delete/{{$pet->id}}" onclick="return confirm('Do you want to delete this client name = {{$pet->name}} ?') " class="btn btn-danger btn-xs d-block"><i class="fa fa-trash">Delete</i></a>
                </div>
                <hr>
                </div>

            @endforeach
        </div>
        <div class="col-sm-4 border border-black">
            <h2 class="text-center">Your Consultations</h2>
            <hr>
            @foreach ($consultations as $consultation)
            <div class="mt-3">
                <h4 class="d-inline ">Date :</h4>
                <p class="d-inline ">{{\Carbon\Carbon::parse($consultation->date)->format('d/m/Y')}}</p>
                <a class="btn btn-primary btn-xs d-inline m-2"  href="/consultation/show/{{$consultation->id}}" ><i class="fa fa-edit"></i> Show </a>
                <a href="/consultation/delete/{{$consultation->id}}" onclick="return confirm('Do you want to delete this consultation ?') " class="btn btn-danger btn-xs d-inline m-2"><i class="fa fa-trash">Delete</i></a>
                <hr>

            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
