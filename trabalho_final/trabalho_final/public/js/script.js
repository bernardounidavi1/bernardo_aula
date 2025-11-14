document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario');
    
    if (!formulario) return;

    formulario.addEventListener('submit', function(e) {

        let perguntas = document.querySelectorAll('.pergunta');
        let faltando = false;

        perguntas.forEach(function(p) {
            const radios = p.querySelectorAll('input[type="radio"]');
            const algumaMarcada = [...radios].some(r => r.checked);

            if (!algumaMarcada) {
                faltando = true;
            }
        });

        if (faltando) {
            e.preventDefault();
            alert('Por favor, responda todas as perguntas antes de enviar.');
        }
    });
});
