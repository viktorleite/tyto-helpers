### Tyto Helpers

**Funções utilitárias globais de alta performance e conveniência em PHP puro**, projetadas para acelerar o desenvolvimento de aplicações e pacotes dentro do ecossistema Tyto PHP, oferecendo checagens seguras de tipos, manipulação avançada de arrays e recursos essenciais do dia a dia.

---

### Sumario
*  [ ] Sobre o projeto
*  [ ] Pré-requisitos
*  [ ] Instalação
*  [ ] Uso
*  [ ] Documentação
*  [ ] Roadmap
*  [ ] Contribuindo        [[CONTRIBUINDO]]()
*  [ ] Agradecimento
*  [ ] Colaboradores
*  [ ] License
*  [ ] Contato        [[CONTATO]]()

---

### Sobre o Projeto

O **Tyto Helpers** é um pacote que disponibiliza funções globais auxiliares globais (helpers) sem inflar a aplicação. Ele resolve validações complexas do PHP de forma idiomática (como `isEmpty`, `isBlank`, `isNumeric`), tratamento seguro de saídas contra XSS (`e()`), utilitários para arrays (`array_trim`, `array_remove_keys`, `array_last`) e funções de ambiente e debug (`dd()`, `env()`).

---

### Pré-requisitos

Para utilizar este pacote, você precisa ter o ambiente configurado com:
* **PHP**: `>= 8.5`
* **Composer** instalado globalmente.

---

### Instalação

Adicione o pacote ao seu projeto via Composer:

```bash
composer require tyto-php/helpers

```

---

### Uso

Veja alguns exemplos de uso das funções disponíveis:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

// Verificando se valores estão vazios ou em branco
if (isEmpty($variavel)) {
    // ...
}

if (isBlank($nome)) {
    echo "O nome não pode estar em branco.";
}

// Escape de saída contra XSS em views
echo e($userInput);

// Trabalhando com arrays
$dadosLimpos = array_trim(['  Tyto  ', ' PHP ']);
$ultimoItem = array_last([10, 20, 30]); // Retorna 30
$filtrado = array_remove_keys(['id' => 1, 'password' => 'secret', 'name' => 'Viktor'], 'password');

// Lidando com variáveis de ambiente e checagem de SO
$databaseUrl = env('DB_URL', 'sqlite://database.sqlite');
if (windows_os()) {
    // Lógica específica para Windows
}

// Debugando com parada de execução formatada
dd($dadosLimpos);

```

Para mais exemplos, consulte a [Documentação]().

---

### Documentação


---

### Roadmap

* [x] Funções essenciais de debug (`dd`) e segurança (`e`)
* [x] Utilitários avançados para manipulação de arrays e strings
* [ ] Adição de helpers para manipulação de caminhos (Path)
* [ ] Cobertura completa de testes unitários com Pest

---

### Contribuindo

Se você tiver uma sugestão para melhorar o projeto, faça um fork do repositório e crie uma pull request. Você também pode simplesmente abrir uma **issue** com a tag "**melhoria**". Não se esqueça de dar uma estrela ao projeto! Quaisquer contribuições que você fizer são **muito apreciadas.**

1. Fork do projeto
2. Crie sua branch de recurso (`git checkout -b feature/AmazingFeature`)
3. Confirme suas alterações (`git commit -m 'Add some AmazingFeature'`)
4. Empurre para a Filial (`git push origin feature/AmazingFeature`)
5. Abra uma **pull request**

---

### Agradecimento

Agradecimento especial à comunidade PHP e aos mantenedores das ferramentas que tornam o ecossistema Tyto possível.

---

### Contato

Viktor Leite - @ViktorLeite - contato@viktorleite.com

Website - viktorleite.com.br

Link do projeto: [https://github.com/viktorleite/tyto-helpers]()

---

### Licença

Distribuído sob a licença MIT. Veja `LICENSE.txt` para mais informações.

```
