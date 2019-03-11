# Trackeamento de Pedidos em Tempo Real (Pizza) - Laravel, Vue & Pusher

## Design Patterns
- Simple Factory
- Builder
- Singleton
- Observer

## Alunos
- Gianluca Bine
- João Dutra Cristoforu

## Instalação

1. Clonar o repositorio e entrar na sua pasta.
1. `composer install`
1. renomear ou copiar `.env.example` para `.env`
1. Configurar as credenciais do banco de dados no arquivo `.env`
1. Mudar `BROADCAST_DRIVER` para `pusher` no arquivo `.env`
1. Colocar as credenciais do Pusher no arquivo `.env`. Se necessário, mudar o cluster em `config/broadcasting.php`
1. `php artisan migrate:refresh --seed`
1. `php artisan key:generate`
1. Colocar a chave do Pusher em `resources/assets/js/bootstrap.js`. Se necessário, mudar o cluster.
1. `npm install` ou `yarn install`
1. `npm run watch` ou `yarn watch`
1. `php artisan serve`
1. Visitar localhost:8000 no navegador
1. Registrar um novo usuário e um pedido de pizza. Abrir uma nova janela, ir em admin, mudar o status do pedido, olhar na outra janela como status muda em tempo real.

![alt text](https://raw.githubusercontent.com/Pr3d4dor/pizza-manager-realtime/master/pizza-manager-realtime/images/Desenho1.png)
