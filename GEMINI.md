# Projeto AR Conector – Setup e Diretrizes

# Nota: Os diagramas detalhados de banco (Prisma), arquitetura (Mermaid) e o PRD completo estão disponíveis na pasta /guides do projeto para referência técnica e documentação.

# Atenção: Antes de executar qualquer novo passo do projeto, o agente/colaborador deve consultar os guides atualizados na pasta /guides (ex: PRD, schema Prisma, diagramas Mermaid) e validar toda ação com o usuário responsável.

---

## 🏷️ Descrição Geral
Sistema MVP de Realidade Aumentada (WebAR) para instruções técnicas:
Exibe vídeos de instrução ao apontar o celular para QR codes fixados em equipamentos (ex: painéis elétricos).
Inclui painel de gestão para cadastro de equipamentos, associação de QR codes e vídeos, geração de QR codes e logs de acesso.
Desenvolvido sobre CodeIgniter 3 (PHP) e AR.js (WebAR).

---

## ⚙️ Configuração Inicial
1. Remover index.php da URL:Siga a documentação oficial do CodeIgniter 3 para ocultar o index.
2. Banco de Dados:Configure application/config/database.php com suas credenciais.
3. URL Base:Defina corretamente em application/config/config.php.
4. Chave de Criptografia:Configure $config['encryption_key'] em config.php.

---

## 🗂 Estrutura Recomendada de Arquivos (MVP)
A estrutura a seguir foi pensada para facilitar a busca e manutenção, separando templates globais e organizando views por controller, cada uma com suas telas (listar, editar, inserir, etc).

application/
  controllers/
    Ar.php
    Admin.php
    Equipamento.php
    Video.php
    Qrcode.php
    (outros controllers MVP)
  views/
    templates/            # Partials globais (header.php, menu.php, footer.php)
    ar/
      index.php           # Página AR.js
      marker_ajuda.php
    admin/
      login.php           # Tela de login admin
      dashboard.php       # Painel inicial admin
    equipamento/
      listar.php
      inserir.php
      editar.php
      visualizar.php
    video/
      listar.php
      inserir.php
      editar.php
      visualizar.php
    qrcode/
      listar.php
      gerar.php
      visualizar.php
public/
  assets/
    ar/
      ralfJones.mp4
      pattern-hiro.png
      (outros assets .mp4, .patt, .png)

templates/: inclui cabeçalho, menu, rodapé e outros componentes reutilizáveis.

Cada pasta dentro de views/ corresponde a uma controller para facilitar a busca e manutenção do código.
Use sempre os arquivos listar.php, inserir.php, editar.php, etc, dentro de cada contexto de controller.

---

## 💻 Tecnologias Utilizadas
PHP: 5.6.40+
Framework: CodeIgniter 3.x
Banco de Dados: MySQL
Frontend AR: AR.js (WebAR, via A-Frame)
QR Code: Geração automática
Modelagem de Dados: Prisma (não utilizado no backend, apenas documentação, ver guides)

---

## 🧱 Arquitetura Padrão (MVC)
Controllers:
Fluxo WebAR e painel de gestão.
Nunca conter SQL direto.
Models:
Manipulam tabelas: equipamentos, vídeos, qrcodes, usuários, logs.
Centralizam acesso e regras de persistência.
Views:
WebAR: cena AR.js com vídeo sobre marcador.
Admin: login, cadastro, dashboard, associação QR/vídeo.

---

## 🔁 Fluxo Padrão do Usuário
# Usuário Final (Técnico):
1. Aponta o celular para o QR code do equipamento.
2. WebAR reconhece o QR code e exibe o vídeo correto em RA.

# Administrador:
1. Faz login no painel.
2. Cadastra equipamento.
3. Gera QR code e associa vídeo.
4. Acompanha logs de acesso.

---

## 🗄️ Modelagem de Dados
Consulte o schema Prisma completo e atualizado em: /guides/db_schema.prisma

---

## 🕶️ Diagrama de Arquitetura do Projeto
Consulte o diagrama Mermaid atualizado em: /guides/diagrama.mmd

---

## 📑 Regras Gerais
- Toda lógica de banco deve estar encapsulada em Models.
- Controllers devem conter apenas fluxo de validação, controle e resposta.
- Não misturar responsabilidades entre camadas.
- Toda função deve ser curta e ter propósito único.
- Todo código assistido por IA deve conter comentário âncora apropriado.

---

## 🧪 Testes
- A controller `Test.php` será usada como base para testes manuais e automações.
- A migração do banco de dados será executada diretamente por um método dessa controller, acessível por link direto.
- Exibir resultados com:
  ```php
  echo '<pre>'; print_r($variavel); exit;

## 🧠 Comentários Âncora para Código Gerado por IA
Utilize os seguintes comentários especiais no código para rastreabilidade:

```php
// AIDEV-NOTE: explicação técnica de decisão
// AIDEV-TODO: ponto a melhorar manualmente depois
// AIDEV-QUESTION: dúvida gerada durante desenvolvimento
// AIDEV-GENERATED: código gerado por IA
```
## 🎯 Controller de Teste: Test.php
```php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index() {
        $testes = [
            ['label' => 'Conexão com Banco de Dados', 'metodo' => 'conexaoBanco'],
            ['label' => 'Validação de Entrada JSON', 'metodo' => 'validaEntrada'],
            ['label' => 'Geração de XML Simulado', 'metodo' => 'gerarXmlTeste'],
            ['label' => 'Executar Migração do Banco', 'metodo' => 'executarMigracao']
        ];

        $this->load->view('test/menu', ['testes' => $testes]);
    }

    public function conexaoBanco() {
        $this->load->model('NotaFiscal_model');
        $dados = $this->NotaFiscal_model->getNotasRecentes();
        echo '<pre>'; print_r($dados);
    }

    public function validaEntrada() {
        $json = file_get_contents(APPPATH . 'data/exemplo_nfse.json');
        $dados = json_decode($json, true);
        echo '<pre>'; print_r($dados);
    }

    public function gerarXmlTeste() {
        $this->load->library('nfse');
        $xml = $this->nfse->gerarXmlSimulado();
        echo htmlspecialchars($xml);
    }

    public function executarMigracao() {
        $this->load->model('Migracao_model');
        $resultado = $this->Migracao_model->executar();
        echo '<pre>'; print_r($resultado);
    }
}
```
---

## ✅ To-do por Sprint

🟠 **Sprint 1 – Setup Inicial**
- [x] Estrutura básica do projeto CodeIgniter criada (`application/`, `controllers/`, `views/`, `public/`)
- [x] Configuração do banco de dados (`database.php`)
- [x] Definição de URL base e remoção do `index.php` da URL
- [x] Chave de criptografia definida
- [ ] Criação do controle de versão (Git) e `.gitignore` do projeto
- [ ] Estrutura de arquivos/pastas criada (incluindo `templates`)
- [ ] Página AR básica exibindo vídeo a partir de QR code (AR.js)

🟡 **Sprint 2 – Autenticação, Gestão e Upload**
- [ ] Tela e fluxo de login/admin com controle de sessão
- [ ] Cadastro, listagem, edição e exclusão de equipamentos
- [ ] Cadastro, listagem, edição e exclusão de vídeos (upload local e link externo)
- [ ] Geração automática e visualização de QR code único para cada equipamento/vídeo
- [ ] Associação entre equipamento, QR code e vídeo
- [ ] Integração de upload de vídeos e/ou suporte a links do YouTube
- [ ] Telas administrativas separadas por controller: equipamento, vídeo, QR code

🟢 **Sprint 3 – Integração AR e Funcionalidade Dinâmica**
- [ ] Implementação do fluxo de leitura de QR code dinâmico: cada QR direciona para sua página AR específica
- [ ] Associação dinâmica: leitura do QR code busca vídeo associado no banco
- [ ] Logs de scan de QR code salvos em banco (dados: timestamp, ip, user agent, etc)
- [ ] Tela de estatísticas básicas de acesso no painel admin (número de scans por equipamento/vídeo)
- [ ] Refino das views com partials de header, menu, footer (uso dos templates globais)
- [ ] Validação e feedback de erros para uploads e cadastro

🔵 **Sprint 4 – Otimização, Mobile e Deploy**
- [ ] Ajuste de responsividade mobile para telas de AR e admin
- [ ] Otimização de UX (melhoria de menus, mensagens, loading)
- [ ] Documentação final para uso e manutenção do sistema (README + instruções de guides)
- [ ] Suporte offline (pré-carregamento de vídeos, opcional)
- [ ] Testes de campo com técnicos (validação real)
- [ ] Deploy do sistema no ambiente produtivo/homologação

## Instrução para Assistentes de IA
Antes de atualizar qualquer item como concluído (marcar com - [x]), pergunte explicitamente ao usuário se a tarefa realmente foi finalizada.

Exemplo:
Usuário: "Atualize o progresso"IA: "Você confirma que deseja marcar como concluído o item: 'Criar controller de testes (Test.php) com métodos básicos'?"

Somente após a confirmação do usuário, a IA deve atualizar o .md.

Essa confirmação deve ser feita para cada item individual sugerido para marcação.

## 📌 Observações Finais
Qualquer dúvida ou ajuste, inserir via comentário âncora.