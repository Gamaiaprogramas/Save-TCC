 document.addEventListener('DOMContentLoaded', function () {
        let divida1 = document.getElementById('idDivida1');
        let gasto1 = document.getElementById('idGasto1');
        let divida2 = document.getElementById('idDivida2');
        let gasto2 = document.getElementById('idGasto2');
        let saldo = document.getElementById('idSaldo');
        let botao = document.getElementById('buton');       
        let botaoDivida = document.getElementById('butonDivida');  
        let botaoGasto = document.getElementById('butonGasto');    
        let divMae = document.getElementById('idDivMae');
        let voltar = document.getElementById('voltar');
        // Esconde as divs inicialmente
        if (divida1) divida1.style.display = 'none';
        if (gasto1) gasto1.style.display = 'none';
        if (divida2) divida2.style.display = 'none';
       
        if (gasto2) gasto2.style.display = 'none';
        if (saldo) saldo.style.display = 'none';
        if(divMae) divMae.style.display = 'none';
        // Quando o botão for clicado, mostrar as divs
        

    botao.addEventListener('click' , function (){
       if(divMae) divMae.style.display = 'block';
       if (saldo) saldo.style.display = 'block';
       window.scrollTo({
        top: 0,
        behavior: 'smooth' // Para um efeito suave
    });
    document.body.style.overflow = 'hidden';
    if (voltar) voltar.style.display ='block';
    })

    botaoDivida.addEventListener('click' , function(){
        if(divMae) divMae.style.display = 'block';
        if (divida1) divida1.style.display = 'block';
        if (divida2) divida2.style.display = 'block';
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Para um efeito suave
        });
        document.body.style.overflow = 'hidden';
        
        const dashboardContainer = document.querySelector('.dashboard-container');
        const header = document.querySelector('header');
        if (dashboardContainer) {
            header.style.filter = 'blur(5px)';
            dashboardContainer.style.filter = 'blur(5px)';
        }
    
        // Exibe o botão de voltar
        if (voltar) voltar.style.display = 'block';
    });

     botaoGasto.addEventListener('click' , function() {
        if (divMae) divMae.style.display = 'block';
        if (gasto2) gasto2.style.display = 'block';
        if (gasto1) gasto1.style.display = 'block';
    
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Para um efeito suave
        });
    
        // Desativa o overflow do body para evitar rolagem
        document.body.style.overflow = 'hidden';
    
        // Aplica o blur na div 'tituloDash'
        const dashboardContainer = document.querySelector('.dashboard-container');
        const header = document.querySelector('header');
        if (dashboardContainer) {
            header.style.filter = 'blur(5px)';
            dashboardContainer.style.filter = 'blur(5px)';
        }
    
        // Exibe o botão de voltar
        if (voltar) voltar.style.display = 'block';
    });
    
     voltar.addEventListener('click' , function(){
        if (divida1) divida1.style.display = 'none';
        if (gasto1) gasto1.style.display = 'none';
        if (divida2) divida2.style.display = 'none';
       
        if (gasto2) gasto2.style.display = 'none';
        if (saldo) saldo.style.display = 'none';
        if(divMae) divMae.style.display = 'none';
        document.body.style.overflow = 'auto';
        if(voltar) voltar.style.display = 'none';

        const dashboardContainer = document.querySelector('.dashboard-container');
        const header = document.querySelector('header');
        if(dashboardContainer){
            header.style.filter = 'blur(0px)';
            dashboardContainer.style.filter = 'blur(0px)';
        }
     });
    });