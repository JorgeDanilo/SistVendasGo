
/**
 * Controlador Responsável pelos fluxos pertinentes ao processo da montadora.
 * @type type
 */
app.controller('montadoraCtrl', function ($scope, $http) {
    
    
    /**
     * Responsável por salvar os carros e documentos via api rest. 
     */
    $scope.salvar = function() {                 
        
        $http({
           method: 'POST',
           url : 'montadora.php?action=save',
           data : {
               ano_carro : $scope.ano_carro,
               ano_modelo : $scope.ano_modelo,
               cor : $scope.cor,
               opcionais: $scope.opcionais,
               marca : $scope.marca,
               numero_chassi : $scope.numero_chassi,
               placa_veiculo : $scope.placa_veiculo                           
           }
        }).then(function ( response ) {
            alert(JSON.parse(response.data));
        }, function error(response) {
            console.log(response);
        });                
    }
    
    
    /**
     * Responsável por listar todos os dados de carros via api rest.
     */
    $scope.listarTodos = function() {
        $http({           
            method: 'GET',
            url: 'montadora.php?action=listaTodos'            
        }).then(function mySuccess(response) {           
           $scope.dados = response.data;
        });
    }       
    
    
    /**
     * Responsável por limpar o formulário
     */
    $scope.clean = function() {
        $scope.id = "";
        $scope.ano_carro = "";
        $scope.ano_modelo = "";
        $scope.cor = "";
        $scope.opcionais = "";
        $scope.marca = "";
        $scope.numero_chassi = "";
        $scope.placa_veiculo = "";        
    }
    
    
    /**
     * Opcionais do carro.
     */
     $scope.opc = [
        {value : "Sim", model : 1},
        {value : "Não", model : 0}
      ];

});
