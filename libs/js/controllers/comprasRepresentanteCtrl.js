
app.controller("compraRepresentanteCtrl", function($scope, $http) {
    
    $scope.inicializaDados = function () {
        $http({
            method: 'GET',
            url: 'representante.php?action=listaRepresentantes'
        }).then(function success(response) { 
             console.log(response);
            $scope.representantes = response.data;
        });
        
        $http({
           method: 'GET',
           url: 'representante.php?action=listaMontagem'
        }).then(function success(response) {
           console.log(response);
           $scope.dadosMontagem = response.data;
        });        
    };
    
    $scope.comprar = function() {

        $http({
            method : 'POST',
            url : 'comprasRepresentantes.php?action=comprarVeiculo',            
        }).then(function success(response) {
            console.log(response);
        });
    };
    
    
    
});
