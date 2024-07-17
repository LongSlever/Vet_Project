
@extends('layout.main')

@section('body')

<div class="alert alert-success" role="alert">
    <h2>Procedures</h2>
</div>

<section class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="/procedure/new" class="btn btn-success">New procedure</a>
                </div>
                <br>

                <div class="box-body no-padding">
                    <table id="vitor" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th style="width: 10px"></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th style="width: 250px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($procedures as $procedure)

                            <tr>
                               <td>{{$procedure->id}}</td>
                               <td>{{$procedure->name}}</td>
                               <td>{{$procedure->price}}</td>
                               <td>
                                 <a href="/procedure/edit/{{$procedure->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit </a>
                                 <a href="/procedure/delete/{{$procedure->id}}" onclick="return confirm('Do you want to delete this procedure name = {{$procedure->name}} ?') " class="btn btn-danger btn-xs"><i class="fa fa-trash">Delete</i></a>
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
