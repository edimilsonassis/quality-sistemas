<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    @include('parts.scripts')
    <title>
        {{ env('APP_NAME') }}
    </title>
</head>

<body>
    <div id="conteudoGeral">
        @include('parts.header')
        <div id="baixoGeral">
            @include('parts.nav-menu')
            <div id="conteudoDir">
                <div id="listaPessoas">
                    <h1>Início</h1>
                    Utilize os itens do menu a esquerda para navegar no sistema.
                </div>
                <br />
                <div class="text-blue-600">
                    Neste caso, optei por utilizar o framework <b>Lumen</b> devido à sua leveza e alta velocidade,
                    embora ele ofereça menos recursos em comparação com o <b>Laravel</b>.
                    <br />
                    <br />
                    Decidi desenvolver o front-end utilizando o <b>PHP Blade</b> para manter a integração dentro do
                    mesmo framework. No entanto, poderia ter escolhido utilizar o <b>React</b>.
                    <br />
                    <br />
                    Para melhorar a experiência do usuário e evitar recarregamentos desnecessários, implementei
                    <b>JavaScript</b> nos métodos dos formulários e nas listagens.
                    <br />
                    <br />
                    Para permitir o upload de imagens, é fundamental criar um link simbólico entre a pasta
                    <b>storage/app/public</b> e a pasta <b>public/storage</b>. Para isso, você pode executar o arquivo
                    "mklink.bat" na raiz do projeto.
                    <br />
                    <br />
                    <b>Para instalar o projeto:</b>
                    <br />
                    <br />
                    1 - Execute <b>composer install</b> na raiz do projeto.
                    <br />
                    2 - Crie um arquivo <b>.env</b> na raiz do projeto, copie o conteúdo do arquivo
                    <b>.env.example</b> e altere as configurações de banco de dados.
                    <br />
                    3 - Utilize <b>php artisan migrate</b> para criar as tabelas no banco de dados.
                    <br />
                    4 - Utilize <b>php artisan db:seed</b> para popular as tabelas com dados fictícios de testes, isso
                    irá criar 1000 pessoas, cada uma com 4 dependentes.
                    <br />
                    <br />
                    Para iniciar o projeto, execute <b>php -S localhost:8080</b> a partir da pasta public.
                    <br />

                </div>
            </div>
        </div>
    </div>
</body>

</html>
