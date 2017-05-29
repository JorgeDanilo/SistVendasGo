/**
 * Controlador Responsável pelos fluxos pertinentes aos representantes.
 * @type type
 */

app.controller('representanteCtrl', function( $scope, $http ) {
    
    /**
     * Responsável por enviar os dados dos representantes via api rest.
     * @returns {undefined}
     */
    $scope.salvar = function() {   
        console.log($scope.nome);
      if ( validarCamposObrigatorios($scope.nome) ) {
          $http({
             method: 'POST',
             url : 'representante.php?action=save',
             data : {
                 nome : $scope.nome,                                      
             }
          }).then(function ( response ) {       
            $('#modalSuccess').modal();     
                $scope.mensagem = JSON.parse(response.data);            
            });                
        }
      } 
        
    
    $scope.clean = function() {
        $scope.id = "";
        $scope.nome = "";
    }
    
    function validarCamposObrigatorios(nome) {
        if ( angular.isUndefined(nome) || nome == "" ) {
            $('#modalCamposObrigatorios').modal();
            $scope.msg = "O nome do representante é obrigatório";
            return false;
        }
        return true;
    }    
    
});

