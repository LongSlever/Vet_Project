@extends('layout.main')

@section('body')

<script>
function add_client_to_pet(element) {
    // Obter a linha da tabela onde o botão foi clicado
    var row = element.closest('tr');
    // Obter as células da linha
    var cells = row.getElementsByTagName('td');
    // Pegar os valores e colocar nos inputs
    document.getElementById('client_id').value = cells[0].innerText.trim();
    document.getElementById('owner').value = cells[1].innerText.trim();
}

</script>

<div class="alert alert-primary" role="alert">
    <h2>Create Pets</h2>
</div>

<section class="content ">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <form role="form" action="/pet" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="owner"  class="form-label">Owner:</label>
                            <input type="text" required name="owner" class="form-control" id="owner"
                            oninvalid="this.setCustomValidity('Campo Requirido')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                            onkeydown="return false;">
                        </div>

                        <div class="form-group mt-2 mb-2">
                            <input type="text" hidden required name="client_id" class="form-control" id="client_id"
                            onkeydown="return false;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#owners">
                                Selecionar cliente
                            </button>
                        </div>

                        <div class="mb-3">
                            <label for="name"  class="form-label">Name</label>
                            <input type="text" required name="name" class="form-control" id="name"
                            oninvalid="this.setCustomValidity('Campo Requirido')"
                            onchange="try{setCustomValidity('')}catch(e){}">
                        </div>
                        <div class="mb-3">
                            <label for="breed" class="form-label">Breed</label>
                            <input type="text" required name="breed" class="form-control" id="breed">
                        </div>

                        <div class="mb-3">
                            <label for="specie" class="form-label">Specie</label>
                            <input type="text" required name="specie" class="form-control" id="specie">
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="number" required name="weight" class="form-control" id="weight">
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" required name="color" class="form-control" id="color">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" required  name="gender" class="form-control">
                            <option value="F">Female</option>
                            <option value="M">Male</option> </select>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" required name="age" class="form-control" id="age">
                        </div>
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" required name="birth_date" class="form-control" id="birth_date">
                        </div>
                        <div class="mb-3">
                            <label for="descript" class="form-label">Descript of your animal</label>
                            <textarea class="form-control" rows="4" required name="descript" class="form-control" id="descript"> </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Choose a photo of your animal</label>
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




<!-- Modal Client -->
<div class="modal fade" id="owners" tabindex="-1" aria-labelledby="ownersLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ownersLabel">Owners</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table id="grid" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th hidden></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Selecione</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($clients as $client)

                            <tr>
                               <td hidden>{{$client->id}}</td>
                               <td>{{$client->name}}</td>
                               <td>{{$client->email}}</td>
                               <td>{{$client->city}}</td>
                               <td>
                                 <a class="btn btn-success btn-xs"
                                 data-placement="top" data-toggle="tooltip" onclick="add_client_to_pet(this)"> Selecione </a>
                               </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
