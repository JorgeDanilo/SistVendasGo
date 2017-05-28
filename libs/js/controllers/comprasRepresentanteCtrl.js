
app.controller("compraRepresentanteCtrl", function($scope, $http) {


    /**
    * Responsável por iniciar os dados ao abrir a página.
    */  
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

    /**
    * Responsável por realizar o fluxo de comprar.
    */       
    $scope.comprar = function( dadosMontagem ) {

        $scope.dadosFinalizarCompras = dadosMontagem;        
        $scope.corVeiculoSelecionado = $scope.dadosFinalizarCompras.cor;
        $scope.valorVeiculoSelecionado = $scope.dadosFinalizarCompras.valor;
       
        $http({
            method : 'POST',
            url : 'comprasRepresentantes.php?action=comprarVeiculo',            
        }).then(function success(response) {            
            $scope.corMaiorSaida = response.data[0].cor;             
            console.log($scope.corMaiorSaida);
            if ( $scope.corVeiculoSelecionado == $scope.corMaiorSaida ) {
                realizaCalculoValor();    
            }
            
            
        });
    };

    /**
    * Responsável por realizar o calculo do valor total.
    */
    function realizaCalculoValor() {                
        $porcentagem = (18/100) * $scope.valorVeiculoSelecionado;
        $scope.valorTotalCalculado = $scope.valorVeiculoSelecionado - $porcentagem;

        console.log($scope.valorTotalCalculado);


        // Responsável por abrir a modal.
        $("#myModal").modal();
    }
    
});

