
@extends('layout.main')

@section('body')

<section class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="/consultation/new" class="btn btn-success">New consultation</a>
                </div>
                <br>

                <div class="box-body no-padding">
                    <table id="vitor" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th hidden style="width: 10px">#</th>
                                <th>Date</th>
                                <th>Pet</th>
                                <th>Client</th>
                                <th>Vet</th>
                                <th>Total(R$)</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach($consultations as $consultation)

                            <tr>
                               <td hidden>{{$consultation->id}}</td>
                               <td>{{\Carbon\Carbon::parse($consultation->date)->format('d/m/Y')}}</td>
                               <td>{{$consultation->pet->name}}</td>
                               <td>{{$consultation->pet->client->name}}</td>
                               <td>{{$consultation->vet->name}}</td>
                               <td>{{$consultation->price}}</td>
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
