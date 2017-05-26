<?php require_once 'cabecalho.php'; ?>

<div class="container" ng-app="SisVendasGo" ng-controller="montadoraCtrl">

    <div class="alert alert-info fade out" id="bsalert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Informação!</strong> Adicionado com sucesso!
    </div>


    <div class="panel panel-primary">

        <div class="panel-heading ">Cadastra Montadora</div>
        <div class="panel-body">
            <form class="form-horizontal">

                <div class="form-group">
                    <label for="ano" class="col-sm-2 control-label">Ano</label>
                    <div class="col-sm-6">
                        <input ng-model="ano_carro" type="number" 
                               class="form-control" id="ano" placeholder="Ano Fabricação" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="ano_modelo" class="col-sm-2 control-label">Ano Modelo</label>
                    <div class="col-sm-6">
                        <input ng-model="ano_modelo"  type="number" 
                               class="form-control" id="ano_modelo" placeholder="Ano Modelo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cor" class="col-sm-2 control-label">Cor</label>
                    <div class="col-sm-6">
                        <input ng-model="cor" type="text"
                               class="form-control" id="cor" placeholder="Cor Carro">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Completo" class="col-sm-2 control-label">Completo</label>
                    <div class="col-sm-6">
                        <select ng-model="opcionais" class="form-control">
                            <option ng-repeat="op in opc" value="{{op.model}}">{{op.value}}</option>
                        </select>
                    </div>
                </div>                     

            </form> 
        </div>
    </div>

    <div class="panel panel-primary">

        <div class="panel-heading ">Cadastra Documento</div>
        <div class="panel-body">
            <form class="form-horizontal">

                <div class="form-group">
                    <label for="marca" class="col-sm-2 control-label">Marca</label>
                    <div class="col-sm-6">
                        <input ng-model="marca"  type="text" 
                               class="form-control" id="marca" placeholder="Marca">
                    </div>
                </div>

                <div class="form-group">
                    <label for="numero_chassi" class="col-sm-2 control-label">Número Chassi</label>
                    <div class="col-sm-6">
                        <input ng-model="numero_chassi"  type="text" 
                               class="form-control" id="numero_chassi" placeholder="Número Chassi">
                    </div>
                </div>

                <div class="form-group">
                    <label for="placa_veiculo" class="col-sm-2 control-label">Placa Veículo</label>
                    <div class="col-sm-6">
                        <input ng-model="placa_veiculo"  type="text" 
                               class="form-control" id="placa_veiculo" placeholder="Placa Veículo">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-7">
                        <button ng-click="salvar()" type="submit" 
                                id="btn-salvar"  class="btn btn-primary ">Cadastrar</button>
                    </div>
                </div>


            </form>
        </div>
    </div>

    <?php require_once 'rodape.php'; ?>   