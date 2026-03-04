<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a Calculadora de FGTS
 */
function dpg_render_fgts()
{
    ob_start();
?>
    <div class="dpg-calculadora-wrapper dpg-calc-fgts">
        <h3>Calculadora de FGTS</h3>
        
        <div class="dpg-form-group">
            <label for="dpg-fgts-salario">Salário Bruto Mensal (R$):</label>
            <input type="number" id="dpg-fgts-salario" step="any" placeholder="Ex: 2500" required>
        </div>

        <div class="dpg-form-actions">
            <button type="button" id="dpg-fgts-btn-calcular">Calcular</button>
            <button type="button" id="dpg-fgts-btn-limpar">Limpar</button>
        </div>

        <div id="dpg-fgts-erro" style="color: #d9534f; background-color: #f9f2f2; border: 1px solid #d9534f; padding: 10px; margin-top: 15px; border-radius: 4px; display: none;">
            <strong>Atenção:</strong> Insira um salário válido maior que zero.
        </div>

        <div id="dpg-fgts-resultado-box" style="display: none;">
            <h4>Depósitos Provisórios</h4>
            <p>Depósito Mensal (8%): <strong id="dpg-fgts-res-mensal"></strong></p>
            <p>Acúmulo Anual (estimado): <strong id="dpg-fgts-res-anual"></strong></p>
            <small style="color: #777;">* O FGTS é encargo da empresa e não é descontado do salário.</small>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('calc_fgts', 'dpg_render_fgts');
