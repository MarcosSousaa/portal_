//grafico 1
    var graf1 = new Chart(document.getElementById("graf1"), {

        type: 'bar',
        data: {
            // itens da horizontal [eixo X]
            labels: dias,
            // itens da vertical [eixo Y]
            datasets: [{
                    label: 'Producao',
                    data: total_producao,
                    fill: false,
                    backgroundColor: '#0000FF',
                    borderColor: '#0000FF'
                }, {
                    label: 'Perda',
                    data: total_perda,
                    fill: false,
                    backgroundColor: '#FF0000',
                    borderColor: '#FF0000'
                }]
        }

    });

//grafico 2
    var graf2 = new Chart(document.getElementById("graf2"), {

        type: 'bar',
        data: {
            // itens da horizontal [eixo X]
            labels: extrusora,
            // itens da vertical [eixo Y]
            datasets: [{
                    label: 'Producao',
                    data: total_producao_ext,
                    fill: false,
                    backgroundColor: '#0000FF',
                    borderColor: '#0000FF'
                }, {
                    label: 'Perda',
                    data: total_perda_ext,
                    fill: false,
                    backgroundColor: '#FF0000',
                    borderColor: '#FF0000'
                }]
        }
    });

    //grafico 3
    var graf3 = new Chart(document.getElementById("graf3"), {

        type: 'bar',
        data: {
            // itens da horizontal [eixo X]
            labels: turno,
            // itens da vertical [eixo Y]
            datasets: [{
                    label: 'Producao',
                    data: total_producao_turno,
                    fill: false,
                    backgroundColor: '#0000FF',
                    borderColor: '#0000FF'
                }, {
                    label: 'Perda',
                    data: total_perda_turno,
                    fill: false,
                    backgroundColor: '#FF0000',
                    borderColor: '#FF0000'
                }]
        }
    });

     //grafico 4 = Produção Por Operador
    var graf4 = new Chart(document.getElementById("graf4"), {

        type: 'pie',
        data: {
            // titulos
            labels: op,
            //informacoes
            datasets:[{
                data: total_producao_op,
                backgroundColor: ['#FFCE56', '#36A2ED', '#FF6384','#2980B9','#C0392B','#2C3E50','#00B894','#636E72','#D35400','#8E44AD','#7F8C8D','#341F97','#54A0FF','#3E2723','#000','#1B5E20','#D50000','#64B5F6','#B39DDB']

            }]
            
        }
    });

    //grafico 5 = PERDA ANALITICA
    var graf5 = new Chart(document.getElementById("graf5"), {

        type: 'bar',
        data: {
            // itens da horizontal [eixo X]
            labels: dias,
            // itens da vertical [eixo Y]
            datasets: [{
                    label: 'Apara',
                    data: total_perda_apara,
                    fill: false,
                    backgroundColor: '#2980b9',
                    borderColor: '#2980b9'
                }, {
                    label: 'Refile',
                    data: total_perda_refile,
                    fill: false,
                    backgroundColor: '#c0392b',
                    borderColor: '#c0392b'
                }, {
                    label: 'Borra',
                    data: total_perda_borra,
                    fill: false,
                    backgroundColor: '#16a085',
                    borderColor: '#16a085'    
                }, {
                    label: 'Acabamento',
                    data: total_perda_acabamento,
                    fill: false,
                    backgroundColor: '#2c3e50',
                    borderColor: '#2c3e50'
                }]
            
        }
    });