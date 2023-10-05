# Teste - Quality Sistemas

Neste caso, optei por utilizar o framework **Lumen** devido à sua leveza e alta velocidade, embora ele ofereça menos recursos em comparação com o **Laravel**.

Decidi desenvolver o front-end utilizando o **PHP Blade** para manter a integração dentro do mesmo framework. No entanto, poderia ter escolhido utilizar o **React**.

Para melhorar a experiência do usuário e evitar recarregamentos desnecessários, implementei **JavaScript** nos métodos dos formulários e nas listagens.

Para permitir o upload de imagens, é fundamental criar um link simbólico entre a pasta `storage/app/public` e a pasta `public/storage`. Para isso, você pode executar o arquivo "mklink.bat" na raiz do projeto.

**Para instalar o projeto:**

1. Execute `composer install` na raiz do projeto.
2. Crie um arquivo `.env` na raiz do projeto, copie o conteúdo do arquivo `.env.example` e altere as configurações de banco de dados.
3. Utilize `php artisan migrate` para criar as tabelas no banco de dados.
4. Utilize `php artisan db:seed` para popular as tabelas com dados fictícios de testes, isso irá criar 1000 pessoas, cada uma com 4 dependentes.

Para iniciar o projeto, execute `php -S localhost:8080` a partir da pasta public.

## Lumen PHP Framework - Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
