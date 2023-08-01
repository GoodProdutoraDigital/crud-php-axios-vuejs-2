var url = 'database/crud.php'

var app = new Vue({
    el: '#app',
    data: {
        celulares: [],
        marca: '',
        modelo: '',
        estoque: '',
        total: 0
    },
    methods: {
        btnEnviar: async function () {
            await Swal.fire({
                title: 'Adicionar Novo',
                html:
                '<label>Marca:</label>' +
                '<input id="marca" class="swal2-input">' +
                '<label>Modelo:</label>' +
                '<input id="modelo" class="swal2-input">' +
                '<label>Estoque:</label>' +
                '<input id="estoque" class="swal2-input">',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Salvar',
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#3885d6',
                preConfirm: () => {
                    return [
                        this.marca = document.getElementById('marca').value,
                        this.modelo = document.getElementById('modelo').value,
                        this.estoque = document.getElementById('estoque').value,
                    ]
                }
            })

            if (this.marca == "" || this.modelo == "" || this.estoque == "") {
                Swal.fire({
                    icon: 'info',
                    title: 'Preencha os campos'
                })

            } else {

                this.addCel();
                const success = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });

                success.fire({
                    icon: 'success',
                    title: 'Adicionado com successo'
                })
            }
        },
        btnEditar: async function (id, marca, modelo, estoque) {
            const {value: formEdit} = await Swal.fire({
                title: 'Editar Registro',
                html:
                `<input id="id" value="${id}" type="hidden" class="swal2-input"><label>Marca:</label><input id="marca" value="${marca}" class="swal2-input"><label>Modelo:</label><input id="modelo" value="${modelo}" class="swal2-input"><label>Estoque:</label><input id="estoque" value="${estoque}" class="swal2-input">`,
                focusConfirm: false,
                showCancelButton: true,
                preConfirm: () => {
                    return [
                        id = document.getElementById('id').value,
                        marca = document.getElementById('marca').value,
                        modelo = document.getElementById('modelo').value,
                        estoque = document.getElementById('estoque').value
                    ]
                }
            })

            if (formEdit){
                this.editCel(id, marca, modelo, estoque)
                Swal.fire(
                    'Atualizado',
                    'Registro atualizado',
                    'success'
                )
            }
        },
        btnExcluir: function (id) {
            Swal.fire({
                title: 'Tem certeza que dejesa apagar ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Deletar'
            }).then((result) => {
                if(result.value){
                    this.delCel(id)
                    Swal.fire(
                        'Deletado',
                        'O item foi deletado',
                        'success'
                    )
                }
            })
        },

        listarCel: function(){
            axios.post(url, {opt:4}).then(resp => {
                this.celulares = resp.data
                console.log(this.celulares)
            })
        },

        addCel: function(){
            axios.post(url, {opt:1, marca: this.marca, modelo: this.modelo, estoque: this.estoque}).then(resp => {
                this.listarCel()
            })
            this.marca = ''
            this.modelo = ''
            this.estoque = 0
        },

        editCel: function(id, marca, modelo, estoque){
            axios.post(url, {opt:2, id: id, marca: marca, modelo: modelo, estoque: estoque}).then(resp => {
                this.listarCel()
            })
        },

        delCel: function(id){
            axios.post(url, {opt:3, id: id}).then(resp => {
                this.listarCel()
            })
        }

    },
    created() {
        this.listarCel()
    },
    computed: {
        totalCel(){
            this.total = 0
            for(celular of this.celulares){
                this.total = this.total + parseInt(celular.estoque)
            }
            return this.total
        }
    },
});