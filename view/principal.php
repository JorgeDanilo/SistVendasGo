<?php require_once 'cabecalho.php'; ?>

<div class="panel panel-default" ng-app="SisVendasGo" ng-controller="montadoraCtrl" >

    <div class="panel-heading">Bem vindo</div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>                    
                    <th>Ano Fabricação</th>
                    <th>Ano Modelo</th>
                    <th>Cor</th>
                    <th>Completo</th>
                </tr>
            </thead>
            <tbody ng-init="listarTodos()" >            
                    <tr dir-paginate="dado in dados | filter:search | orderBy:sortKey:reverse | itemsPerPage:5" pagination-id="prodx">
                    <td>{{ dado.ano_fabricacao }}</td>
                    <td>{{ dado.ano_modelo }}</td>
                    <td>{{ dado.cor }}</td>
                    <td ng-if="dado.opcionais == 1">Sim</td>
                    <td ng-if="dado.opcionais == 0">Não</td>
                
                </tr>
            </tbody>
        </table>
        <dir-pagination-controls pagination-id="prodx" boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="view/dir_pagination.tpl.html"></dir-pagination-controls>
    </div>


</div>

<?php require_once 'rodape.php'; ?>   

