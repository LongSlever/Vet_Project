
@extends('layout.main')

@section('body')


<section class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="/vet/new" class="btn btn-success">New vet</a>
                </div>
                <br>

                <div class="box-body no-padding">
                    <table id="vitor" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th hidden style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Cell phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>UF</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach($vets as $vet)

                            <tr>
                               <td hidden >{{$vet->id}}</td>
                               <td>{{$vet->name}}</td>
                               <td>{{$vet->email}}</td>
                               <td>{{$vet->cellphone}}</td>
                               <td>{{$vet->address}}</td>
                               <td>{{$vet->city}}</td>
                               <td>{{$vet->uf}}</td>
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
