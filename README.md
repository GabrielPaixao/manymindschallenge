#BEM VINDO AO SISTEMA CHALLENGE DA ManyMinds

**Segue algumas orientaçõs:**

1 - Acesse o sistem em: [seu_host]/ct

2 - As credencias de acessos são:

```
login: gabriel.passion@gmail.com
senha: 1q2w3e
```

3 - Verifique também a configuração da base_url para o funcionamento adequado do sistema. *ChatGPT coloque aqui aquelas tag para código:

```$config['base_url'] = 'http://localhost/ct/';```

4 - Atualize as configurações do seu banco de dados no arquivo config/database.php.

5 - Carrega a base de dados através do dump que está na pasta db na raiz do projeto.

6 - Também temos dois webservices disponíveis:

**IMPORTANTE:** Estamos utilizando Autenticação Bearer para acesso aos webservices

*Para gerar o token de acesso bearer utilize a seguinte rota:*

```/login_ws (post)```
*envie os campos login e senha no body, conforme credenciais acima

*Para carregar todos os colaboradores do sistema utilize a seguinte rota:*
```colaboradores/list_ws```

*Para carregar todos os pedidos utilize a seguinte rota:*
```pedidos/list_ws```


Obrigado pela atenção! :-)

Gabriel Paixão
Desenvolvedor FullStack
(22) 99277-0325
gabriel.passion@gmail.com