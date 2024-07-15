@extends('layout.main')

@section('body')

<div class="alert alert-success" role="alert">
    <h2>Pets</h2>
</div>

<section class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="/pet/new" class="btn btn-success">New Pets</a>
                </div>
                <br>

                <div class="box-body no-padding">
                    <table id="vitor" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Name</th>
                                <th>Breed</th>
                                <th>Specie</th>
                                <th>Color</th>
                                <th>Age</th>
                                <th>Birth Date</th>
                                <th>Weight</th>
                                <th>Gender</th>
                                <th style="width: 250px">Photo</th>
                                <th>Descript</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pets as $pet)

                            <tr>
                               <td>Client</td>
                               <td>{{$pet->name}}</td>
                               <td>{{$pet->breed}}</td>
                               <td>{{$pet->specie}}</td>
                               <td>{{$pet->color}}</td>
                               <td>{{$pet->age}}</td>
                               <td>{{$pet->birth_date}}</td>
                               <td>{{$pet->weight}}</td>
                               <td>{{$pet->gender}}</td>
                               <td>Photo</td>
                               <td>{{$pet->descript}}</td>
                               <td>
                                 <a href="/pet/edit/{{$pet->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit </a>
                                 <a href="/pet/delete/{{$pet->id}}" onclick="return confirm('Do you want to delete this client name = {{$pet->name}} ?') " class="btn btn-danger btn-xs"><i class="fa fa-trash">Delete</i></a>
                               </td>
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


