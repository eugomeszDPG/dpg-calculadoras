<?php
// Bloqueio de acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderiza a Calculadora de Regra de Três Simples
 */
function dpg_render_regra_tres()
{
    ob_start();
?>
    <div class="dpg-calculadora-wrapper dpg-calc-regra-tres">
        <h3>Calculadora de Regra de Três</h3>
        <p style="margin-bottom: 25px; color: #555;">Se <strong>A</strong> equivale a <strong>B</strong>, então <strong>C</strong> equivale a <strong>X</strong>.</p>
        
        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label for="dpg-rt-a">Valor A:</label>
                <input type="number" id="dpg-rt-a" step="any" placeholder="A" required>
            </div>
            <div style="flex: 0; padding-top: 10px; font-weight: bold; color: #666;">➔</div>
            <div style="flex: 1;">
                <label for="dpg-rt-b">Valor B:</label>
                <input type="number" id="dpg-rt-b" step="any" placeholder="B" required>
            </div>
        </div>

        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label for="dpg-rt-c">Valor C:</label>
                <input type="number" id="dpg-rt-c" step="any" placeholder="C" required>
            </div>
            <div style="flex: 0; padding-top: 10px; font-weight: bold; color: #666;">➔</div>
            <div style="flex: 1;">
                <label for="dpg-rt-resultado-input">Valor X:</label>
                <input type="text" id="dpg-rt-resultado-input" disabled placeholder="Resultado (X)" style="font-weight: bold; color: #4FC608;">
            </div>
        </div>

        <div class="dpg-form-actions">
            <button type="button" id="dpg-rt-btn-calcular">Calcular</button>
            <button type="button" id="dpg-rt-btn-limpar">Limpar</button>
        </div>

        <!-- Container de Erro -->
        <div id="dpg-rt-erro" style="color: #d9534f; background-color: #f9f2f2; border: 1px solid #d9534f; padding: 10px; margin-top: 15px; border-radius: 4px; display: none;">
            <strong>Atenção:</strong> Preencha os Valores A, B e C. O Valor "A" não pode ser zero.
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('calc_regra_tres', 'dpg_render_regra_tres');
