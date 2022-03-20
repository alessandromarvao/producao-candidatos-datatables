var table;

/// Carrega os valores recebidos via AJAX para a tabela
function carregar() {
    table = $("#tb").DataTable({
        "ordering": true,
        "processing": true,
        "retrieving": true,
        "searching": false,
        "info": false,
        "ajax": {
            url: "/candidatoController",
            type: "GET",
            datatype: "json",
            data: 'data.data'
        },
        columns: [
            { 'data': 'id' },
            { 'data': 'nome' },
            { 'data': 'email' },
            { 'data': 'avaliacao' },
        ]
    })
}

/// Armazena um novo usuário no Banco de Dados
function salvar() {
    $.ajax({
        url: "/candidatoController/save",
        type: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        data: $("#form").serialize(),
        success: function () {
            table.ajax.reload();
            $('#nome').val('');
            $('#email').val('');
            $('#nota').val(5);
            $('output').html('5');
        }
    });
}

/// realiza a pesquisa do usuário via AJAX
function pesquisar() {
    // Remove todos os membros do corpo da tabela
    $('#tb tbody tr').remove();

    // armazena a url da pesquisa
    let url = "/candidatoController/search?text=" + $("#search").val();

    // atualiza os valores da tabela
    table.ajax.url(url).load();
}

/// Altera a cor da nota, dependendo do seu valor
function alteraCor() {
    console.log("alterou!");
    let nota = $('#nota').val();

    switch (true) {
        // Se a nota for menor que 6, seleciona a cor vermelha para a nota
        case (nota < 6):
            $('output').css('color', 'red');
            break;
        // Se a nota for entre 6 e 8, pinta de laranja
        case (nota < 8):
            $('output').css('color', '#CA6F1E');
            break;
        // Se a nota for maior ou igual a 8, pinta de azul
        case (nota >= 8):
            $('output').css('color', '#1F618D');
            break;

    }

}