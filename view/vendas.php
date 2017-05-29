<?php require_once 'cabecalho.php'; ?>

<div class="container" ng-app="SisVendasGo" ng-controller="compraRepresentanteCtrl" ng-init="inicializaDados()">

    <div class="panel panel-primary">

        <div class="panel-heading ">Compras dos Representantes</div>
        <div class="panel-body">
            <form class="form-horizontal">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Selecione o Representante</label>
                    <div class="col-sm-6">
                        <select class="form-control" ng-model="id_representante" >
                            <option>--Selecione--</option>
                            <option ng-repeat="representante in representantes " value="{{representante.id_representante}}">
                                {{ representante.nome_representante }}
                            </option>
                        </select>
                    </div>
                </div>
               
            </form>
        </div>
        
    </div>
    
    <div class="panel panel-primary">

        <div class="panel-heading ">Lista de Compras</div>
        <div class="panel-body">
            <form class="form-horizontal">

                <table class="table table-hover">
                    <thead>
                        <tr>                    
                            <th>Ano Fabricação</th>
                            <th>Ano Modelo</th>
                            <th>Cor</th>
                            <th>Completo</th>
                            <th>Marca Carro</th>
                            <th>Número Chassi</th>
                            <th>Placa Veículo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="dado in dadosMontagem">
                            <td>{{ dado.ano_fabricacao }}</td>
                            <td>{{ dado.ano_modelo }}</td>
                            <td>{{ dado.cor }}</td>
                            <td>{{ dado.opcionais }}</td>
                            <td>{{ dado.marca_veiculo }}</td>
                            <td>{{ dado.numero_chassi}}</td>
                            <td>{{ dado.placa_veiculo }}</td>
                            <td>
                                <button type="button" class="btn btn-success" id ="btnComprar" ng-click="abrirModalFinalizarCompra(dado)">Comprar</button>
                            </td>    
                        </tr>
                    </tbody>
                </table>                        
            </form>


        </div>

    </div>

      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Finalizar Compra</h4>
        </div>
        
        <div class="modal-body" >                    
          <p><label>Ano Fabricação: </label>{{dadosFinalizarCompras.ano_fabricacao}}</p>
          <p><label>Ano Modelo: </label>{{dadosFinalizarCompras.ano_modelo}}</p>
          <p><label>Cor: </label>{{dadosFinalizarCompras.cor}}</p>
          <p><label>Marca Carro : </label>{{dadosFinalizarCompras.ano_fabricacao}}</p>
          <p><label>Número Chassi: </label>{{dadosFinalizarCompras.numero_chassi}}</p>
          <p><label>Placa Veículo: </label>{{dadosFinalizarCompras.placa_veiculo}}</p>
          <p><label>Valor: </label>{{valorTotalCalculado | currency : 'R$'}}</p>
          <br>
          <p><label>Representante: </label>{{dadosFinalizarCompras.ano_fabricacao}}</p>
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="finalizarVenda()">Finalizar Compra</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>


</div>

<?php require_once 'rodape.php'; ?>
