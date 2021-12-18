## Sistema de controle de vendas

Sistema de Vendas

## Configurações 

1. Clone your fork into the `~/Sites/laravel` folder, by running the following command *with your username placed into the {username} slot*:
    ```bash
    git clone https://github.com/lucyanpeixoto/syscon.git
    ```
2. Entre no diretório criado
    ```bash
    cd syscon
    ```
3. Execute os comanddos para configuração inicial
    ```bash
    composer install
	cp .env.exmaple .env (altere os dados de acesso ao banco)
	php artisan migrate
	php artisan db:seed
	php artisan serve
    ```

### Dados para autenticação 

Email: vendendor@email.com
Password: 12345

### Links importantes

[Documentação](https://syscon-api-docs-cpzgf29ex-lucyan.vercel.app/)
[Collection de endpoints no Insomnia](https://www.dropbox.com/s/nij3a7ptnrbg9yg/Insomnia.json.zip?dl=0)
[Vídeo de explicão](https://www.loom.com/share/ff182233263c43c585963d86fa3b08a3)