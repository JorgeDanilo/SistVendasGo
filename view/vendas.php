<?php require_once 'cabecalho.php'; ?>
<?php require_once 'modalFinalizar.php'; ?>

<div class="container" ng-app="SisVendasGo" ng-controller="compraRepresentanteCtrl" ng-init="inicializaDados()">
    <div class="panel panel-primary">

        <div class="panel-heading ">Compras dos Representantes</div>
        <div class="panel-body">
            <form class="form-horizontal">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Selecione o Representante</label>
                    <div class="col-sm-6">
                        <select class="form-control" ng-model="id_representante">
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
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" ng-click="comprar(dado)">Comprar</button></td>    
                        </tr>
                    </tbody>
                </table>                        
            </form>


        </div>

    </div>


</div>

<?php require_once 'rodape.php'; ?>