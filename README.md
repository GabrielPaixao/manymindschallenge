## BEM VINDO AO SISTEMA CHALLENGE DA ManyMinds

### Segue algumas orientaçõs:

1 - As credencias de acessos são:

```
login: gabriel.passion@gmail.com
senha: 1q2w3e
```

2 - Verifique também a configuração da base_url para o funcionamento adequado do sistema. 

``` $config['base_url'] = 'http://localhost/ct/';```

3 - Atualize as configurações do seu banco de dados no arquivo ```config/database.php```.

4 - Carregue a base de dados através do dump que está na pasta db na raiz do projeto.

5 - Também temos dois webservices disponíveis:

#### IMPORTANTE:
Estamos utilizando Autenticação Bearer para acesso aos webservices

*Para gerar o token de acesso bearer utilize a seguinte rota:*

```/login_ws (get)```
*envie os campos login e senha no body, conforme credenciais acima


*Para carregar todos os colaboradores do sistema utilize a seguinte rota:*

```colaboradores/list_ws (get)```


*Para carregar todos os pedidos utilize a seguinte rota:*

```pedidos/list_ws (post)```


Obrigado pela atenção! :-)

Gabriel Paixão
Desenvolvedor FullStack
(22) 99277-0325
gabriel.passion@gmail.com

## Gabriel Paixão

- Desenvolvedor FullStack
- (22) 99277-0325
- gabriel.passion@gmail.com
