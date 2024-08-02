@extends('layout.main')

@section('body')

<script>
function add_vet_to_consultation(element) {
    // Obter a linha da tabela onde o botão foi clicado
    var row = element.closest('tr');
    // Obter as células da linha
    var cells = row.getElementsByTagName('td');
    // Pegar os valores e colocar nos inputs
    document.getElementById('vet_id').value = cells[0].innerText.trim();
    document.getElementById('vet').value = cells[1].innerText.trim();
}

function add_pet_to_consultation(element) {
    // Obter a linha da tabela onde o botão foi clicado
    var row = element.closest('tr');
    // Obter as células da linha
    var cells = row.getElementsByTagName('td');
    // Pegar os valores e colocar nos inputs
    document.getElementById('pet_id').value = cells[0].innerText.trim();
    document.getElementById('pet').value = cells[1].innerText.trim();
    document.getElementById('specie').value = cells[2].innerText.trim();
    document.getElementById('owner').value = cells[3].innerText.trim();
}

function add_procedure(element) {

    // Obter a linha da tabela onde o botão foi clicado
    var row = element.closest('tr');
    // Obter as células da linha
    var cells = row.getElementsByTagName('td');
    // Pegar os valores e colocar nos inputs
    document.getElementById('procedure_id').value = cells[0].innerText.trim();
    document.getElementById('procedure').value = cells[1].innerText.trim();
    document.getElementById('price').value = cells[2].innerText.trim();
}

// add procedures
function add_procedures_consultation(element) {


  var table = document.getElementById("grid_procedure");
  var row = table.insertRow(1);

  var cell_id = row.insertCell(0);
  var cell_name = row.insertCell(1);
  var cell_price = row.insertCell(2);
  var cell_actions = row.insertCell(3);

  cell_id.innerHTML = document.getElementById("grid_procedures_modal").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML;
  cell_name.innerHTML = document.getElementById("grid_procedures_modal").rows[element.parentNode.parentNode.rowIndex].cells[1].innerHTML;
  cell_price.innerHTML = document.getElementById("grid_procedures_modal").rows[element.parentNode.parentNode.rowIndex].cells[2].innerHTML;


      cell_actions.innerHTML = '<button type="button" onclick="remove_procedure(this)"  class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"  onclick= remove_procedure_consultation(this)>' +
  '<i class="fa fa-trash"></i> Delete</button> ';

     // atualizar(aumentando) a quantidade na tabela procedimentos

   document.getElementById("procedure_quantity").innerHTML =

      parseInt(document.getElementById("procedure_quantity").innerHTML) + 1;



      // atualiza (aumentando) o valor total da tabela procedimentos


        document.getElementById("consultation_value").innerHTML =
  parseFloat(document.getElementById("consultation_value").innerHTML) +
  parseFloat(document.getElementById("grid_procedure").rows[element.parentNode.parentNode.rowIndex].cells[2].innerHTML) ;

    //quantidade
    document.getElementById("quantity").value = document.getElementById("procedure_quantity").innerHTML;
  //total value

  document.getElementById("price").value = document.getElementById("consultation_value").innerHTML;


  }

function remove_procedure(element) {

  // atualizar(diminuindo) a quantidade na tabela procedimentos
document.getElementById("procedure_quantity").innerHTML =
   parseFloat(document.getElementById("procedure_quantity").innerHTML) - 1 ;



// atualiza (diminuindo) o valor total da tabela procedimentos


document.getElementById("consultation_value").innerHTML = (parseFloat(document.getElementById("consultation_value").innerHTML) -
parseFloat(document.getElementById("grid_procedure").rows[element.parentNode.parentNode.rowIndex].cells[2].innerHTML)).toFixed(2);

//quantidade
document.getElementById("quantity").value = document.getElementById("procedure_quantity").innerHTML;

//total value

document.getElementById("price").value = document.getElementById("consultation_value").innerHTML;

// DELETE ROW

document.getElementById("grid_procedure").deleteRow(element.parentNode.parentNode.rowIndex);


}

function check_fields() {



//Vet
if (!$("#vet").val()) {
  alert('The Consultation must have a vet!');
return false;
}

//Pet
if (!$("#pet").val()) {
  alert('The Consultation must have a Pet!');
return false;
}

//procedures



if (document.getElementById("grid_procedure").rows.length < 2){

alert('The Consultation must have Procedures!');

return false;

}

// generate json of procedures

var i;
var  my_json = '[';

var  qty_commas = document.getElementById("grid_procedure").rows.length -2;
 // -2 because the fisrt row has the name of the fields

// read all the procedures

var table_procedures_consultation = document.getElementById("grid_procedure");

document.getElementById('memo_procedures').value= '';

for (var i = 1, row; row = table_procedures_consultation.rows[i]; i++) {

      my_json = my_json + '{"IDPROCEDURE":' + table_procedures_consultation.rows[i].cells[0].innerHTML + '}';



      if (qty_commas > 0){
          my_json = my_json + ',';
          qty_commas = qty_commas -1;
        }

    }

my_json = my_json + ']';

document.getElementById('memo_procedures').value= my_json;



}
</script>



<div class="alert alert-primary" role="alert">
    <h2>Create Consultation</h2>
</div>

<section class="content ">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                <form role="form" action="/consultation" method="post" onsubmit="return check_fields()">
                    @csrf

                    <h3 class="text text-success"> Select your vet! </h3>
                    <hr>
                        <!-- Inputs dos VETS -->
                    <div class="form-group">
                            <label for="vet"  class="form-label">Vet</label>
                            <input type="text" required name="vet" class="form-control" id="vet"
                            oninvalid="this.setCustomValidity('Campo Requirido')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                            onkeydown="return false;" >
                    </div>

                    <div class="form-group mt-2 mb-2">
                            <input type="text"  required name="vet_id" class="form-control" id="vet_id"
                            onkeydown="return false;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vets">
                                Select your vet
                            </button>
                    </div>
                    <!-- Fim input dos VETS -->
                    <hr>


                    <!-- Input dos PETS -->
                    <h3 class="text text-success"> Select your pet! </h3>
                    <hr>
                    <div class="form-group">
                            <label for="pet"  class="form-label">Pet</label>
                            <input type="text" required name="pet" class="form-control" id="pet"
                            oninvalid="this.setCustomValidity('Campo Requirido')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                            onkeydown="return false;" >
                    </div>

                    <div class="form-group">
                            <label for="specie"  class="form-label">Specie</label>
                            <input type="specie" required name="specie" class="form-control" id="specie"
                            oninvalid="this.setCustomValidity('Campo Requirido')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                            onkeydown="return false;" >
                    </div>

                    <div class="form-group">
                            <label for="owner"  class="form-label">Owner</label>
                            <input type="owner" required name="owner" class="form-control" id="owner"
                            oninvalid="this.setCustomValidity('Campo Requirido')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                            onkeydown="return false;" >
                    </div>

                    <div class="form-group mt-2 mb-2">
                            <input type="text" hidden required name="pet_id" class="form-control" id="pet_id"
                            onkeydown="return false;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pets">
                                Select your pet
                            </button>
                    </div>
                    <hr>
                    <!-- Fim input dos PETS -->

                    <h3 class="text text-success"> Select the procedures </h3>



                    <hr>
                    <!-- Inicio input dos PROCEDURES -->
                    <div class="form-group mt-2 mb-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#procedures">
                                Select your procedure
                            </button>
                    </div>

                    <table id="grid_procedure" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Price(R$)</th>
                                      <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>

                            <div class="row justify-content-end">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <p>
                                    <span class="text"> Quantity </span>
                                    <span class="text" id="procedure_quantity"> 0 </span>
                                  </p>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <span class="text-danger">Total</span>
                                    <span class="text-danger" id="consultation_value">0</span>
                                </div>
                            </div>

                    <div class="mb-3">
                        <input  type="text" hidden required name="quantity" class="form-control" id="quantity">
                    </div>
                    <div class="mb-3">
                        <input  type="text" hidden name="memo_procedures" class="form-control" id="memo_procedures">
                    </div>
                    <hr>
                    <!-- Fim input dos PROCEDURES -->
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" required name="date" class="form-control" id="date">
                    </div>
                    <div class="mb-3">
                        <input  type="text" hidden onkeydown="return false;" required name="price" class="form-control" id="price">
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


<!-- Modal Vet -->
<div class="modal fade" id="vets" tabindex="-1" aria-labelledby="vetsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="vetsLabel">Vets</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table id="grid" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th hidden></th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Selecione</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($vets as $vet)

                            <tr>
                               <td hidden>{{$vet->id}}</td>
                               <td>{{$vet->name}}</td>
                               <td>{{$vet->address}}</td>
                               <td>{{$vet->city}}</td>
                               <td>{{$vet->uf}}</td>
                               <td>
                                 <a class="btn btn-success btn-xs"
                                 data-placement="top" data-toggle="tooltip" onclick="add_vet_to_consultation(this)"> Selecione </a>
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

<!-- Modal Pet -->
<div class="modal fade" id="pets" tabindex="-1" aria-labelledby="petsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="petsLabel">Vets</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table id="grid" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th hidden></th>
                                <th>Name</th>
                                <th>Specie</th>
                                <th>Owner</th>
                                <th>Breed</th>
                                <td>Age</td>
                                <td>Gender</td>
                                <th>Selecione</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($pets as $pet)

                            <tr>
                               <td hidden>{{$pet->id}}</td>
                               <td>{{$pet->name}}</td>
                               <td>{{$pet->specie}}</td>
                               <td>{{$pet->client->name}}</td>
                               <td>{{$pet->breed}}</td>
                               <td>{{$pet->age}}</td>
                               <td>{{$pet->gender}}</td>
                               <td>
                                 <a class="btn btn-success btn-xs"
                                 data-placement="top" data-toggle="tooltip" onclick="add_pet_to_consultation(this)"> Selecione </a>
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

<!-- Modal Procedure -->
<div class="modal fade" id="procedures" tabindex="-1" aria-labelledby="proceduresLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="proceduresLabel">Procedures</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table id="grid_procedures_modal" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th hidden></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Selecione</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($procedures as $procedure)

                            <tr>
                               <td hidden>{{$procedure->id}}</td>
                               <td>{{$procedure->name}}</td>
                               <td>{{$procedure->price}}</td>
                               <td>
                                 <a class="btn btn-success btn-xs"
                                 data-placement="top" data-toggle="tooltip" onclick="add_procedures_consultation(this)"> Selecione </a>
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
