<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    @include('parts.scripts')
    <title>Cadastros - {{ env('APP_NAME') }}</title>
</head>

<body>
    <div id="conteudoGeral">
        @include('parts.header')
        <div id="baixoGeral">
            @include('parts.nav-menu')
            <div id="conteudoDir">
                <div id="listaPessoas">
                    <h1>Cadastros</h1>
                    <a href="javascript:;" class="btPadraoExcluir" id="delete_all">Excluir</a>
                    <table id="tLista" cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                                <th width="5%"><input type="checkbox" class="checkbox" id="select_all" /></th>
                                <th width="5%">ID</th>
                                <th width="5%">Foto</th>
                                <th class="tL">Nome</th>
                                <th width="15%">Dt Nasc</th>
                                <th width="25%">Email</th>
                                <th width="7%">Dep</th>
                                <th width="7%">St</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template>
                                <tr>
                                    <td align="center" style="border-left:0;">
                                        <input name="chkStatus" type="checkbox" class="checkbox" />
                                    </td>
                                    <td name="id" align="center">1</td>
                                    <td name="photo" align="center">
                                        <img src="images/fotoCadastro.png" class="profile" width="30"
                                            height="30" />
                                    </td>
                                    <td name="name"><a href="/cadastros/1/" class="linkUser"
                                            title="Clique aqui para editar este cadastro." id="nm_">
                                            Fulado de Tal
                                        </a>
                                    </td>
                                    <td name="birth" align="center">31/12/1970</td>
                                    <td name="email" align="right">email@provedor.com</td>
                                    <td name="dependents" align="center">
                                        <a href="#" class="btAdicionar"
                                            title="Adicionar dependentes para este cadastro.">
                                        </a>
                                    </td>
                                    <td name="tootle_status" align="center">
                                        <a href="javascript:;" class="" title="Ativar/Desativar este cadastro."
                                            id="bol_0">
                                        </a>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div id="paginacao">
                    <a id="prevPage" href="#" class="btSeta1"></a>
                    <div id="pags">1 de 10</div>
                    <a id="nextPage" href="#" class="btSeta2"></a>
                    <select id="limit_items">
                        @foreach ([1, 3, 5, 10, 15, 30, 60, 100] as $itemPage)
                            <option @if (request()->get('itens') ?? 3 == $itemPage) selected="" @endif value="{{ $itemPage }}">
                                {{ $itemPage }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/people-list.js"></script>
</body>

</html>
