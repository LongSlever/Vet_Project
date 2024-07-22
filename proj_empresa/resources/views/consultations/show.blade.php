
@extends('layout.main')

@section('body')

<div class="alert alert-success mt-2" role="alert">
    <h2>Your Consultation, {{$consultation->pet->name}}</h2>
</div>

<section class="content container">
    <div class="row">
        <div class="col-md-6 border p-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h4>Your vet is {{$consultation->vet->name}}</h4>
                    <hr>
                </div>
                <br>

                <div class="box-body no-padding">
                <h5>Your appointment details</h5>
                    <h6>Pet : {{$consultation->pet->name}}</h6>
                    <h6>Owner : {{$consultation->pet->client->name}}</h6>
                    <hr>
                    <p>
                        Age : {{$consultation->pet->age}}
                    </p>
                    <p>Breed : {{$consultation->pet->breed}}</p>
                    <p>Specie : {{$consultation->pet->specie}}</p>
                    <p>Gender : {{$consultation->pet->gender}}</p>
                    <div> Photo :
                        <img style="max-width: 250px;" src="{{asset('storage/' .$consultation->pet->photo)}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 border p-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h4>Your procedures!</h4>
                    <hr>
                </div>
                <br>

                <div class="box-body no-padding">
                <h6>Procedures : </h6>
                @foreach($consultation->procedures as $procedure)

                <p>Name : {{$procedure->name}} </p>
                <p>Price : {{$procedure->price}} </p>
                <hr>
                @endforeach
                <p>Date : {{\Carbon\Carbon::parse($consultation->date)->format('d/m/Y')}}</p>
                <hr>
                <p>Total Value : {{$consultation->price}}</p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
