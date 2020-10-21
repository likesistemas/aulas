# docker-compose

O docker-compose � uma ferramenta cujo o objetivo � facilitar o processo de executar containers docker de forma declarativa. Cada container � executado como um servi�o.

Agora tudo de vimos nas aulas de Docker vamos aplicar no docker-compose tamb�m, mas veremos que � muito mais f�cil e n�o � mais necess�rio passar tantos parametros, etc.

Vamos entrar nos dois mundos, o mundo de n�s desenvolvedores e na produ��o.

[Documenta��o](https://docs.docker.com/compose/)

## Comandos

```docker-compose up```
Esse comando ir� iniciar todos os containers definidos no arquivo declarativo na pasta atual ($PWD).

```docker-compose up -d```
O "-d" no final ir� iniciar os containers em background.

```docker-compose up -d --build```
O "--build" ir� for�ar a refazer o build dos containers definidos no aquivo declarativo.

```docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d --build```
Por padr�o ele busca na pasta atual o arquivo *docker-compose.yml*, se o atributo "-f" for passado ele inclui os arquivos informados a ele, voc� pode passar v�rios arquivos, eles ser�o lidos na ordem que foi passado nos parametros.