<HTML>
    <HEAD><TITLE>Formulário de cadastro</TITLE></HEAD>
    <BODY>
        <div class="container d-flex justify-content-center">
            <div class="form-group row mt-4">

                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome</label>
                        <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Nome">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Sobrenome</label>
                        <input type="text" class="form-control" name="lastname" id="inputPassword4" placeholder="Sobrenome">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">E-mail</label>
                      <input type="email" class="form-control" name="email" id="inputAddress" placeholder="fulano@dominio.com">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Data de nascimento:</label>
                        <input type="text" class="form-control" name="birthday" style="width:200px" id="birthday" placeholder="06/06/1996">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">CEP</label>
                      <input type="text" class="form-control" name="zip" id="postalcode" placeholder="00000-000">

                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Endereço</label><BR>
                        <input type="text" class="form-control" name="address" style="width:400px;display:inline-block" id="address" placeholder="Rua XV de Novembro">
                        <input type="text" class="form-control" name="number" placeholder="Nº" style="width:80px;display:inline-block">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="district" style="width:240px;display:inline-block" id="district" placeholder="Bairro">
                        <input type="text" class="form-control" name="city" placeholder="Cidade" id="city" style="width:180px;display:inline-block">
                        <input type="text" class="form-control" name="uf" placeholder="UF" id="UF" style="width:60px;display:inline-block">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="complement" style="width:240px;display:inline-block" id="complement" placeholder="Complemento">
                    </div>
                    <div class="form-group" id="phonegroup">
                        <label for="inputAddress2">Telefone</label><BR>
                        <input type="text" class="form-control phone" name="mainphone" style="width:490px;display:inline-block" placeholder="+55 (00) 00000-0000"><input style="margin-left:10px;margin-bottom:5px;"class="btn btn-primary" id="addphone" value="+" type="button">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                  </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
        <script>
        $(document).ready(function(){
            $('#postalcode').mask('00000-000');
            $('.phone').mask('+00 (00) 00000-0000');
            $('#birthday').mask('00/00/0000');
            $("#postalcode").on("keypress keyup", function(){
                if($(this).val().length==9 && $("#city").val().length==0 && $("#district").val().length==0){
                    const spt = $(this).val().split("-")
                    const cep = spt[0]+spt[1]
                    $.ajax({
                        url: "https://viacep.com.br/ws/"+cep+"/json/",
                        type: "GET",
                        success: function(data){
                            if(JSON.stringify(data.erro)){
                                return
                            }else{
                                $("#district").val(JSON.stringify(data.bairro).replace(/\"/g, ""))
                                $("#address").val(JSON.stringify(data.logradouro).replace(/\"/g, ""))
                                $("#city").val(JSON.stringify(data.localidade).replace(/\"/g, ""))
                                $("#UF").val(JSON.stringify(data.uf).replace(/\"/g, ""))
                                if(JSON.stringify(data.complemento).replace(/\"/g, "").length>0){
                                    $("#complement").val(JSON.stringify(data.complemento).replace(/\"/g, ""))
                                }
                            }
                        }
                    })
                }
            })
            $("#addphone").on("click", ()=>{
                if($('.phone').length<=5){
                    $("#phonegroup").append('<BR><input type="text" class="form-control phone mt-3" name="phone'+($('.phone').length+1)+'" style="width:490px;display:inline-block" placeholder="+55 (00) 00000-0000">')
                }else{
                    alert("Limite de telefones atingido.")
                }
            })
        })
        </script>
    </BODY>
</HTML>
