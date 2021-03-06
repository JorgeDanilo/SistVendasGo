
/**
 * Controlador Responsável pelos fluxos pertinentes ao processo da montadora.
 * @type type
 */
app.controller('montadoraCtrl', function ($scope, $http) {          
    
    /**
     * Responsável por enviar os dados da montadora via api rest.
     */
    $scope.salvar = function() {                 
        if ( validarCamposObrigatorios() ) {
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
                 placa_veiculo : $scope.placa_veiculo,
                 valor_unitario : $scope.valor_unitario                           
             }
            }).then(function ( response ) {
                $scope.mensagem = JSON.parse(response.data);
                $("#modalSuccess").modal();          
            }, function error(response) {
                console.log(response);
            });  
        }                      
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
        $scope.valor_unitario = "";    
        $scope.geraNumeroChassiAleatorio();    
    }
    
    
    /**
     * Opcionais do carro.
     */
     $scope.opc = [
        {value : "Sim", model : 1},
        {value : "Não", model : 0}
      ];


      $scope.geraNumeroChassiAleatorio = function() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        for( var i=0; i < 37; i++ ) {
          text += possible.charAt(Math.floor(Math.random() * possible.length));
        }

        $scope.numero_chassi = text;                
      }

      function validarCamposObrigatorios() {        
        if ( angular.isUndefined($scope.ano_carro) || $scope.ano_carro == "" || $scope.ano_carro == null 
            || angular.isUndefined($scope.ano_modelo) || $scope.ano_modelo == "" || $scope.ano_modelo == null
            || angular.isUndefined($scope.cor) || $scope.cor == "" 
            || angular.isUndefined($scope.opcionais) || $scope.opcionais == ""
            || angular.isUndefined($scope.marca) || $scope.marca == ""
            || angular.isUndefined($scope.numero_chassi) || $scope.numero_chassi == ""
            || angular.isUndefined($scope.placa_veiculo) || $scope.placa_veiculo == ""
            || angular.isUndefined($scope.valor_unitario) || $scope.valor_unitario == "" ) {
            $('#modalCamposObrigatorios').modal();
            $scope.msg = "Campos obrigatórios não preenchidos";
            return false;
        }
        return true;
    } 

});
