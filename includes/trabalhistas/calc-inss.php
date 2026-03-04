<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a Calculadora Simplificada de INSS
 */
function dpg_render_inss()
{
    ob_start();
?>
    <div class="dpg-calculadora-wrapper dpg-calc-inss">
        <h3>Simulador de INSS</h3>
        
        <div class="dpg-form-group">
            <label for="dpg-inss-salario">Salário Bruto / Pró-labore (R$):</label>
            <input type="number" id="dpg-inss-salario" step="any" placeholder="Ex: 3000" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-inss-tipo">Tipo de Contribuição:</label>
            <select id="dpg-inss-tipo" required>
                <option value="clt">Trabalhador CLT (Aprox. 9% a 14%)</option>
                <option value="autonomo_11">Autônomo/Sócio (11%)</option>
                <option value="autonomo_20">Autônomo Tradicional (20%)</option>
            </select>
            <small style="color: #777; display: block; margin-top: 5px;">* Modelo simplificado baseado em alíquotas médias estimadas.</small>
        </div>

        <div class="dpg-form-actions">
            <button type="button" id="dpg-inss-btn-calcular">Calcular</button>
            <button type="button" id="dpg-inss-btn-limpar">Limpar</button>
        </div>

        <div id="dpg-inss-erro" style="color: #d9534f; background-color: #f9f2f2; border: 1px solid #d9534f; padding: 10px; margin-top: 15px; border-radius: 4px; display: none;">
            <strong>Atenção:</strong> Insira um salário bruto válido.
        </div>

        <div id="dpg-inss-resultado-box" style="display: none;">
            <h4>Valor de Contribuição:</h4>
            <p id="dpg-inss-res-valor" style="font-size: 24px; font-weight: bold; color: #4FC608;"></p>
            <small style="color: #666;">Valores limitados ao Teto Previdenciário vigente.</small>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('calc_inss', 'dpg_render_inss');
