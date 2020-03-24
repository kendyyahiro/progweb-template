# E-commerce de produtos usados

<!--- Exemplos de badges. Acesse https://shields.io para outras opções. Você pode querer incluir informações de dependencias, build, testes, licença, etc. --->
![GitHub repo size](https://img.shields.io/github/repo-size/kendyyahiro/progweb-template)
![GitHub contributors](https://img.shields.io/github/contributors/kendyyahiro/progweb-template)

O e-commerce de produtos usados é uma loja virtual onde os clientes poderão tanto comprar quanto anunciar produtos usados, basicamente será semelhante aos atuais e-commerces como: Mercado Livre e OLX que tem por objetivo facilitar a venda de produtos na internet, conectando cliente e vendedor com garantia de qualidade e segurança na venda.

A aplicação faz com que vários indivíduos possam negociar produtos entre eles, sem evitar constrangimentos na compra. Simplificadamente, o site proporcionará vendas onlines de produtos e serviços.

## Pré-requisitos

Antes de iniciar, certifique-se de cumprir os seguintes requisitos:
<!--- Estes são alguns exemplos de requisitos. Adicione, duplique e remova como necessário --->
* Você deve possuir a última versão do `PHP` instalado.
* Você deve possuir a última versão do `Laravel 7.*` instalado.
* Você deve possuir uma máquina `<Windows/Linux>`.
* Você deve ler o `<guia/link/documentação>` dos termos de uso (Não é necessário, mas sempre bom).
* Ter o XAMPP (version ≥ 7.*) instalado.
* Ter um banco de dados com o nome "store".

## Como executar

Para fazer o deploy da aplicação siga os seguintes passos:

Linux/Windows:
```
- Inicialmente, inicie o APACHE e o MySQL do Xampp ou de outro software desejado
- Rodar esse comando dentro do projeto "php artisan migrate"
- Abra-o em um navegador e digite: "http://localhost/progweb-template/loja/public"
```

## Usando o E-commerce

Para usar o E-commerce, basicamente:
* Abra o navegador e digite o seguinte endereço: `http://localhost/progweb-template/loja/public`
* Ao abrir a aplicação você poderá:
  * Navegar pelo conteúdo público;
  * Cadastrar usuário;
  * Entrar com usuário e senha para anunciar e/ou comprar produtos anunciados;
  * Colocar produtos dentro do carrinho eletrônico;
  * Pós-compra: Feedback, problemas no recebimento, assistência.  

## Funcionalidades para o sistema de E-commerce:
* Entrar e sair do login;
* Navegar dentro do site;
* Visualizar produtos anunciados;
 - Capacidade de ver características que o anunciador quiser acrescentar, respeitando pelo menos:
   1) Nome do produto como título(nome do produto);
   2) Número de contato;
   3) Data de publicação(automático ou usuário decide);
   4) Código específico de cada produto;
   5) Marca do produto;
   6) Tipo de produto(carro, livro, eletrônico, etc..);
   7) Ano adquirido;
   8) Valor em reais(R$ XX,YY);
   9) Localização(cidade/estado);
 - Adicionar contatos, seja WhatsApp, Face ou email;
 - Fotos ilustrativas;
 - Carrinho de compras;
 - Adicional: perguntas e respostas para o produto
* Criar conta com os requisitos necessário como:
 - Nome Completo ou dividir entre: Nome e Sobrenome;
 - Email;
 - Senha;
 - Endereço (CEP, Número da casa, Bairro e Rua);
 - Telefone;
   OBS: permitir a alteração de alguns dados.
* Entrar na conta já cadastrada:
 - Login (Usar o Email);
 - Senha;
   OU BUSCAR A MANEIRA DE aproveitar a conta do facebook ou gmail para realizar cadastro.
* Limitar a realização da compra APENAS se tiver cadastro no site; 
* Permitir o cadastramento do produto APENAS se tiver cadastro no site; 
* Permitir comentários em determinado produto APENAS se tiver cadastro no site;
* Filtro sobre os produtos cadastrados.


## Funcionalidades a mais para adotar dentro do sistema de E-commerce:

* Lista de Desejos/Favoritos;
* Possibilitar a adição de vídeos ilustrativos;
* Lista de recomendação a partir de itens do mesmo tipo ou função;
* Equipe de atendimentos;
* Recuperar senha ou até mesmo a conta;
* Cancelar todos os pedidos de uma só vez;
* Denunciar postagem ou comentários que forem inapropriados. seka:
 - Racista, Sexual, Xenofóbica, Homofóbico ou outros(agressão, ameaça, campo para especificar a insatisfação).

*Ao entrar no site do e-commerce, você poderá desfrutar de algumas funções como vender, anunciar produtos e/ou apenas buscar no banco de dados alguns produtos já anunciados e se quiser poderá efetivar a compra, mas apenas o usuário que estiver logado poderá efetuar a compra, pagamento e anunciar.*

## Contribuidores

As seguintes pessoas contribuiram para este projeto:

* [Kendy Yahiro](https://github.com/kendyyahiro)
* [Vitor Koji](https://github.com/vitorkoji)
* [Geovanna Santiago](https://github.com/GeovannaSantiago)
* [Roger Daniel](https://github.com/rrowdas)
* [Kelli Regina](https://github.com/Kelli-Regina)


## Licença de uso

<!--- Se não tiver certeza de qual, verifique este site: https://choosealicense.com/--->
<!---Este projeto usa a seguinte licença: [<GNU GPLv3>](<https://choosealicense.com/licenses/gpl-3.0/>). 
*Você também deve criar um arquivo chamado LICENSE no projeto*--->
Este projeto usa a seguinte licença: [GNU GPLv3](https://choosealicense.com/licenses/gpl-3.0/).

