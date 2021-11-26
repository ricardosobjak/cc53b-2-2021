
# Configurações

## Arquivo config.php
 - Alterar o caminho da aplicação dentro do servidor web. Por exemplo, o nome do diretório onde a aplicação ficará será "classiauto" e estará no diretório raíz do servidor web, então a configuração deverá ser:
   - $CONFIG['webroot'] = '/classiauto';


## Arquivo conexao.php
 - Configurar as credenciais de acesso ao banco de dados (usuário e senha).
 - Configurar o nome do banco de dados.

## Criar as tabelas do Banco de dados
 - No diretório "!db" da aplicação, existe dois arquivos .php que auxiliam na criação das estrutura do banco de dados. Depois que você criar o banco de dados, execute os "criar_tabelas.php" e "inserir_dados.php" a partir do navegador web. Por exemplo:
   - http://localhost/classiauto/!db/criar_tabelas.php
   - http://localhost/classiauto/!db/inserir_dados.php
 - Ou, se preferir, restaure o backup do banco de dados a partir do arquivo "tabelas.sql".