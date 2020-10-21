# Docker - Aula 03

Nesta aula iremos aprender o Dockerfile e como criar uma imagem apartir dele.

## Explicação Dockerfile
``` FROM php:7.3-apache ```
Informa ao Docker qual será a imagem de origem, neste caso estamos usando a imagem do php oficial usando o apache como servidor web.

``` RUN apt-get update && apt-get install -y mariadb-client ```
Roda o comando, neste caso irá instalar um client mysql usando o apt.

``` RUN docker-php-ext-install pdo pdo_mysql ```
A imagem oficial do PHP traz esse comando para nós que pode ser usado para instalar qualquer extensão necessária.

``` COPY index.php /var/www/html/ ```
Copia arquivo para dentro do build.

## docker build
Com esse comando podemos criar uma imagem baseada em um Dockerfile.

```
docker build -t likesistemas\phpinfo:latest .
```

```
docker run -d --name phpinfo -p 8080:80 likesistemas\phpinfo:latest 
```
Aqui iremos rodar a imagem que foi criado com o comando acima.

```
docker exec -it phpinfo bash
```
Aqui iremos entrar no container e ver que o arquivo index.php está copiado lá dentro como fizemos no Dockerfile.
Se executarmos: ``` mysql --version ``` iremos perceber que o mysql também foi instalado no container.
Se acessarmos pelo navegador o [container](http://127.0.0.1:8080/) vamos ver o PHP Info e lá podemos procurar pela extensão PDO que pedirmos para instalar.