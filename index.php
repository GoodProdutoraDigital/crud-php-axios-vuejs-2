<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud-PHP-VueJS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheed" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="main.css">

</head>

<body>

    <header>
        <h2 class="text-center text-dark"><span class="badge badge-primary">CRUD VUEJS PHP</span></h2>
    </header>

    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col">
                    <button @click="btnEnviar" class="btn btn-success" title="Novo">
                        <i class="fas fa-plus-circle fa-2xs"></i>
                    </button>
                </div>
                <div class="col text-right">
                    <h5>Total Estoque: <span class="badge badge-success">{{ totalCel }}</span></h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <tread>
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Estoque</th>
                                <th>Ação</th>
                            </tr>
                        </tread>
                        <tbody>
                            <tr v-for="(cel, index) of celulares">
                                <td>{{ cel.id }}</td>
                                <td>{{ cel.marca }}</td>
                                <td>{{ cel.modelo }}</td>
                                <td>
                                    <div class="col-md-8">
                                        <input type="number" v-model.number="cel.estoque" class="form-control text-right"disabled></input>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-secondary" title="Editar"
                                            @click="btnEditar(cel.id, cel.marca, cel.modelo, cel.estoque)">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn btn-danger" title="Excluir"
                                            @click="btnExcluir(cel.id)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="main.js"></script>

</body>

</html>