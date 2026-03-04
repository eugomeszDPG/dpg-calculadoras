<?php
/**
 * Plugin Name: DPG Calculadoras
 * Plugin URI:  https://grupodpg.com.br
 * Description: Framework profissional para calculadoras adicionadas via shortcodes.
 * Version:     1.3.0
 * Author:      Grupo DPG
 * Author URI:  https://grupodpg.com.br
 * Text Domain: dpg-calculadoras
 */

// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Função para enfileirar (enqueue) os assets do plugin no frontend
 */
function dpg_calculadoras_enqueue_scripts()
{
    // Carrega o CSS global do plugin
    wp_enqueue_style(
        'dpg-calculadoras-style',
        plugin_dir_url(__FILE__) . 'assets/css/style.css',
        array(),
        '1.0.0'
    );

    // Carrega o JS global do plugin
    wp_enqueue_script(
        'dpg-calculadoras-script',
        plugin_dir_url(__FILE__) . 'assets/js/script.js',
        array(), // Remova 'jquery' dependendo se for usar JS puro
        '1.0.0',
        true // Carrega no footer (true)
    );
}
add_action('wp_enqueue_scripts', 'dpg_calculadoras_enqueue_scripts');

/**
 * Função para enfileirar (enqueue) os assets de backend / painel nativo WordPress
 */
function dpg_calculadoras_admin_enqueue_scripts($hook)
{
    // Carrega apenas na página do nosso plugin (toplevel_page_dpg-calculadoras)
    if ($hook !== 'toplevel_page_dpg-calculadoras') {
        return;
    }

    wp_enqueue_style(
        'dpg-admin-style',
        plugin_dir_url(__FILE__) . 'assets/css/admin-style.css',
        array(),
        '1.0.0'
    );

    wp_enqueue_script(
        'dpg-admin-script',
        plugin_dir_url(__FILE__) . 'assets/js/admin-script.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('admin_enqueue_scripts', 'dpg_calculadoras_admin_enqueue_scripts');

/**
 * Registra o menu administrativo lateral no painel do WordPress
 */
function dpg_admin_menu()
{
    add_menu_page(
        'DPG Calculadoras', // Page Title
        'DPG Calculadoras', // Menu Title
        'manage_options', // Capability requerida
        'dpg-calculadoras', // Menu Slug
        'dpg_render_admin_page', // Function de callback
        'dashicons-calculator', // Ícone 
        76 // Posição
    );
}
add_action('admin_menu', 'dpg_admin_menu');

/**
 * Função de inicialização do plugin
 * Carrega o loader modular que vasculha e inclui as calculadoras dinamicamente
 */
function dpg_calculadoras_init()
{
    // Carrega a interface da página administrativa (HTML)
    require_once plugin_dir_path(__FILE__) . 'includes/admin-page.php';

    // Carrega o arquivo responsável por embutir as lógicas de todas as calculadoras contidas em /includes/
    require_once plugin_dir_path(__FILE__) . 'includes/loader.php';
}
add_action('plugins_loaded', 'dpg_calculadoras_init');

/**
 * Exemplo de shortcode temporário
 * Uso: [dpg_calculadora_exemplo]
 */
function dpg_calculadora_exemplo_shortcode($atts)
{
    ob_start();
?>
    <!-- Wrapper principal para as calculadoras -->
    <div class="dpg-calculadora-wrapper">
        <p>Shortcode de exemplo do DPG Calculadoras funcionando!</p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('dpg_calculadora_exemplo', 'dpg_calculadora_exemplo_shortcode');

require_once __DIR__ . '/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/eugomeszDPG/dpg-calculadoras',
    __FILE__,
    'dpg-calculadoras'
);
