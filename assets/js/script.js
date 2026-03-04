/**
 * DPG Calculadoras - Scripts Globais
 */

// Estrutura base com objeto/namespace DPG_CALC para evitar conflito global
var DPG_CALC = DPG_CALC || {};

(function () {
    'use strict';

    // Configurações e estado global
    DPG_CALC.config = {
        debug: true
    };

    // Sub-objeto para registrar instâncias de calculadoras no futuro
    DPG_CALC.modules = {};

    // ============================================
    // Módulo: Calculadora de Porcentagem
    // ============================================
    DPG_CALC.modules.porcentagem = {
        init: function () {
            var btnCalcular = document.getElementById('dpg-porc-btn-calcular');
            var btnLimpar = document.getElementById('dpg-porc-btn-limpar');

            if (!btnCalcular) return; // Não carrega os binds caso o shortcode não esteja na tela

            btnCalcular.addEventListener('click', this.calcular);
            btnLimpar.addEventListener('click', this.limpar);
        },

        calcular: function () {
            var valorBaseEl = document.getElementById('dpg-porc-valor-base');
            var percentualEl = document.getElementById('dpg-porc-percentual');
            var boxErro = document.getElementById('dpg-porc-erro');
            var boxResultado = document.getElementById('dpg-porc-resultado-box');
            var textoResultado = document.getElementById('dpg-porc-resultado-texto');

            var valorBase = parseFloat(valorBaseEl.value);
            var percentual = parseFloat(percentualEl.value);

            // Valores inválidos ou vazios
            if (isNaN(valorBase) || isNaN(percentual)) {
                boxErro.style.display = 'block';
                boxResultado.style.display = 'none';
                return;
            }

            boxErro.style.display = 'none';

            var calculo = (valorBase * percentual) / 100;

            textoResultado.innerHTML = percentual + '% de ' + valorBase + ' = <strong>' + calculo + '</strong>';
            boxResultado.style.display = 'block';
        },

        limpar: function () {
            document.getElementById('dpg-porc-valor-base').value = '';
            document.getElementById('dpg-porc-percentual').value = '';
            document.getElementById('dpg-porc-erro').style.display = 'none';
            document.getElementById('dpg-porc-resultado-box').style.display = 'none';
        }
    };

    // ============================================
    // Módulo: Calculadora de Regra de Três
    // ============================================
    DPG_CALC.modules.regra_tres = {
        init: function () {
            var btnCalcular = document.getElementById('dpg-rt-btn-calcular');
            var btnLimpar = document.getElementById('dpg-rt-btn-limpar');

            if (!btnCalcular) return;

            btnCalcular.addEventListener('click', this.calcular);
            btnLimpar.addEventListener('click', this.limpar);
        },

        calcular: function () {
            var valA = parseFloat(document.getElementById('dpg-rt-a').value);
            var valB = parseFloat(document.getElementById('dpg-rt-b').value);
            var valC = parseFloat(document.getElementById('dpg-rt-c').value);
            var errBox = document.getElementById('dpg-rt-erro');
            var outX = document.getElementById('dpg-rt-resultado-input');

            // Validações
            if (isNaN(valA) || isNaN(valB) || isNaN(valC) || valA === 0) {
                errBox.style.display = 'block';
                outX.value = '';
                return;
            }

            errBox.style.display = 'none';

            // X = (B * C) / A
            var resultadoX = (valB * valC) / valA;

            // Formatando o resultado para evitar numero gigante caso de erro de dízima:
            var displayX = Number.isInteger(resultadoX) ? resultadoX : resultadoX.toFixed(2);

            outX.value = displayX;
        },

        limpar: function () {
            document.getElementById('dpg-rt-a').value = '';
            document.getElementById('dpg-rt-b').value = '';
            document.getElementById('dpg-rt-c').value = '';
            document.getElementById('dpg-rt-resultado-input').value = '';
            document.getElementById('dpg-rt-erro').style.display = 'none';
        }
    };

    // ============================================
    // Módulo: Calculadora de Juros Simples
    // ============================================
    DPG_CALC.modules.juros_simples = {
        init: function () {
            var btnCalcular = document.getElementById('dpg-js-btn-calcular');
            var btnLimpar = document.getElementById('dpg-js-btn-limpar');
            if (!btnCalcular) return;
            btnCalcular.addEventListener('click', this.calcular);
            btnLimpar.addEventListener('click', this.limpar);
        },

        calcular: function () {
            var cap = parseFloat(document.getElementById('dpg-js-capital').value);
            var taxaStr = document.getElementById('dpg-js-taxa').value.replace(',', '.'); // Permite usar vírgula se digitar
            var taxa = parseFloat(taxaStr);
            var tempo = parseInt(document.getElementById('dpg-js-tempo').value, 10);
            var boxErro = document.getElementById('dpg-js-erro');
            var boxResultado = document.getElementById('dpg-js-resultado-box');

            if (isNaN(cap) || isNaN(taxa) || isNaN(tempo) || tempo <= 0) {
                boxErro.style.display = 'block';
                boxResultado.style.display = 'none';
                return;
            }

            boxErro.style.display = 'none';

            // J = C * i * t
            var juros = cap * (taxa / 100) * tempo;
            var montante = cap + juros;

            document.getElementById('dpg-js-res-juros').textContent = DPG_CALC.utils.formatCurrencyBRL(juros);
            document.getElementById('dpg-js-res-montante').textContent = DPG_CALC.utils.formatCurrencyBRL(montante);
            boxResultado.style.display = 'block';
        },

        limpar: function () {
            document.getElementById('dpg-js-capital').value = '';
            document.getElementById('dpg-js-taxa').value = '';
            document.getElementById('dpg-js-tempo').value = '';
            document.getElementById('dpg-js-erro').style.display = 'none';
            document.getElementById('dpg-js-resultado-box').style.display = 'none';
        }
    };

    // ============================================
    // Módulo: Calculadora de Juros Compostos
    // ============================================
    DPG_CALC.modules.juros_compostos = {
        init: function () {
            var btnCalcular = document.getElementById('dpg-jc-btn-calcular');
            var btnLimpar = document.getElementById('dpg-jc-btn-limpar');
            if (!btnCalcular) return;
            btnCalcular.addEventListener('click', this.calcular);
            btnLimpar.addEventListener('click', this.limpar);
        },

        calcular: function () {
            var cap = parseFloat(document.getElementById('dpg-jc-capital').value);
            var taxaStr = document.getElementById('dpg-jc-taxa').value.replace(',', '.');
            var taxa = parseFloat(taxaStr);
            var tempo = parseInt(document.getElementById('dpg-jc-tempo').value, 10);
            var boxErro = document.getElementById('dpg-jc-erro');
            var boxResultado = document.getElementById('dpg-jc-resultado-box');

            if (isNaN(cap) || isNaN(taxa) || isNaN(tempo) || tempo <= 0) {
                boxErro.style.display = 'block';
                boxResultado.style.display = 'none';
                return;
            }

            boxErro.style.display = 'none';

            // M = C * (1 + i)^t
            var montante = cap * Math.pow((1 + (taxa / 100)), tempo);
            var juros = montante - cap;

            document.getElementById('dpg-jc-res-juros').textContent = DPG_CALC.utils.formatCurrencyBRL(juros);
            document.getElementById('dpg-jc-res-montante').textContent = DPG_CALC.utils.formatCurrencyBRL(montante);
            boxResultado.style.display = 'block';
        },

        limpar: function () {
            document.getElementById('dpg-jc-capital').value = '';
            document.getElementById('dpg-jc-taxa').value = '';
            document.getElementById('dpg-jc-tempo').value = '';
            document.getElementById('dpg-jc-erro').style.display = 'none';
            document.getElementById('dpg-jc-resultado-box').style.display = 'none';
        }
    };

    // ============================================
    // Módulo: Calculadora de Investimentos
    // ============================================
    DPG_CALC.modules.investimento = {
        init: function () {
            var btnCalcular = document.getElementById('dpg-inv-btn-calcular');
            var btnLimpar = document.getElementById('dpg-inv-btn-limpar');
            if (!btnCalcular) return;
            btnCalcular.addEventListener('click', this.calcular);
            btnLimpar.addEventListener('click', this.limpar);
        },

        calcular: function () {
            var capInicial = parseFloat(document.getElementById('dpg-inv-inicial').value);
            var capMensal = parseFloat(document.getElementById('dpg-inv-mensal').value);
            var taxaStr = document.getElementById('dpg-inv-taxa').value.replace(',', '.');
            var taxa = parseFloat(taxaStr);
            var tempo = parseInt(document.getElementById('dpg-inv-tempo').value, 10);
            var boxErro = document.getElementById('dpg-inv-erro');
            var boxResultado = document.getElementById('dpg-inv-resultado-box');

            if (isNaN(capInicial) || isNaN(capMensal) || isNaN(taxa) || isNaN(tempo) || tempo <= 0) {
                boxErro.style.display = 'block';
                boxResultado.style.display = 'none';
                return;
            }

            boxErro.style.display = 'none';

            var taxaDecimal = taxa / 100;

            // M1 (Montante do Capital Inicial): C * (1+i)^t
            var montanteInicial = capInicial * Math.pow((1 + taxaDecimal), tempo);

            // M2 (Montante das Aplicações Mensais): PMT * [((1+i)^t - 1) / i]
            var montanteAportes = 0;
            if (taxaDecimal > 0) {
                montanteAportes = capMensal * ((Math.pow((1 + taxaDecimal), tempo) - 1) / taxaDecimal);
            } else {
                montanteAportes = capMensal * tempo; // Se taxa = 0, soma simples
            }

            var montanteFinal = montanteInicial + montanteAportes;
            var totalInvestido = capInicial + (capMensal * tempo);
            var jurosGanhos = montanteFinal - totalInvestido;

            document.getElementById('dpg-inv-res-investido').textContent = DPG_CALC.utils.formatCurrencyBRL(totalInvestido);
            document.getElementById('dpg-inv-res-juros').textContent = DPG_CALC.utils.formatCurrencyBRL(jurosGanhos);
            document.getElementById('dpg-inv-res-montante').textContent = DPG_CALC.utils.formatCurrencyBRL(montanteFinal);

            boxResultado.style.display = 'block';
        },

        limpar: function () {
            document.getElementById('dpg-inv-inicial').value = '';
            document.getElementById('dpg-inv-mensal').value = '';
            document.getElementById('dpg-inv-taxa').value = '';
            document.getElementById('dpg-inv-tempo').value = '';
            document.getElementById('dpg-inv-erro').style.display = 'none';
            document.getElementById('dpg-inv-resultado-box').style.display = 'none';
        }
    };

    // ============================================
    // Módulo: Calculadora PJ x CLT
    // ============================================
    DPG_CALC.modules.pj_clt = {
        init: function () {
            var btnCalcular = document.getElementById('dpg-pc-btn-calcular');
            var btnLimpar = document.getElementById('dpg-pc-btn-limpar');
            if (!btnCalcular) return;
            btnCalcular.addEventListener('click', this.calcular);
            btnLimpar.addEventListener('click', this.limpar);
        },

        calcular: function () {
            var brutoCLT = parseFloat(document.getElementById('dpg-pc-salario').value);
            var impostoPJ = parseFloat(document.getElementById('dpg-pc-imposto-pj').value.replace(',', '.'));
            var contadorPJ = parseFloat(document.getElementById('dpg-pc-contador').value) || 0;
            var descontosCLT = parseFloat(document.getElementById('dpg-pc-descontos-clt').value) || 0;

            var boxErro = document.getElementById('dpg-pc-erro');
            var boxResultado = document.getElementById('dpg-pc-resultado-box');

            if (isNaN(brutoCLT) || isNaN(impostoPJ) || brutoCLT <= 0) {
                boxErro.style.display = 'block';
                boxResultado.style.display = 'none';
                return;
            }

            boxErro.style.display = 'none';

            // Lógica Simplificada CLT
            // Considerando um desconto empírico médio aproximado de 15% a 20% dependendo da faixa 
            // Para simplificação que a task pediu usaremos 20% de dedução "Inss/IRRF" generalizada + os descontos informados
            var deducaoPadraoCLT = brutoCLT * 0.20;
            var liquidoCLT = brutoCLT - deducaoPadraoCLT - descontosCLT;
            if (liquidoCLT < 0) liquidoCLT = 0;

            // Lógica Simplificada PJ
            var deducaoImpostoPJ = brutoCLT * (impostoPJ / 100);
            var liquidoPJ = brutoCLT - deducaoImpostoPJ - contadorPJ;
            if (liquidoPJ < 0) liquidoPJ = 0;

            // Diferença
            var diferenca = Math.abs(liquidoPJ - liquidoCLT);

            document.getElementById('dpg-pc-res-clt').textContent = DPG_CALC.utils.formatCurrencyBRL(liquidoCLT);
            document.getElementById('dpg-pc-res-pj').textContent = DPG_CALC.utils.formatCurrencyBRL(liquidoPJ);
            document.getElementById('dpg-pc-res-dif').textContent = DPG_CALC.utils.formatCurrencyBRL(diferenca);

            var recomendacaoEl = document.getElementById('dpg-pc-res-rec');
            if (liquidoPJ > liquidoCLT) {
                recomendacaoEl.textContent = "Avaliando apenas o fluxo de caixa, atuar como PJ parece mais vantajoso. Porém, não esqueça dos benefícios (férias/13º) da CLT.";
                recomendacaoEl.style.color = '#28a745';
            } else if (liquidoCLT > liquidoPJ) {
                recomendacaoEl.textContent = "Financeiramente, o formato CLT garante maior liquidez baseada nestes percentuais.";
                recomendacaoEl.style.color = '#0073aa';
            } else {
                recomendacaoEl.textContent = "Os cenários se empataram monetariamente. Avalie benefícios qualitativos.";
                recomendacaoEl.style.color = '#555';
            }

            boxResultado.style.display = 'block';
        },

        limpar: function () {
            document.getElementById('dpg-pc-salario').value = '';
            document.getElementById('dpg-pc-imposto-pj').value = '6';
            document.getElementById('dpg-pc-contador').value = '';
            document.getElementById('dpg-pc-descontos-clt').value = '';
            document.getElementById('dpg-pc-erro').style.display = 'none';
            document.getElementById('dpg-pc-resultado-box').style.display = 'none';
        }
    };

    // ============================================
    // Módulo: Calculadora de INSS (Estimada Simplificada)
    // ============================================
    DPG_CALC.modules.inss = {
        init: function () {
            var btnCalcular = document.getElementById('dpg-inss-btn-calcular');
            var btnLimpar = document.getElementById('dpg-inss-btn-limpar');
            if (!btnCalcular) return;
            btnCalcular.addEventListener('click', this.calcular);
            btnLimpar.addEventListener('click', this.limpar);
        },

        calcular: function () {
            var salario = parseFloat(document.getElementById('dpg-inss-salario').value);
            var tipo = document.getElementById('dpg-inss-tipo').value;
            var boxErro = document.getElementById('dpg-inss-erro');
            var boxResultado = document.getElementById('dpg-inss-resultado-box');

            if (isNaN(salario) || salario <= 0) {
                boxErro.style.display = 'block';
                boxResultado.style.display = 'none';
                return;
            }
            boxErro.style.display = 'none';

            var tetoINSS = 7786.02; // Teto 2024 pra referencial simples
            var baseCalculo = salario > tetoINSS ? tetoINSS : salario;
            var contribuicao = 0;

            if (tipo === 'clt') {
                // Simplificação da progressiva girando em torno de 9% a 10% media 
                contribuicao = baseCalculo * 0.09;
            } else if (tipo === 'autonomo_11') {
                // Geralmente limitado ao salário mínimo 11% (1412 em 2024 = ~155.32)
                var salMinimo = 1412.00;
                contribuicao = salMinimo * 0.11;
            } else if (tipo === 'autonomo_20') {
                contribuicao = baseCalculo * 0.20;
            }

            // Cap no Teto Máximo Prático de CLT/Autônomo (~908 / ~1557) apenas para coerência
            if (tipo === 'clt' && contribuicao > 908.85) contribuicao = 908.85;

            document.getElementById('dpg-inss-res-valor').textContent = DPG_CALC.utils.formatCurrencyBRL(contribuicao);
            boxResultado.style.display = 'block';
        },

        limpar: function () {
            document.getElementById('dpg-inss-salario').value = '';
            document.getElementById('dpg-inss-erro').style.display = 'none';
            document.getElementById('dpg-inss-resultado-box').style.display = 'none';
        }
    };

    // ============================================
    // Módulo: Calculadora de FGTS
    // ============================================
    DPG_CALC.modules.fgts = {
        init: function () {
            var btnCalcular = document.getElementById('dpg-fgts-btn-calcular');
            var btnLimpar = document.getElementById('dpg-fgts-btn-limpar');
            if (!btnCalcular) return;
            btnCalcular.addEventListener('click', this.calcular);
            btnLimpar.addEventListener('click', this.limpar);
        },

        calcular: function () {
            var salario = parseFloat(document.getElementById('dpg-fgts-salario').value);
            var boxErro = document.getElementById('dpg-fgts-erro');
            var boxResultado = document.getElementById('dpg-fgts-resultado-box');

            if (isNaN(salario) || salario <= 0) {
                boxErro.style.display = 'block';
                boxResultado.style.display = 'none';
                return;
            }
            boxErro.style.display = 'none';

            var mensal = salario * 0.08;
            var anual = mensal * 12;

            document.getElementById('dpg-fgts-res-mensal').textContent = DPG_CALC.utils.formatCurrencyBRL(mensal);
            document.getElementById('dpg-fgts-res-anual').textContent = DPG_CALC.utils.formatCurrencyBRL(anual);
            boxResultado.style.display = 'block';
        },

        limpar: function () {
            document.getElementById('dpg-fgts-salario').value = '';
            document.getElementById('dpg-fgts-erro').style.display = 'none';
            document.getElementById('dpg-fgts-resultado-box').style.display = 'none';
        }
    };

    // Função de inicialização universal
    DPG_CALC.init = function () {
        if (DPG_CALC.config.debug) {
            console.log('DPG Calculadoras: Framework JavaScript inicializado com sucesso.');
        }

        // Executa a inicialização de cada módulo (calculadora) caso existam
        for (var moduleName in DPG_CALC.modules) {
            if (Object.prototype.hasOwnProperty.call(DPG_CALC.modules, moduleName)) {
                var module = DPG_CALC.modules[moduleName];
                if (typeof module.init === 'function') {
                    module.init();
                }
            }
        }

        // Você pode chamar binds de eventos que servirão em todos os formulários
        DPG_CALC.bindGlobalEvents();
    };

    // Eventos globais da estrutura base
    DPG_CALC.bindGlobalEvents = function () {
        // Exemplo: Validação ou máscara em campos específicos se necessário futuramente.
    };

    // Métodos utilitários que podem ser usados por diversas calculadoras
    DPG_CALC.utils = {
        /**
         * Formata um valor numérico para Moeda BRL
         * @param {number} valor 
         * @returns {string} Valor formatado (R$ 0,00)
         */
        formatCurrencyBRL: function (valor) {
            return new Intl.NumberFormat('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }).format(valor);
        },

        /**
         * Limpa uma string de moeda transformando em número float válido
         * @param {string} stringValor 
         * @returns {number} Valor limpo
         */
        parseCurrencyToFloat: function (stringValor) {
            if (!stringValor) return 0;
            return parseFloat(stringValor.replace(/[^\d,-]/g, '').replace(',', '.'));
        }
    };

    // Executa a rotina principal assim que o DOM for carregado
    document.addEventListener('DOMContentLoaded', function () {
        DPG_CALC.init();
    });

})();
