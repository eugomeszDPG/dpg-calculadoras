<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a Calculadora de Investimento com Aporte Mensal
 */
function dpg_render_investimento()
{
    ob_start();
?>
    <div class="dpg-calculadora-wrapper dpg-calc-investimento">
        <h3>Calculadora de Investimentos</h3>
        
        <div class="dpg-form-group">
            <label for="dpg-inv-inicial">Aporte Inicial (R$):</label>
            <input type="number" id="dpg-inv-inicial" step="any" placeholder="Ex: 5000" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-inv-mensal">Aporte Mensal (R$):</label>
            <input type="number" id="dpg-inv-mensal" step="any" placeholder="Ex: 500" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-inv-taxa">Taxa de Rendimento (% ao mês):</label>
            <input type="number" id="dpg-inv-taxa" step="any" placeholder="Ex: 0.8" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-inv-tempo">Tempo (meses):</label>
            <input type="number" id="dpg-inv-tempo" step="1" placeholder="Ex: 60" required>
        </div>

        <div class="dpg-form-actions">
            <button type="button" id="dpg-inv-btn-calcular">Calcular</button>
            <button type="button" id="dpg-inv-btn-limpar">Limpar</button>
        </div>

        <div id="dpg-inv-erro" style="color: #d9534f; background-color: #f9f2f2; border: 1px solid #d9534f; padding: 10px; margin-top: 15px; border-radius: 4px; display: none;">
            <strong>Atenção:</strong> Preencha todos os campos com números válidos e tempo maior que zero.
        </div>

        <div id="dpg-inv-resultado-box" style="display: none;">
            <h4>Projeção Estimada:</h4>
            <p>Valor Total Investido (seu bolso): <strong id="dpg-inv-res-investido"></strong></p>
            <p>Juros Ganhos (rendimento): <strong id="dpg-inv-res-juros"></strong></p>
            <p>Valor Final: <strong id="dpg-inv-res-montante"></strong></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('calc_investimento', 'dpg_render_investimento');
