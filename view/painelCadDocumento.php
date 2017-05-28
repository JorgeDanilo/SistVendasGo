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
                    <label for="valor_unitario" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-6">
                        <input ng-model="valor_unitario"  type="text" 
                               class="form-control" id="valor_unitario" placeholder="R$ Valor">
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