
<!-- Include do cabecalho na página -->

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

    <!-- Include do painel de cadastro de Documento -->
    <?php require_once'painelCadDocumento.php' ?>

    <!-- Include do ropadé da pagina -->
    <?php require_once 'rodape.php'; ?>   