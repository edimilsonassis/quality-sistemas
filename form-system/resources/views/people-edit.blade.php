<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    @include('parts.scripts')
    <title>Editar Cadastro - {{ env('APP_NAME') }}</title>
</head>

<body>
    <div id="conteudoGeral">
        @include('parts.header')
        <div id="baixoGeral">
            @include('parts.nav-menu')
            <div id="conteudoDir">
                <div id="listaPessoas">
                    <h1>Editando um Cadastro</h1>
                    <form id="formCadastrar" method="post" enctype="multipart/form-data" action="">
                        <img id="imgFoto" class="profile" src="{{ $people->getPhotoAttribute() }}" width="100"
                            height="100" /><br /><br />
                        <label for="cNome">Nome</label><br />
                        <input required maxlength="255" id="cNome" name="cNome"
                            value="{{ $people->name }}" /><br />
                        <label for="cDataNasc">Data de Nascimento</label><br />
                        <input required id="cDataNasc" type="date" name="cDataNasc" min="{{ $minAge }}"
                            max="{{ $maxAge }}" value="{{ $people->birth->format('Y-m-d') }}" /><br />
                        <label maxlength="255" for="cEmail">E-Mail</label><br />
                        <input required id="cEmail" name="cEmail" type="email"
                            value="{{ $people->email }}" /><br />
                        <label for="cFoto">Foto (somente .jpg - máximo de 200Kb)</label><br />
                        <input id="cFoto" name="cFoto" type="file" accept="image/jpeg" /><br />
                        <button type="submit" href="javascript:;" id="save" class="btPadrao">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const peopleId = {{ $people->id }};
    </script>
    <script src="/js/people-edit.js"></script>
</body>

</html>
