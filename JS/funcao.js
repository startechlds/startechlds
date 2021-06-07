function add_like(id_vaga){
    $.post('http://localhost/projeto_final/startechlds/php/add_like.php',{vaga:id_vaga}, function(dados){
        if(dados == 'sucesso'){
            alert("Vaga  Favoritada com Sucesso");
        }
        else if(dados == "removida"){
            alert("Vaga removida dos favoritos");
        }
        else{
            alert("Erro: ");
        }
    });
}