Instruções para execução do projeto: 
1ºSe certificar que o xampp ou outro programa que habilite o MySQL para ser executado no servidor local está rodando.
2º Verificar se o projeto está conectado com o banco de dados (phpmyadmin), através do arquivo .env 

Execução: 
1º Abrir a página inicial rota('') no servido local, vai ser redirecionado para tela de login(/login). Logo, é necessário que se faça o registro do usuário. Após o registro, o usuário é redirecionado para página inicial.
2º Na página inicial se pode visualizar a lista de produtos, assim também como se pode cadastrar, editar e excluir produtos, essas operações podem ser visualizadas no histórico de operações quando apertado o respectivo botão.

O projeto é dividido nas seguintes telas:
-Auntentificação:Telas de login e registro de usuario
-Página Inicial: Lista dos produtos cadastrados
    -Tela de cadastro do produto
    -Tela de edição de produto
    -Tela de histórico de operações do produto na inserção, edição ou exclusão
