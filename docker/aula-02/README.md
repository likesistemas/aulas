# Docker - Aula 02
Nesta aula vamos aprender a usar os volumes e rede no Docker.

## Volumes
Como explicado na aula anterior os volumes s�o usados para persistir dados mesmo depois que o container � desligado.
Existem dois tipos de volumes:

### Bind mount
Neste tipo de montagem voc� faz um apontamento de uma pasta do host para dentro do container.

```
docker run -v ${PWD}:/usr/share/nginx/html/ -p 8080:80 nginx:latest 
```
Esse comando acima roda o container passando a pasta atual para o container.

### Volume mount
Aqui voc� pode criar um volume nomeado e utiliza-lo dentro do container, por padr�o o Docker salva em uma pasta dentro da sua estrutura. 

```
docker volume create hello
```
O comando acima cria um volume com o nome *hello*. 
[Documenta��o](https://docs.docker.com/engine/reference/commandline/volume_create/)

```
docker run -d -v hello:/world busybox ls /world
```
O comando cima roda o container mostrando o conte�do do volume *hello* criado acima.
[Documenta��o](https://docs.docker.com/engine/reference/commandline/run/#mount-volume--v---read-only)

```
docker run -v ${PWD}:/usr/share/nginx/html/ -p 8080:80 nginx:latest
```

## Rede

Com a rede poderia criar um isolamento entre containers e se comunicar entre eles de forma mais f�cil sem precisar se preocupar com o ip (usando seus nomes).

[Documenta��o](https://docs.docker.com/engine/reference/commandline/network/)

```
docker network create minha-rede
```
Neste comando criamos uma rede com o nome *minha-rede*.
[Documenta��o][https://docs.docker.com/engine/reference/commandline/network_create/]

### Exemplo
Criaremos um container nginx rodando PHP-FPM utilizando a rede criada acima.

```
docker run -d --network minha-rede --name php -p 9000:9000 -v ${PWD}/www/:/var/www/html/ php:7.3-fpm
```
O comando acima ir� rodar um container com PHP FPM na porta 9000. Note que foi utilizado a op��o "-d" que significa para o container rodar em background (detach), n�o em primeiro plano.
Caso queira visualizar os logs do container, pode usar:

```
docker logs php
```

```
docker run --network minha-rede -p 8080:80 -v "${PWD}/www/":/usr/share/nginx/html/ -v "${PWD}/conf/default.conf":/etc/nginx/conf.d/default.conf nginx:latest
```
O comando acima ir� rodar um container com Nginx na mesma rede do PHP. Note na configura��o do nginx ele est� lincando com o nome *php:9000* e o Docker est� cuidando para linkar um com o outro.