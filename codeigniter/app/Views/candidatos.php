<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MS - Teste</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

</head>
<body>
    <header>
        <h3>Avaliação dos Candidatos</h3>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Dados do candidato:</h4>
                <form id="form" class="form-group">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do candidato avaliado" autocomplete="off" >
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail do candidato" autocomplete="off" >
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="nota" class="form-label">Nota de Desempenho: </label>
                        <output>5</output>
                        <input type="range" name="nota" class="form-range" id="nota" min="0" max="10" step="0.5" oninput='this.previousElementSibling.value = this.value'  onchange="alteraCor()">
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button" onclick="salvar()" >Salvar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8 mt-4 mb-5">
                <div class="row mt-4 mb-4">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="search" placeholder="Pesquisar" onkeyup="pesquisar()">
                    </div>
                </div>
                <div class="row">
                    <table class="table table-light table-striped" id="tb">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                    </table>
                </div>                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            carregar();
        });
    </script>
    <script src="ajax.js"></script>
</body>
</html>