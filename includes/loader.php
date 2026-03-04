<?php
/**
 * DPG Calculadoras - Loader Modular
 *
 * Inclui automaticamente todos os arquivos PHP das calculadoras
 * baseando-se nas subpastas existentes no diretório includes.
 */

// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Padrão de Nomenclatura para Novas Calculadoras (Exemplo de <slug> = rescisao):
 * 
 * 1. O arquivo deve retornar/exibir o conteúdo principal.
 * 2. Função de renderização: `dpg_render_<slug>()` (ex: dpg_render_rescisao())
 * 3. Shortcode gerado pelo arquivo: `[calc_<slug>]` (ex: [calc_rescisao])
 * 4. Wrapper principal HTML do arquivo: <div class="dpg-calculadora-wrapper dpg-calc-<slug>">
 * 5. Tags HTML de input/identificação: Devem usar o prefixo `dpg-` ou `dpg-calc-<slug>-` para IDs e classes.
 */

function dpg_calculadoras_load_modules()
{
    $dir = plugin_dir_path(__FILE__);

    // Lista explícita de arquivos para evitar que firewalls (ModSecurity) 
    // bloqueiem o script por usar glob() ou varredura dinâmica de pastas.
    $files = array(
        // Tributárias
        'tributarias/calc-porcentagem.php',
        'tributarias/calc-regra-tres.php',
        'tributarias/calc-juros-simples.php',
        'tributarias/calc-juros-compostos.php',
        'tributarias/calc-investimento.php',

        // Estratégicas
        'estrategicas/calc-pj-clt.php',

        // Trabalhistas
        'trabalhistas/calc-inss.php',
        'trabalhistas/calc-fgts.php'
    );

    foreach ($files as $file) {
        $path = $dir . $file;
        if (file_exists($path)) {
            require_once $path;
        }
    }
}

// Inicia o carregador modular
dpg_calculadoras_load_modules();
