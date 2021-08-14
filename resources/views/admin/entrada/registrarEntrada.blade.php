<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Entrdadas Diárias</title>
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
    
    <script src="{{asset('datepicker/js/jquery-3.3.1.slim.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('datepicker/css/bootstrap-datepicker.css')}}">
    <script src="{{asset('datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('datepicker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>

</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="text-white">
            <h4>
                Registrar Entrada
            </h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('storeEntrada')}}" autocomplete="off">
            @csrf
            <div class="form-row mt-4">
                <div class="col-md-4">
                    <fieldset disabled>
                        <label class="labelCard" for="codigoEntrada">Código da Entrada:</label>
                        <input type="text" class="form-control form-control-sm" id="codigoEntrada" name="codigoEntrada" placeholder="CÓDIGO">
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="valorEntrada">Valor da Entrada*:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-dollar-sign"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('valorEntrada') is-invalid @enderror" id="valorEntrada" name="valorEntrada" placeholder="Valor">
                        @error('valorEntrada')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>    
                        @enderror
                    </div>
                </div> 
                <div class="col-md-4">
                    <label class="labelCard" for="dataEntrada">Data*:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('dataEntrada') is-invalid @enderror" id="dataEntrada" name="dataEntrada">
                        @error('dataEntrada')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>    
                        @enderror
                    </div>
                </div>
            </div> 
            <div class="form-row">
                <div class="col-md-12">
                    <label class="labelCard" for="descricaoEntrada">Descrição*:</label>
                    <textarea class="form-control @error('descricaoEntrada') is-invalid @enderror" id="descricaoEntrada" name="descricaoEntrada" placeholder="Descrição da Entrada" rows="3"></textarea>
                    @error('descricaoEntrada')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
            </div>
            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Salvar</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-secondary btn-sm" href=""><span class="fas fa-eraser"></span> Limpar</a>
                </div>
                <div class="mb-2 mr-2">
                    <button type="button" class="btn btn-danger btn-sm"><span class="fas fa-ban"></span> Cancelar</button>
                </div>
            </div>
        </form>    
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>

    <script type="text/javascript">
        $('#dataEntrada').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script>
</body>
</html>