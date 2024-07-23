
@extends('layout.main')

@section('body')

<div class="alert alert-success mt-2" role="alert">
    <h2>Consultations</h2>
</div>

<section class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h4>Select the relatory</h4>
                </div>
                <br>

                <div class="box-body no-padding" >
                    <form role="form" action="/report/show" method="post">
                        @csrf
                        <div class="radio mb-2">
                            <label for="" class="fs-4">
                                <input type="radio" name="report_type" id="report_clients" value="clients" checked>Clients
                            </label>
                        </div>
                        <div class="radio mb-2">
                            <label for="" class="fs-4">
                                <input type="radio" name="report_type" id="report_pets" value="pets" > Pets
                            </label>
                        </div>
                        <div class="radio mb-2">
                            <label for="" class="fs-4">
                                <input type="radio" name="report_type" id="report_procedures" value="procedures" > Procedures
                            </label>
                        </div>
                        <div class="radio mb-2">
                            <label for="" class="fs-4">
                                <input type="radio" name="report_type" id="report_consultations" value="consultations" > Consultations
                            </label>
                        </div>
                        <div class="radio mb-2">
                            <label for="" class="fs-4">
                                <input type="radio" name="report_type" id="report_vets" value="vets" > Vets
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success"> Show </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection
