<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a Calculadora de Juros Compostos
 */
function dpg_render_juros_compostos()
{
    ob_start();
?>
    <div class="dpg-calculadora-wrapper dpg-calc-juros-compostos">
        <h3>Calculadora de Juros Compostos</h3>
        
        <div class="dpg-form-group">
            <label for="dpg-jc-capital">Capital Inicial (R$):</label>
            <input type="number" id="dpg-jc-capital" step="any" placeholder="Ex: 1000" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-jc-taxa">Taxa de Juros (% ao mês):</label>
            <input type="number" id="dpg-jc-taxa" step="any" placeholder="Ex: 1.5" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-jc-tempo">Tempo (meses):</label>
            <input type="number" id="dpg-jc-tempo" step="1" placeholder="Ex: 24" required>
        </div>

        <div class="dpg-form-actions">
            <button type="button" id="dpg-jc-btn-calcular">Calcular</button>
            <button type="button" id="dpg-jc-btn-limpar">Limpar</button>
        </div>

        <div id="dpg-jc-erro" style="color: #d9534f; background-color: #f9f2f2; border: 1px solid #d9534f; padding: 10px; margin-top: 15px; border-radius: 4px; display: none;">
            <strong>Atenção:</strong> Preencha todos os campos com números válidos e tempo maior que zero.
        </div>

        <div id="dpg-jc-resultado-box" style="display: none;">
            <h4>Resultados:</h4>
            <p>Juros Rendidos: <strong id="dpg-jc-res-juros"></strong></p>
            <p>Montante Final: <strong id="dpg-jc-res-montante"></strong></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('calc_juros_compostos', 'dpg_render_juros_compostos');
