document.getElementById('calcular').addEventListener('click', function() {
    let oferta = document.getElementById('oferta').value;
    let demanda = document.getElementById('demanda').value;
    let costos = document.getElementById('costos').value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'calcular.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            document.getElementById('resultados').innerHTML = this.responseText;
        }
    };
    xhr.send('oferta=' + oferta + '&demanda=' + demanda + '&costos=' + costos);
});