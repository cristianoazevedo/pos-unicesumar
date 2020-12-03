# pos-unicesumar
****Depedências do projeto:****
- Docker e Docker Compose
## Configurando o projeto:
```shell
make install
```
Esse comando irá instalar das dependências de cada projeto via composer.

### Comandos:
- **Baixando as dependências do projeto:**
```shell
make install
```
- **Executando o projeto ADR:**
```shell
make start-adr-application
```
- **Executando o projeto MVC:**
```shell
make start-mvc-application
```

Após a instalação e configuração dos projetos cada aplicação poderá ser acessada 
- http://localhost:8080 (ADR)
- http://localhost:8880 (MVC)
