/**
 * DPG Calculadoras - Scripts Administrativos
 * Responsável pela Lógica do Botão de Copiar Shortcode
 */

document.addEventListener('DOMContentLoaded', function () {

    var buttons = document.querySelectorAll('.dpg-btn-copy');
    var toast = document.getElementById('dpg-toast-notification');
    var toastTimeout;

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var shortcodeText = this.getAttribute('data-clipboard');

            // Usando API Moderna Clipboard (Necessário HTTPS ou Localhost nativo WP)
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(shortcodeText).then(function () {
                    showToast();
                }).catch(function (err) {
                    console.error('Falha ao copiar usando Clipboard API: ', err);
                    fallbackCopyTextToClipboard(shortcodeText);
                });
            } else {
                // Fallback (Método document.execCommand obsoleto mas funcional para HTTP legado)
                fallbackCopyTextToClipboard(shortcodeText);
            }
        });
    });

    function fallbackCopyTextToClipboard(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;

        // Evita rolar a página para textarea offscreen
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";
        textArea.style.opacity = "0";

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            if (successful) {
                showToast();
            }
        } catch (err) {
            console.error('Falha ao copiar no fallback: ', err);
            alert("Não foi possível copiar. Selecione e copie manualmente o código.");
        }

        document.body.removeChild(textArea);
    }

    function showToast() {
        if (!toast) return;

        toast.classList.add('show');

        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(function () {
            toast.classList.remove('show');
        }, 3000); // 3 Segundos
    }
});
