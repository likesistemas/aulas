# Docker - Aula 01

Nesta aula iremos aprender os principais comandos do Docker e como � seu funcionamento.

## Conceitos

- Imagens: Com Docker voc� pode criar imagens contendo camadas que podem ser reutilizadas n�o precisando ser instaladas todas as vezes que usamos.
- Docker Registry: S�o reposit�rios de imagens DockerDocker Hub, Amazon ECR, Google Container Registry e muitos outros.
- Volumes: No Docker os dados n�o s�o persistidos, uma vez que o container for desligado os dados s�o perdidos, porem os dados salvos em volumes s�o mantidos dentro deles e n�o se perdem.
- Portas: Cada container pode expor portas para o exterior (host).
- Rede: No Docker existem as redes que servem para facilitar na comunica��o entre containers.

## Comandos

### docker run
Com esse comando podemos rodar uma imagem docker.
[Documenta��o](https://docs.docker.com/engine/reference/commandline/run/)

```
docker run -it ubuntu:latest bash 
```

```
docker run -it -p 8080:80 nginx 
```

```
docker run -v ${PWD}:/usr/share/nginx/html/ -p 8080:80 nginx 
```

### docker ps
Com esse comando podemos ver quais containers est�o rodando atualmente.

```
docker ps 
```

```
docker ps -a
```