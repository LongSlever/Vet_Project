@extends('layout.main')

@section('body')

<div class="alert alert-primary" role="alert">
    <h2>Create Clients</h2>
</div>

<section class="content ">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                <form role="form" action="/client" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name"  class="form-label">Name</label>
                        <input type="text" required name="name" class="form-control" id="name"
                        oninvalid="this.setCustomValidity('Campo Requirido')"
                        onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" required name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="cellphone" class="form-label">Cell Phone</label>
                        <input type="tel" required name="cellphone" class="form-control" id="cellphone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="address" required name="address" class="form-control" id="address">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="city" required name="city" class="form-control" id="city">
                    </div>

                    <div class="mb-3">
                        <label for="uf" class="form-label">States</label>
                        <select id="uf" required name="uf" class="form-control">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                            <label for="photo" class="form-label">Choose a photo of you</label>
                            <input class="form-control" type="file" id="photo" name="photo">
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
