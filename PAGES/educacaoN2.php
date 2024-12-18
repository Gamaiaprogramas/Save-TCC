<?php
 @session_start();
 if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);

}

?>
<link rel="stylesheet" href="../STYLE/educacao.css">
<?php

    require("../ACTS/sec_educacao.php");
       include("../partials/headeralternative.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Save - Plano 2</title>
  <style>
      header{
          background-color: #f8f9fa !important;
          box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
      }
  </style>
</head>
<body>
  <div class="tituloConteudo">
    <a>Seja bem-vindo(a) a sua página de <a class="laranja"> educação financeira!</a></a>
  </div>
  <div class="introducao">
    <div class="tituloIntroducao">
      <a class="laranja">Introdução!</a>
    </div>
    <div class="textoIntroducao">
      <a>É bom te ver aqui <?php echo "$_SESSION[nome]"; ?>, você escolheu o Plano 2, por isso segue aqui as fases para alcançarmos os objetivos propostos em nosso cronograma de acordo com sua situação.</a>
    </div>
      
  </div>
  <div class="fase1">
    <div class="nomeFase">
    <a><a class="faseG">Fase 1: </a>Aprender a lidar com dinheiro</a>
</div>
<div class="textoFase">
<a>A Importância de Aprender a Lidar com Dinheiro:</a>
  <a>Desenvolver habilidades para gerenciar dinheiro é crucial para alcançar estabilidade financeira. Com o conhecimento certo, você pode tomar decisões mais informadas, evitar dívidas desnecessárias, e criar um plano sólido para alcançar seus objetivos financeiros.</a>
  <a>Como Aprender a Lidar com Dinheiro de Forma Prática:</a>
  <a>1) Crie um orçamento: Liste suas receitas e despesas, garantindo que seus gastos estejam dentro do que você pode pagar.</a>
  <a>2) Defina prioridades: Concentre-se em pagar contas essenciais e reservar uma parte para poupança.</a>
  <a>3) Evite dívidas: Use crédito com responsabilidade e pague sempre dentro do prazo.</a>
  <a>4) Invista em conhecimento: Leia livros, assista vídeos e faça cursos sobre educação financeira.</a>
  <a>5) Pratique o controle emocional: Evite compras impulsivas e mantenha o foco em seus objetivos financeiros.</a>
</div>
</div>
</div>
<div class="espacoVideo1">
  <div class="video">
    <iframe 
        width="700" 
        height="350" 
        src="https://www.youtube.com/embed/V7z5bC4GOQI?si=akO-dXBhlOU-LA25"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </iframe>
  </div>
</div>

  </div>
  <div class="espacoBtn1">
      <div class="btnFase1">
        <button>Concluir Fase 1</button>
      </div>
  </div>


  <div class="fase2">
    <div class="nomeFase">
    <a><a class="faseG">Fase 2: </a>Pagar dívidas</a>
    </div>
    <div class="textoFase">
    <a>A Importância de Pagar Dívidas:</a>
  <a>Quitação de dívidas é um passo fundamental para alcançar a estabilidade financeira. Estar livre de dívidas permite maior liberdade, reduz os custos com juros e multas, e proporciona mais segurança no planejamento financeiro de longo prazo.</a>
  <a>Como Começar a Pagar suas Dívidas:</a>
  <a>1) Organize suas dívidas: Liste todas as dívidas que você possui, incluindo o valor, a taxa de juros e o prazo de pagamento.</a>
  <a>2) Priorize as dívidas: Comece pagando as dívidas com as maiores taxas de juros (cartões de crédito, empréstimos pessoais) para reduzir o impacto financeiro.</a>
  <a>3) Faça pagamentos maiores: Tente aumentar o valor das parcelas para quitar as dívidas mais rapidamente, se possível.</a>
  <a>4) Negocie com credores: Em alguns casos, você pode negociar taxas de juros ou prazos para facilitar o pagamento.</a>
  <a>5) Crie um fundo de emergência: Para evitar cair em mais dívidas, reserve uma quantia mensal para emergências, sem precisar recorrer ao crédito.</a>
    </div>
  </div>
  <div class="espacoVideo2">
      <div class="video">
      <iframe 
          width="700" 
          height="350" 
          src="https://www.youtube.com/embed/KuRZucr-YLE?si=kECLvC-YxharOis-"  
          title="YouTube video player" 
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          referrerpolicy="strict-origin-when-cross-origin" 
          allowfullscreen>
      </iframe>
      </div>
  </div>

  
  <div class="espacoBtn2">
      <div class="btnFase2">
        <button>Concluir Fase 2</button>
      </div>
  </div>


  <div class="fase3">
    <div class="nomeFase">
      <a><a class="faseG">Fase 3: </a>Sair do vermelho</a>
    </div>
    <div class="textoFase">
    <a>A Importância de Sair do Vermelho:</a>
  <a>Estar no "vermelho" significa viver com dívidas que superam a sua capacidade de pagamento. Sair dessa situação é crucial para alcançar a saúde financeira e a tranquilidade. Ao eliminar o desequilíbrio entre receitas e despesas, você pode ter um controle maior sobre seu dinheiro e começar a construir uma base sólida para o futuro.</a>
  <a>Como Sair do Vermelho:</a>
  <a>1) Avalie sua situação financeira: Liste todas as dívidas e verifique seus gastos mensais. Entenda para onde seu dinheiro está indo.</a>
  <a>2) Corte despesas desnecessárias: Revise seus hábitos de consumo e procure formas de economizar, como reduzir compras impulsivas ou negociar contratos de serviços.</a>
  <a>3) Aumente sua receita: Se possível, busque fontes adicionais de renda, como trabalhos extras ou investimentos.</a>
  <a>4) Negocie com credores: Tente renegociar suas dívidas para obter melhores condições de pagamento e reduzir o valor das parcelas.</a>
  <a>5) Crie um orçamento: Planeje seus gastos mensais e reserve uma parte da sua renda para quitar as dívidas e construir uma reserva de emergência.</a>

    </div>
  </div>
  <div class="espacoVideo3">
      <div class="video">
      <iframe 
          width="700" 
          height="350" 
          src="https://www.youtube.com/embed/BRmey_OppTQ?si=Ku6oFPgVtfOrVBS4"  
          title="YouTube video player" 
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          referrerpolicy="strict-origin-when-cross-origin" 
          allowfullscreen>
      </iframe>
      </div>
  </div>
  <div class="espacoBtn3">
      <div class="btnFase3">
        <button>Concluir Fase 3</button>
      </div>
  </div>


  <div class="fase4">
    <div class="nomeFase">
      <a><a class="faseG">Fase 4: </a>Começar pequenos investimentos</a>
    </div>
    <div class="textoFase">
    <a>A Importância de Pagar Dívidas antes de Investir:</a>
  <a>Sim, é possível! Porém, é importante entender que o pagamento das dívidas não pode ocorrer ao mesmo tempo que os investimentos. As dívidas, especialmente aquelas com juros altos, trazem mais malefícios, enquanto os investimentos, por outro lado, geram lucros e benefícios a longo prazo. Por isso, é fundamental seguir um planejamento financeiro que priorize a quitação das dívidas antes de começar a investir.</a>
  <a>Exceções à Regra:</a>
  <a>Se o valor das dívidas for baixo e estiver dentro do controle orçamentário, pode ser interessante começar a investir mais cedo. Isso ajuda a manter a motivação e traz uma sensação de progresso, sem deixar de lado a responsabilidade de quitar as dívidas.</a>
  <a>Seguindo esse planejamento, você consegue equilibrar sua saúde financeira e ainda começar a alcançar seus objetivos a longo prazo.</a>
    </div>
  </div>
  <div class="espacoVideo4">
      <div class="video">
      <iframe 
          width="700" 
          height="350" 
          src="https://www.youtube.com/embed/RY6vyFGR0Co?si=N6wlmuWKoKuw4Ubh" 
          title="YouTube video player" 
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          referrerpolicy="strict-origin-when-cross-origin" 
          allowfullscreen>
      </iframe>
      </div>
  </div>
  <div class="espacoBtn4">
      <div class="btnFase4">
        <button>Concluir Fase 4</button>
      </div>
  </div>


  <div class="fase5">
    <div class="nomeFase">
      <a><a class="faseG">Fase 5: </a>Como vou guardar dinheiro?</a>
    </div>
    <div class="textoFase">
    <a>A Importância de Guardar Dinheiro:</a>
  <a>Guardar o seu dinheiro é fundamental para garantir segurança financeira e alcançar os seus objetivos a longo prazo. Além de ser uma proteção em situações imprevistas, a prática de poupar permite investir em sonhos e conquistar metas que antes pareciam distantes.</a>
  <a>Organização e Disciplina:</a>
  <a>Para que essa tarefa se torne mais eficaz, você precisará de disciplina e equilíbrio entre os seus gastos e desejos. Uma boa estratégia é usar ferramentas como a "Caixinha dos Sonhos" no app Save Your Money, que ajudará a organizar o processo de poupança e manter o foco nas suas metas.</a>
  <a>Com um bom planejamento, essa missão pode ser difícil, mas com certeza não é impossível. Abaixo, você encontra um vídeo que exemplifica e dá dicas práticas para te ajudar a alcançar esse objetivo e começar a poupar para o futuro.</a>
    </div>
  </div>
  <div class="espacoVideo5">
      <div class="video">
      <iframe 
        width="700" 
        height="350" 
        src="https://www.youtube.com/embed/m_-hO9vzB3I?si=NP9uu85NFY6QdEEu" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        referrerpolicy="strict-origin-when-cross-origin" 
        allowfullscreen>
      </iframe>
      </div>
  </div>
  <div class="espacoBtn5">
      <div class="btnFase5">
        <a href="../PAGES/dashboard.php"><button>Concluir Fase 5</button></a>
      </div>
  </div>
<script>
  document.querySelector('.btnFase1 button').addEventListener('click', function() {
  // Seleciona todas as divs que devem perder o blur
  const divsParaDesbloquear = document.querySelectorAll('.fase2, .espacoVideo2, .espacoBtn2');
  
  // Adiciona a classe 'desbloqueada' para cada uma
  divsParaDesbloquear.forEach(div => {
    div.classList.add('desbloqueada');
  });
});
document.querySelector('.btnFase2 button').addEventListener('click', function() {
  // Seleciona todas as divs que devem perder o blur
  const divsParaDesbloquear = document.querySelectorAll('.fase3, .espacoVideo3, .espacoBtn3');
  
  // Adiciona a classe 'desbloqueada' para cada uma
  divsParaDesbloquear.forEach(div => {
    div.classList.add('desbloqueada');
  });
});
document.querySelector('.btnFase3 button').addEventListener('click', function() {
  // Seleciona todas as divs que devem perder o blur
  const divsParaDesbloquear = document.querySelectorAll('.fase4, .espacoVideo4, .espacoBtn4');
  
  // Adiciona a classe 'desbloqueada' para cada uma
  divsParaDesbloquear.forEach(div => {
    div.classList.add('desbloqueada');
  });
});
document.querySelector('.btnFase4 button').addEventListener('click', function() {
  // Seleciona todas as divs que devem perder o blur
  const divsParaDesbloquear = document.querySelectorAll('.fase5, .espacoVideo5, .espacoBtn5');
  
  // Adiciona a classe 'desbloqueada' para cada uma
  divsParaDesbloquear.forEach(div => {
    div.classList.add('desbloqueada');
  });
});
</script>









</body>
<?php
    include("../partials/footer.php");
?>
</html>