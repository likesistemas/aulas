# Docker - Aula 01

Nesta aula iremos aprender os principais comandos do Docker e como é seu funcionamento.

## Conceitos

- Imagens: Com Docker você pode criar imagens contendo camadas que podem ser reutilizadas não precisando ser instaladas todas as vezes que usamos.
- Docker Registry: São repositórios de imagens DockerDocker Hub, Amazon ECR, Google Container Registry e muitos outros.
- Volumes: No Docker os dados não são persistidos, uma vez que o container for desligado os dados são perdidos, porem os dados salvos em volumes são mantidos dentro deles e não se perdem.
- Portas: Cada container pode expor portas para o exterior (host).
- Rede: No Docker existem as redes que servem para facilitar na comunicação entre containers.

## Comandos

### docker run
Com esse comando podemos rodar uma imagem docker.
[Documentação](https://docs.docker.com/engine/reference/commandline/run/)

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
Com esse comando podemos ver quais containers estão rodando atualmente.

```
docker ps 
```

```
docker ps -a
```