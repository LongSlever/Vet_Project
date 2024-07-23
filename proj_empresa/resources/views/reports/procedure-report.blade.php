
@extends('layout.main')

@section('body')

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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($procedures as $procedure)

                            <tr>
                               <td>{{$procedure->id}}</td>
                               <td>{{$procedure->name}}</td>
                               <td>{{$procedure->price}}</td>
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
