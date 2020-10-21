# docker-compose

O docker-compose é uma ferramenta cujo o objetivo é facilitar o processo de executar containers docker de forma declarativa. Cada container é executado como um serviço.

Agora tudo de vimos nas aulas de Docker vamos aplicar no docker-compose também, mas veremos que é muito mais fácil e não é mais necessário passar tantos parametros, etc.

Vamos entrar nos dois mundos, o mundo de nós desenvolvedores e na produção.

[Documentação](https://docs.docker.com/compose/)

## Comandos

```docker-compose up```
Esse comando irá iniciar todos os containers definidos no arquivo declarativo na pasta atual ($PWD).

```docker-compose up -d```
O "-d" no final irá iniciar os containers em background.

```docker-compose up -d --build```
O "--build" irá forçar a refazer o build dos containers definidos no aquivo declarativo.

```docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d --build```
Por padrão ele busca na pasta atual o arquivo *docker-compose.yml*, se o atributo "-f" for passado ele inclui os arquivos informados a ele, você pode passar vários arquivos, eles serão lidos na ordem que foi passado nos parametros.