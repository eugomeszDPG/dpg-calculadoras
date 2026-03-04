<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a Calculadora de Porcentagem
 */
function dpg_render_porcentagem()
{
    ob_start();
?>
    <div class="dpg-calculadora-wrapper dpg-calc-porcentagem">
        <h3>Calculadora de Porcentagem</h3>
        
        <div class="dpg-form-group">
            <label for="dpg-porc-valor-base">Valor Base:</label>
            <input type="number" id="dpg-porc-valor-base" step="any" placeholder="Ex: 1000" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-porc-percentual">Percentual (%):</label>
            <input type="number" id="dpg-porc-percentual" step="any" placeholder="Ex: 15" required>
        </div>

        <div class="dpg-form-actions">
            <button type="button" id="dpg-porc-btn-calcular">Calcular</button>
            <button type="button" id="dpg-porc-btn-limpar">Limpar</button>
        </div>

        <!-- Container de Erro -->
        <div id="dpg-porc-erro" style="color: #d9534f; background-color: #f9f2f2; border: 1px solid #d9534f; padding: 10px; margin-top: 15px; border-radius: 4px; display: none;">
            <strong>Ops:</strong> Por favor, preencha o valor base e o percentual com números válidos.
        </div>

        <!-- Container de Resultado -->
        <div id="dpg-porc-resultado-box" style="display: none;">
            <h4>Resultado:</h4>
            <p id="dpg-porc-resultado-texto"></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('calc_porcentagem', 'dpg_render_porcentagem');
