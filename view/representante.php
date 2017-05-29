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
                               class="form-control" id="nome" placeholder="Nome do Representante">
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

<?php require_once 'modalCamposObrigatorios.php'; ?>

</div>

<?php require_once 'rodape.php'; ?>