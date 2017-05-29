
<!-- Include do cabecalho na página -->

<?php require_once 'cabecalho.php'; ?>

<div class="container" ng-app="SisVendasGo" ng-controller="montadoraCtrl" ng-init="geraNumeroChassiAleatorio()">

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

    <div class="modal fade" id="modalSuccess" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Informação</h4>
        </div>
        <div class="modal-body">
          {{mensagem}}
        </div>
        <div class="modal-footer">          
          <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="clean()">Ok</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div>

    <!-- Include do ropadé da pagina -->
    <?php require_once 'rodape.php'; ?>   