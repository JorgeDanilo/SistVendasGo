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
        $http({
           method: 'POST',
           url : 'representante.php?action=save',
           data : {
               nome : $scope.nome,                                      
           }
        }).then(function ( response ) {            
            alert(JSON.parse(response.data));            
        });                
    }
    
    $scope.clean = function() {
        $scope.id = "";
        $scope.nome = "";
    }
    
    
    
    
});

