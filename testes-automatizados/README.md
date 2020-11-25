# Testes Automatizados

A automatização de testes é um tema de grande relevância quando se fala em qualidade de software e por isso, o uso desta disciplina deve ser considerado em todos os projetos de software. Com testes automatizados consegue-se entender melhor os problemas, já que o desenvolvedor, pela prática, valida sua hipótese considerando diferentes cenários.

## Testes unitários

Testes unitários são aqueles que, como o nome indica, testam uma unidade.

Certamente não é uma tela, e também não se trata, necessariamente, de uma única classe.

Quando um código de produção está acoplado a recursos externos (como banco de dados, web services e disco rígido), o teste deixa de ser unitário e passa a ser de integração.

Em suma, para um teste ser unitário, os métodos da classe sendo testada (e suas dependências) não podem ter relação com recursos externos.

Contudo, vale ressaltar que é possível isolar esta dependência, possibilitando que a classe seja testada de forma unitária. Para isso, algumas técnicas podem ser consideradas:

Refatoração: Extract Method/Class ? Se uma classe ou método sobre teste possui dependência de recursos externos, pode-se realizar o Extract Method ou Extract Class.

Em suma, as principais vantagens dos testes unitários são: ser simples de construir; rápidos de rodar (quando o conceito aqui descrito é entendido e aplicado corretamente); fáceis de executar via integração contínua, o que permite que funcionem como testes de regressão, apontando rapidamente problemas de efeitos colaterais por alterações indevidas; e viabilizam a prática do TDD, o que possibilita um design claro e uma grande cobertura de testes.

### Exemplo

Vamos criar uma classe Operacao, Soma e Divisao. Depois vamos cobrir suas operações usando testes unitários.

Rodar os comandos abaixo para rodar os testes.

```bash
cd exemplo/
docker-compose up -d
docker-compose exec php composer test
```
## Testes de integração

Os testes de integração são caracterizados, segundo Duvall, Matyas e Glover, pela verificação de partes maiores do sistema que dependem de recursos externos, como banco de dados, sistemas de arquivos ou endpoints de rede, para citar alguns. Estes testes verificam se os componentes em análise realmente produzem o comportamento esperado.

Um teste de integração comum a muitas aplicações é aquele que valida as ações executadas contra um banco de dados. Considerando que o acesso a recursos externos sempre demanda mais tempo do que um acesso direto à memória (por questões diversas, como latência de rede, leitura de disco, dentre outras), é comum que os testes de integração demorem mais do que os unitários.
## Testes de aceitação

# Referencias
- [Dominando os tipos de testes automatizados
](https://www.devmedia.com.br/dominando-os-tipos-de-testes-automatizados/33867)
