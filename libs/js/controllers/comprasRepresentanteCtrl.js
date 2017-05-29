
app.controller("compraRepresentanteCtrl", function($scope, $http) {

    /**
    * Responsável por iniciar os dados ao abrir a página.
    */  
    $scope.inicializaDados = function () {
        $http({
            method: 'GET',
            url: 'representante.php?action=listaRepresentantes'
        }).then(function success(response) {              
            $scope.representantes = response.data;
        });
        
        $http({
           method: 'GET',
           url: 'representante.php?action=listaMontagem'
        }).then(function success(response) {           
           $scope.dadosMontagem = response.data;
        });        
    };

    /**
    * Responsável por realizar o fluxo de comprar.
    */       
    $scope.abrirModalFinalizarCompra = function( dadosMontagem ) {    

        if ( validarCamposObrigatorios($scope.id_representante) ) {
            $scope.dadosFinalizarCompras = dadosMontagem;        
            $scope.corVeiculoSelecionado = $scope.dadosFinalizarCompras.cor;
            $scope.valorVeiculoSelecionado = $scope.dadosFinalizarCompras.valor;
            $scope.ano_fabricacaoVeiculoSelecionado = $scope.dadosFinalizarCompras.ano_fabricacao;
            $scope.anoFabricacaoUnico = [];    
           
            $http({
                method : 'POST',
                url : 'comprasRepresentantes.php?action=buscarDadosMontagem',            
            }).then(function success(response) {                       
                realizaCalculoAno();                        
                $scope.corMaiorSaida = response.data[0].cor;                                    
                realizaCalculoValorDepedendoCor( $scope.corVeiculoSelecionado, $scope.corMaiorSaida );                            
            });
        }
    };

    /**
    * Responsável por realizar o calculo do valor total.
    */
    function realizaCalculoValorDepedendoCor( corVeiculoSelecionado, corMaiorSaida ) {    
        
        if ( corVeiculoSelecionado == corMaiorSaida ) {                                
            $porcentagem = (18/100) * $scope.valorVeiculoSelecionado;
            $scope.valorTotalCalculado = $scope.valorVeiculoSelecionado - $porcentagem;                        
        } else {
            $scope.valorTotalCalculado = $scope.valorVeiculoSelecionado;            
        }    

        // Responsável por abrir a modal.
        $("#myModal").modal();
    }

    function realizaCalculoAno() {
        $http({
                method : 'GET',
                url: 'comprasRepresentantes.php?action=verificaAnoVeiculos',
            }).then(function success(success) {                                
                angular.forEach(success.data, function(dados) {                           
                     if ( dados.ano_fabricacao == $scope.ano_fabricacaoVeiculoSelecionado ) {
                        $porcentagem = (15/100) * $scope.valorVeiculoSelecionado;                        
                        $scope.valorTotalCalculado = parseFloat($scope.valorVeiculoSelecionado) + $porcentagem;                        
                    }    
                })
                              
            })   
    }


    $scope.finalizarVenda = function( ) {
        
        console.log($scope.dadosFinalizarCompras);
        console.log($scope.id_representante);
        console.log($scope.valorTotalCalculado);

        var fk_id_documento = $scope.dadosFinalizarCompras.id_documento;
        var fk_id_representante = $scope.id_representante;
        var valorTotal = $scope.valorTotalCalculado;

        $http({
            method: 'POST',
            url : 'comprasRepresentantes.php?action=finalizarVenda',
            data : {
                fk_id_documento : fk_id_documento,
                fk_id_representante: fk_id_representante,
                valorTotal : valorTotal                
            }
        }).then(function success(response) {
             alert(JSON.parse(response.data));          
        });


    }
    

    function validarCamposObrigatorios(id_representante) {
        if ( angular.isUndefined(id_representante) || id_representante == '--Selecione--' ) {
            $('#modalCamposObrigatorios').modal();
            $scope.msg = "Por favor, Selecione um representante";
            return false;
        }

        return true;
    }
    
});

