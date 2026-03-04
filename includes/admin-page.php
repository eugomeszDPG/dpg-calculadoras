<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a página administrativa do plugin DPG Calculadoras
 */
function dpg_render_admin_page()
{
?>
    <div class="wrap dpg-admin-wrap">
        <div class="dpg-admin-header">
            <h1>Ecossistema de Utilidade Contábil</h1>
            <p>Copie o shortcode e insira onde desejar no seu site. Cada calculadora formata-se automaticamente 100% responsiva.</p>
        </div>

        <div class="dpg-admin-content">

            <!-- Seção: Tributárias e Financeiras -->
            <h2 class="dpg-admin-section-title">Tributárias e Financeiras</h2>
            <div class="dpg-admin-grid">
                
                <!-- Card: Porcentagem -->
                <div class="dpg-admin-card">
                    <h3>Porcentagem</h3>
                    <p>Descubra rapidamente o valor correspondente a uma porcentagem de um valor base.</p>
                    <div class="dpg-shortcode-box">
                        <input type="text" value="[calc_porcentagem]" readonly class="dpg-shortcode-input">
                        <button class="dpg-btn-copy" data-clipboard="[calc_porcentagem]">Copiar Shortcode</button>
                    </div>
                </div>

                <!-- Card: Regra de Três -->
                <div class="dpg-admin-card">
                    <h3>Regra de Três Simples</h3>
                    <p>Encontre o valor "X" desconhecido através da proporção matemática entre 3 valores.</p>
                    <div class="dpg-shortcode-box">
                        <input type="text" value="[calc_regra_tres]" readonly class="dpg-shortcode-input">
                        <button class="dpg-btn-copy" data-clipboard="[calc_regra_tres]">Copiar Shortcode</button>
                    </div>
                </div>

                <!-- Card: Juros Simples -->
                <div class="dpg-admin-card">
                    <h3>Juros Simples</h3>
                    <p>Calcula os rendimentos fixos mensais com base no capital inicial, taxa e tempo.</p>
                    <div class="dpg-shortcode-box">
                        <input type="text" value="[calc_juros_simples]" readonly class="dpg-shortcode-input">
                        <button class="dpg-btn-copy" data-clipboard="[calc_juros_simples]">Copiar Shortcode</button>
                    </div>
                </div>

                <!-- Card: Juros Compostos -->
                <div class="dpg-admin-card">
                    <h3>Juros Compostos</h3>
                    <p>Calcula rentabilidade real baseada na fórmula de juros sobre juros (exponencial).</p>
                    <div class="dpg-shortcode-box">
                        <input type="text" value="[calc_juros_compostos]" readonly class="dpg-shortcode-input">
                        <button class="dpg-btn-copy" data-clipboard="[calc_juros_compostos]">Copiar Shortcode</button>
                    </div>
                </div>

                <!-- Card: Investimento -->
                <div class="dpg-admin-card">
                    <h3>Investimento (Aporte)</h3>
                    <p>Simulador composto de juros que permite somar as entradas/aportes mensais durante o período.</p>
                    <div class="dpg-shortcode-box">
                        <input type="text" value="[calc_investimento]" readonly class="dpg-shortcode-input">
                        <button class="dpg-btn-copy" data-clipboard="[calc_investimento]">Copiar Shortcode</button>
                    </div>
                </div>

            </div>

            <!-- Seção: Estratégicas -->
            <h2 class="dpg-admin-section-title" style="margin-top: 40px;">Estratégicas</h2>
            <div class="dpg-admin-grid">
                
                <!-- Card: PJ x CLT -->
                <div class="dpg-admin-card">
                    <h3>Comparativo PJ x CLT</h3>
                    <p>Cruza informações de deduções CLT contra carga de abertura de ME e contador para definir maior liquidez.</p>
                    <div class="dpg-shortcode-box">
                        <input type="text" value="[calc_pj_clt]" readonly class="dpg-shortcode-input">
                        <button class="dpg-btn-copy" data-clipboard="[calc_pj_clt]">Copiar Shortcode</button>
                    </div>
                </div>

            </div>

            <!-- Seção: Trabalhistas -->
            <h2 class="dpg-admin-section-title" style="margin-top: 40px;">Trabalhistas</h2>
            <div class="dpg-admin-grid">
                
                <!-- Card: INSS -->
                <div class="dpg-admin-card">
                    <h3>Simulador INSS</h3>
                    <p>Avalia de forma aproximada o custo a recolher da previdência de funcionários, sócios e autônomos.</p>
                    <div class="dpg-shortcode-box">
                        <input type="text" value="[calc_inss]" readonly class="dpg-shortcode-input">
                        <button class="dpg-btn-copy" data-clipboard="[calc_inss]">Copiar Shortcode</button>
                    </div>
                </div>

                <!-- Card: FGTS -->
                <div class="dpg-admin-card">
                    <h3>FGTS Mensal e Anual</h3>
                    <p>Mostra o total a ser depositado (encargo patronal) no Fundo de Garantia baseado no bruto informado.</p>
                    <div class="dpg-shortcode-box">
                        <input type="text" value="[calc_fgts]" readonly class="dpg-shortcode-input">
                        <button class="dpg-btn-copy" data-clipboard="[calc_fgts]">Copiar Shortcode</button>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Div oculta para notificação (Feedback Toast) -->
    <div id="dpg-toast-notification" class="dpg-toast">Shortcode copiado!</div>
    <?php
}
