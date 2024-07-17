@extends('layout.main')

@section('body')


<div class="alert alert-warning" role="alert">
    <h2>Edit procedure {{$procedure->name}}</h2>
</div>
<section class="content ">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body no-padding">
                <form role="form" action="/procedure/{{$procedure->id}}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name"  class="form-label">Name</label>
                            <input type="text" value="{{$procedure->name}}" required name="name" class="form-control" id="name"
                            oninvalid="this.setCustomValidity('Campo Requirido')"
                            onchange="try{setCustomValidity('')}catch(e){}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" step="0.01"  value="{{$procedure->price}}" required name="price" class="form-control" id="price">
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
