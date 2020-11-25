# Testes Automatizados

A automatiza��o de testes � um tema de grande relev�ncia quando se fala em qualidade de software e por isso, o uso desta disciplina deve ser considerado em todos os projetos de software. Com testes automatizados consegue-se entender melhor os problemas, j� que o desenvolvedor, pela pr�tica, valida sua hip�tese considerando diferentes cen�rios.

## Testes unit�rios

Testes unit�rios s�o aqueles que, como o nome indica, testam uma unidade.

Certamente n�o � uma tela, e tamb�m n�o se trata, necessariamente, de uma �nica classe.

Quando um c�digo de produ��o est� acoplado a recursos externos (como banco de dados, web services e disco r�gido), o teste deixa de ser unit�rio e passa a ser de integra��o.

Em suma, para um teste ser unit�rio, os m�todos da classe sendo testada (e suas depend�ncias) n�o podem ter rela��o com recursos externos.

Contudo, vale ressaltar que � poss�vel isolar esta depend�ncia, possibilitando que a classe seja testada de forma unit�ria. Para isso, algumas t�cnicas podem ser consideradas:

Refatora��o: Extract Method/Class ? Se uma classe ou m�todo sobre teste possui depend�ncia de recursos externos, pode-se realizar o Extract Method ou Extract Class.

Em suma, as principais vantagens dos testes unit�rios s�o: ser simples de construir; r�pidos de rodar (quando o conceito aqui descrito � entendido e aplicado corretamente); f�ceis de executar via integra��o cont�nua, o que permite que funcionem como testes de regress�o, apontando rapidamente problemas de efeitos colaterais por altera��es indevidas; e viabilizam a pr�tica do TDD, o que possibilita um design claro e uma grande cobertura de testes.

### Exemplo

Vamos criar uma classe Operacao, Soma e Divisao. Depois vamos cobrir suas opera��es usando testes unit�rios.

Rodar os comandos abaixo para rodar os testes.

```bash
cd exemplo/
docker-compose up -d
docker-compose exec php composer test
```
## Testes de integra��o

Os testes de integra��o s�o caracterizados, segundo Duvall, Matyas e Glover, pela verifica��o de partes maiores do sistema que dependem de recursos externos, como banco de dados, sistemas de arquivos ou endpoints de rede, para citar alguns. Estes testes verificam se os componentes em an�lise realmente produzem o comportamento esperado.

Um teste de integra��o comum a muitas aplica��es � aquele que valida as a��es executadas contra um banco de dados. Considerando que o acesso a recursos externos sempre demanda mais tempo do que um acesso direto � mem�ria (por quest�es diversas, como lat�ncia de rede, leitura de disco, dentre outras), � comum que os testes de integra��o demorem mais do que os unit�rios.
## Testes de aceita��o

# Referencias
- [Dominando os tipos de testes automatizados
](https://www.devmedia.com.br/dominando-os-tipos-de-testes-automatizados/33867)
