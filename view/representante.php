<?php include_once "cabecalho.php"; ?>

<div class="container" ng-app="SisVendasGo" ng-controller="representanteCtrl">
    <div class="panel panel-primary">

        <div class="panel-heading ">Cadastra Representante</div>
        <div class="panel-body">
            <form class="form-horizontal">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome do Representante</label>
                    <div class="col-sm-6">
                        <input ng-model="nome"  type="text" 
                               class="form-control" id="marca" placeholder="Nome do Representante">
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
</div>

<?php require_once 'rodape.php'; ?>