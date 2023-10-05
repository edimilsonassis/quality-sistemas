<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    @include('parts.scripts')
    <title>Novo Cadastro - {{ env('APP_NAME') }}</title>
</head>

<body>
    <div id="conteudoGeral">
        @include('parts.header')
        <div id="baixoGeral">
            @include('parts.nav-menu')
            <div id="conteudoDir">
                <div id="listaPessoas">
                    <h1>Dependentes</h1>
                    <div id="infoDep">
                        <img class="profile" src="{{ $people->getPhotoAttribute() }}" width="100" height="100" />
                        <br /><br />
                        <table id="tListaCad" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="tituloTab">Nome</td>
                                <td>{{ $people->name }}</td>
                            </tr>
                            <tr>
                                <td class="tituloTab">Data de Nascimento</td>
                                <td>{{ $people->birth->format('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td class="tituloTab">Email</td>
                                <td>{{ $people->email }}</td>
                            </tr>
                        </table>
                        <form id="frmAdicionaDep" action="">
                            <div class="agrupa mB mR">
                                <label for="cNomeDep">Nome</label><br />
                                <input required type="text" maxlength="255" name="cNomeDep" id="cNomeDep" />
                            </div>
                            <div class="agrupa">
                                <label for="cDataNasc">Data de Nascimento</label><br />
                                <input required type="date" min="{{ $minAge }}" max="{{ $maxAge }}"
                                    name="cDataNasc" id="cDataNasc" />
                            </div>
                            <button type="submit" class="btPadrao">Adicionar</button>
                        </form>
                        <table id="tLista" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                    <th width="60%" class="tL">Nome do Dependente</th>
                                    <th width="33%">Data de Nascimento</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template>
                                    <tr>
                                        <td name="name">Fulano de Tal Silva</td>
                                        <td name="birth" align="center">01/01/1980</td>
                                        <td name="action" align="center"><a href="" class="btRemover"></a></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const peopleId = {{ $people->id }};
    </script>
    <script src="/js/people-dependents.js"></script>
</body>

</html>
