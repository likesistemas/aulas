# Docker - Aula 02
Nesta aula vamos aprender a usar os volumes e rede no Docker.

## Volumes
Como explicado na aula anterior os volumes são usados para persistir dados mesmo depois que o container é desligado.
Existem dois tipos de volumes:

### Bind mount
Neste tipo de montagem você faz um apontamento de uma pasta do host para dentro do container.

```
docker run -v ${PWD}:/usr/share/nginx/html/ -p 8080:80 nginx:latest 
```
Esse comando acima roda o container passando a pasta atual para o container.

### Volume mount
Aqui você pode criar um volume nomeado e utiliza-lo dentro do container, por padrão o Docker salva em uma pasta dentro da sua estrutura. 

```
docker volume create hello
```
O comando acima cria um volume com o nome *hello*. 
[Documentação](https://docs.docker.com/engine/reference/commandline/volume_create/)

```
docker run -d -v hello:/world busybox ls /world
```
O comando cima roda o container mostrando o conteúdo do volume *hello* criado acima.
[Documentação](https://docs.docker.com/engine/reference/commandline/run/#mount-volume--v---read-only)

```
docker run -v ${PWD}:/usr/share/nginx/html/ -p 8080:80 nginx:latest
```

## Rede

Com a rede poderia criar um isolamento entre containers e se comunicar entre eles de forma mais fácil sem precisar se preocupar com o ip (usando seus nomes).

[Documentação](https://docs.docker.com/engine/reference/commandline/network/)

```
docker network create minha-rede
```
Neste comando criamos uma rede com o nome *minha-rede*.
[Documentação][https://docs.docker.com/engine/reference/commandline/network_create/]

### Exemplo
Criaremos um container nginx rodando PHP-FPM utilizando a rede criada acima.

```
docker run -d --network minha-rede --name php -p 9000:9000 -v ${PWD}/www/:/var/www/html/ php:7.3-fpm
```
O comando acima irá rodar um container com PHP FPM na porta 9000. Note que foi utilizado a opção "-d" que significa para o container rodar em background (detach), não em primeiro plano.
Caso queira visualizar os logs do container, pode usar:

```
docker logs php
```

```
docker run --network minha-rede -p 8080:80 -v "${PWD}/www/":/usr/share/nginx/html/ -v "${PWD}/conf/default.conf":/etc/nginx/conf.d/default.conf nginx:latest
```
O comando acima irá rodar um container com Nginx na mesma rede do PHP. Note na configuração do nginx ele está lincando com o nome *php:9000* e o Docker está cuidando para linkar um com o outro.