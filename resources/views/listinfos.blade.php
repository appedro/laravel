<HTML>
    <HEAD><TITLE>Formulário de cadastro</TITLE></HEAD>
    <BODY>
        <div class="container d-flex justify-content-center">
            <div class="form-group row mt-4">
                <table class="table" id="tabela" style="transform: scale(0.8)">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Tel. 1</th>
                        <th scope="col">Tel. 2</th>
                        <th scope="col">Tel. 3</th>
                        <th scope="col">Tel. 4</th>
                        <th scope="col">Tel. 5</th>
                        <th scope="col">Tel. 6</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Nº</th>
                        <th scope="col">UF</th>
                        <th scope="col">Complem.</th>
                        <th scope="col">CEP</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr id="tablebody">
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
        <script>
        $(document).ready(function(){
            $.ajax({
                type: "GET",
                url:  "{{route('api.show',['user'=>$user])}}",
                success: function(data){
                    for(i=0;i<Object.keys(data).length-4;i++){
                        const key = Object.keys(data)[i];
                        $('#tablebody').append('<td>'+data[key]+'</td>')
                    }
                }
            })
        })
        </script>
    </BODY>
</HTML>
