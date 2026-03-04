<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a Calculadora Estratégica PJ x CLT
 */
function dpg_render_pj_clt()
{
    ob_start();
?>
    <div class="dpg-calculadora-wrapper dpg-calc-pj-clt">
        <h3>Comparativo: CLT vs PJ - teste antonio</h3>
        <p style="font-size: 14px; color: #777; margin-bottom: 20px;">
            <em>* Simulação estimada e simplificada. Não substitui uma análise contábil comercial.</em>
        </p>
        
        <div class="dpg-form-group">
            <label for="dpg-pc-salario">Salário Bruto Projetado (R$):</label>
            <input type="number" id="dpg-pc-salario" step="any" placeholder="Ex: 5000" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-pc-imposto-pj">Percentual de Imposto PJ (%):</label>
            <input type="number" id="dpg-pc-imposto-pj" step="any" placeholder="Ex: 6" value="6" required>
        </div>

        <div class="dpg-form-group">
            <label for="dpg-pc-contador">Custo Mensal Contador PJ (R$):</label>
            <input type="number" id="dpg-pc-contador" step="any" placeholder="Ex: 350">
        </div>

        <div class="dpg-form-group">
            <label for="dpg-pc-descontos-clt">Outros Descontos CLT (R$):</label>
            <input type="number" id="dpg-pc-descontos-clt" step="any" placeholder="Ex: 250">
        </div>

        <div class="dpg-form-actions">
            <button type="button" id="dpg-pc-btn-calcular">Comparar</button>
            <button type="button" id="dpg-pc-btn-limpar">Limpar</button>
        </div>

        <div id="dpg-pc-erro" style="color: #d9534f; background-color: #f9f2f2; border: 1px solid #d9534f; padding: 10px; margin-top: 15px; border-radius: 4px; display: none;">
            <strong>Atenção:</strong> Preencha o salário bruto e a taxa de imposto corretamente.
        </div>

        <div id="dpg-pc-resultado-box" style="display: none;">
            <h4>Resumo Financeiro</h4>
            
            <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px;">
                <div style="flex: 1; min-width: 45%; background: #fff; padding: 15px; border-radius: 4px; border-left: 4px solid #0073aa;">
                    <p style="margin: 0 0 5px 0; font-size: 14px; color: #555;">Líquido Estimado <strong>CLT</strong></p>
                    <p id="dpg-pc-res-clt" style="margin: 0; font-size: 20px; font-weight: bold; color: #333;"></p>
                </div>
                
                <div style="flex: 1; min-width: 45%; background: #fff; padding: 15px; border-radius: 4px; border-left: 4px solid #28a745;">
                    <p style="margin: 0 0 5px 0; font-size: 14px; color: #555;">Líquido Estimado <strong>PJ</strong></p>
                    <p id="dpg-pc-res-pj" style="margin: 0; font-size: 20px; font-weight: bold; color: #28a745;"></p>
                </div>
            </div>
            
            <div style="background: #e9ecef; padding: 15px; border-radius: 10px; text-align: center;">
                <p style="margin: 0 0 5px 0; font-size: 14px;">Diferença Mensal Bruta (PJ x CLT):</p>
                <p id="dpg-pc-res-dif" style="margin: 0; font-size: 18px; font-weight: bold;"></p>
                <p id="dpg-pc-res-rec" style="margin: 10px 0 0 0; font-size: 16px; font-weight: bold; color: #0073aa;"></p>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('calc_pj_clt', 'dpg_render_pj_clt');
