=== DPG Calculadoras ===
Contributors: Grupo DPG
Tags: calculadoras, ferramentas, contabilidade, dpg
Requires at least: 5.0
Tested up to: 6.4
Stable tag: 1.0.0
License: GPLv2 or later

Framework profissional para várias calculadoras adicionadas por shortcode.

== Description ==

O **DPG Calculadoras** é um plugin desenvolvido para centralizar ferramentas e calculadoras contábeis, trabalhistas, tributárias e estratégicas, facilitando a integração no WordPress através de shortcodes. Desenvolvido com uma estrutura modular, permite a rápida adição de novos cálculos sem afetar o desempenho do sistema principal.

### Estrutura de Pastas

* **`/includes/tributarias/`**: Calculadoras sobre impostos, DAS, PIS/COFINS, etc.
* **`/includes/trabalhistas/`**: Calculadoras de rescisão, férias, 13º, horas extras, etc.
* **`/includes/estrategicas/`**: Ferramentas de precificação, ROI, margem de lucro, etc.
* **`/includes/simuladores/`**: Simuladores de regimes tributários (Simples Nacional vs Lucro Presumido).
* **`/assets/`**: Contém arquivos estáticos de estilização (CSS) e comportamento (JS).

### Instruções de Uso

Para exibir uma calculadora, basta utilizar o shortcode correspondente à ferramenta em qualquer página, post ou widget de texto (incluindo Elementor).

**Exemplo de uso:**
`[dpg_calculadora_exemplo]`

(Aviso: Os shortcodes reais serão documentados conforme as calculadoras forem incluídas no plugin).

== Installation ==

1. Faça o upload da pasta `dpg-calculadoras` para o diretório `/wp-content/plugins/` do seu WordPress.
2. Ative o plugin através do menu 'Plugins' no painel.
3. Utilize os shortcodes fornecidos nas páginas desejadas.

== Changelog ==

= 1.0.0 =
* Lançamento inicial do framework.
* Estrutura de diretórios criada.
* Carregamento de assets (CSS e JS) configurado.
