<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a Calculadora de Juros Simples
 */
function dpg_render_juros_simples()
{
    ob_start();
?>
    <div class="dpg-calculadora-wrapper dpg-calc-juros-simples">
        <h3>Calculadora de Juros Simples</h3>
        
        <div class="dpg-form-group">
            <label for="dpg-js-capital">Capital Inicial (R$):</label>
            <input type="number" id="dpg-js-capital" step="any" placeholder="Ex: 1000" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-js-taxa">Taxa de Juros (% ao mês):</label>
            <input type="number" id="dpg-js-taxa" step="any" placeholder="Ex: 2" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-js-tempo">Tempo (meses):</label>
            <input type="number" id="dpg-js-tempo" step="1" placeholder="Ex: 12" required>
        </div>

        <div class="dpg-form-actions">
            <button type="button" id="dpg-js-btn-calcular">Calcular</button>
            <button type="button" id="dpg-js-btn-limpar">Limpar</button>
        </div>

        <div id="dpg-js-erro" style="color: #d9534f; background-color: #f9f2f2; border: 1px solid #d9534f; padding: 10px; margin-top: 15px; border-radius: 4px; display: none;">
            <strong>Atenção:</strong> Preencha todos os campos com números válidos e tempo maior que zero.
        </div>

        <div id="dpg-js-resultado-box" style="display: none;">
            <h4>Resultados:</h4>
            <p>Juros Rendidos: <strong id="dpg-js-res-juros"></strong></p>
            <p>Montante Final: <strong id="dpg-js-res-montante"></strong></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('calc_juros_simples', 'dpg_render_juros_simples');
