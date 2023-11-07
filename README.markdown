# Guia de Instalação
Para utilizar esse repositório, siga os passos a seguir:

### 1º Passo
Abra um terminal em seu computador, selecione o local desejado em seu sistema de diretórios, e digite:

`git clone https://github.com/FelipeSoft/controle-de-estoque.git`

### 2º Passo
Ainda no mesmo terminal, digite os seguintes comandos:

`cd controle-de-estoque`

`npm install`

`code .`

### 3º Passo
Após abrir o Visual Studio Code, abra a pasta __config__, e dentro do arquivo __config.php__, configure as variáveis de acordo com a sua necessidade.

### Complementos
Dentro da pasta __database__, você encontrará o script SQL para a geração do banco de dados.
Além disso, você poderá encontrar na pasta __public/assets/images/__ no arquivo __diagrama.png__ a imagem do modelo utilizado para a construção do banco de dados.

Para alimentar o banco de dados com informações fictícias, no seu terminal, digite:

`php database/factory/initializers/init.php`

Assim, novas informações serão adicionadas na base dados. Se preferir manter as informações já existentes, vá no arquivo database/factory/initializers/init.php e execute apenas os métodos run(), sem disparar os métodos de rollback().



