function add_like(id_vaga){
    $.post('http://localhost/projeto_final/startechlds/php/add_like.php',{vaga:id_vaga}, function(dados){
        if(dados == 'sucesso'){
            alert("Vaga Favoritada com Sucesso");
        }
        else if(dados == "removida"){
            alert("Vaga Removida dos favoritos");
            window.location.reload();  
        }
        else{
            alert("Erro: ");
        }
    });
}