@extends('layout.main')

@section('body')

<div class="alert alert-primary" role="alert">
    <h2>Create procedures</h2>
</div>

<section class="content ">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                <form role="form" action="/procedure" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name"  class="form-label">Name</label>
                        <input type="text" required name="name" class="form-control" id="name"
                        oninvalid="this.setCustomValidity('Campo Requirido')"
                        onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" required name="price" class="form-control" id="price" step="0.01" value="0.00" placeholder="0.00">
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
