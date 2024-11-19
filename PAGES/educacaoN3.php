<?php
 @session_start();
 if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>
<link rel="stylesheet" href="../STYLE/educacao.css">
<?php
    include("../partials/headeralternative.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
      <a>É bom te ver aqui <?php echo "$_SESSION[nome]"; ?>, você escolheu o Plano 3, por isso segue aqui as fases para alcançarmos os objetivos propostos em nosso cronograma de acordo com sua situação.</a>
    </div>
      
  </div>
  <div class="fase1">
    <div class="nomeFase">
      <a><a class="faseG">Fase 1: </a>Aprender sobre finanças</a>
    </div>
    <div class="textoFase">
      <a>A Importância de Aprender sobre Finanças:</a>
      <a>A educação financeira é fundamental para tomar decisões mais seguras sobre o dinheiro. 
        Compreender como poupar, investir e planejar para o futuro ajuda a evitar dívidas, melhorar a qualidade de vida, 
        proporcionar segurança em situações imprevistas e alcançar independência financeira. Isso permite realizar sonhos e construir um patrimônio sólido.</a>
        <a>Como Começar a Aprender sobre Finanças:</a>
        <a>1) Entenda sua situação financeira: Crie um orçamento, liste dívidas e avalie seus bens.</a>
        <a>2) Estabeleça objetivos: Defina metas claras, como comprar uma casa ou formar uma reserva de emergência.</a>
        <a>3) Pratique hábitos saudáveis: Poupe regularmente, gaste com consciência e invista em aprendizado.</a>
        <a>4) Busque ajuda profissional: Planejadores financeiros podem oferecer orientação personalizada.</a>
    </div>
  </div>
  <div class="espacoVideo1">
      <div class="video">
      <iframe 
          width="700" 
          height="350" 
          src="https://www.youtube.com/embed/Ep65y-eQxgE?si=6ibY7OP9I777Yufy" 
          title="YouTube video player" 
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          referrerpolicy="strict-origin-when-cross-origin" 
          allowfullscreen>
      </iframe>
      </div>
  </div>
  <div class="espacoBtn1">
      <div class="btnFase1">
        <button>Concluir Fase 1</button>
      </div>
  </div>


  <div class="fase2">
    <div class="nomeFase">
      <a><a class="faseG">Fase 2: </a>Investir meu dinheiro</a>
    </div>
    <div class="textoFase">
      <a>Investir é essencial para alcançar objetivos financeiros de curto, médio e longo prazo. Para começar:</a>
      <a>1   Estabeleça objetivos:</a>
      <a>Curto prazo: Emergências, viagens.</a>
      <a>Médio prazo: Compra de imóvel, reformas.</a>
      <a>Longo prazo: Aposentadoria, legado financeiro.</a>
      <a>2  Organize suas finanças:</a>
      <a>Controle gastos e ajuste hábitos para poupar.</a>
      <a>Crie uma reserva de emergência.</a>
      <a>3  Conheça seu perfil de investidor:</a>
      <a>Conservador: Prioriza segurança com menor risco.</a>
      <a>Moderado: Equilibra risco e retorno.</a>
      <a>Agressivo: Busca alta rentabilidade assumindo mais riscos.</a>
      <a> 4 Escolha investimentos:</a>
      <a>Renda fixa: CDBs, títulos públicos (menor risco).</a>
      <a> Renda variável: Ações, fundos (maior risco e retorno).</a>
      <a>Outros: Imóveis, ouro, criptomoedas.</a>
      <a> 5 Diversifique sua carteira: Invista em diferentes ativos para reduzir riscos.</a>
      <a>6 Invista regularmente: Comece com valores pequenos e mantenha consistência.</a>
      <a>7 Aprimore seus conhecimentos: Leia, assista a vídeos e consulte um planejador financeiro para orientação personalizada.</a>
    </div>
  </div>
  <div class="espacoVideo2">
      <div class="video">
      <iframe 
          width="700" 
          height="350" 
          src="https://www.youtube.com/embed/1I04mhydo4s?si=_3pX09DTOaAY_cij" 
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
      <a><a class="faseG">Fase 3: </a>Ter uma reserva de emergência</a>
    </div>
    <div class="textoFase">
      <a>A Importância de Ter uma Reserva de Emergência no Mundo dos Investimentos:</a>
      <a>Uma reserva de emergência é um dos pilares da saúde financeira e desempenha um papel crucial no mundo dos investimentos.
         Ela consiste em um valor destinado exclusivamente para cobrir imprevistos, como despesas médicas,
         manutenção inesperada de bens ou perda de renda. Apesar de não ser propriamente um investimento, essa reserva é a base que sustenta sua estratégia financeira.</a>
      <a>Por que é importante ter uma reserva de emergência?</a>
      <a>1 Proteção contra imprevistos: A vida é imprevisível, e contar com um fundo de 
        emergência evita que você precise recorrer a empréstimos, cartões de crédito ou
         até mesmo vender seus investimentos em momentos desfavoráveis.</a>
      <a>2 Segurança emocional: Saber que há um recurso disponível para emergências traz tranquilidade, 
        permitindo que você mantenha o foco em seus objetivos financeiros de longo prazo.</a>
      <a>3 Preservação dos investimentos: Sem uma reserva, você pode ser forçado a resgatar investimentos antecipadamente,
         o que pode gerar perdas, como a venda de ativos a preços baixos ou o pagamento de taxas de resgate.</a>
      <a>Como construir e gerenciar uma reserva de emergência?</a>
      <a>1 Defina o valor ideal: Recomenda-se acumular entre 3 e 6 meses de despesas mensais essenciais. 
        Para profissionais autônomos ou com renda instável, pode ser prudente guardar até 12 meses.</a>
      <a>2 Escolha aplicações seguras e líquidas: A reserva deve estar em investimentos de baixo risco e com liquidez imediata, 
        como poupança, CDBs com liquidez diária ou fundos de renda fixa.</a>
      <a>3 Contribua regularmente: Separe uma parte da sua renda mensalmente até alcançar o valor desejado.</a>
    </div>
  </div>
  <div class="espacoVideo3">
      <div class="video">
      <iframe 
          width="700" 
          height="350" 
          src="https://www.youtube.com/embed/bFLp81P4C-U?si=7M2ADU7ZHMn1SzGw" 
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
      <a><a class="faseG">Fase 4: </a>Corrigir meus gastos</a>
    </div>
    <div class="textoFase">
      <a>Corrigir os gastos é essencial para manter a saúde financeira em dia e, consequentemente, alcançar objetivos como poupar, investir e construir uma reserva de emergência.</a>
      <a>Alguns passos para te ajudar</a>
      <a>1. Analise sua situação financeira atual</a>
      <a> Registre todas as despesas: Use um aplicativo, planilha ou caderno para anotar absolutamente tudo o que gasta, incluindo pequenos valores.
      Classifique as despesas: Divida os gastos em categorias, como alimentação, transporte, lazer, contas fixas e dívidas.</a>
      <a>2. dentifique desperdícios</a>
      <a>Corte gastos desnecessários: Avalie itens supérfluos ou excessos, como assinaturas que você quase não utiliza, compras por impulso e serviços que podem ser renegociados.</a>
      <a>Atenção a "gastos invisíveis": Taxas bancárias, juros de dívidas e compras parceladas podem comprometer seu orçamento sem que você perceba.</a>
      <a>3. Priorize as necessidades</a>
      <a>Distinga necessidades de desejos: Dê prioridade a despesas essenciais, como moradia, alimentação e saúde, antes de gastar em itens de lazer ou compras não urgentes.</a>
      <a>Estabeleça limites para gastos variáveis: Defina quanto pode gastar em lazer, roupas ou outras categorias variáveis e respeite esses limites.</a>
      <a>4. Crie e siga um orçamento</a>
      <a>Adote a regra 50-30-20:</a>
      <a>50% para necessidades (aluguel, contas fixas, alimentação).</a>
      <a>30% para desejos (lazer, hobbies, viagens).</a>
      <a>20% para poupança e investimentos.</a>
      <a>Revise mensalmente: Ajuste seu orçamento conforme necessário para corrigir desvios e otimizar sua gestão.</a>
      <a> 5. Troque hábitos por alternativas mais econômicas</a>
      <a>Planeje suas compras: Faça uma lista antes de ir ao mercado para evitar gastos desnecessários.</a>
      <a>Use transporte público ou compartilhe viagens: Reduzir o uso do carro pode trazer economia significativa.</a>
      <a>Cozinhe mais em casa: Comer fora frequentemente é um dos maiores vilões financeiros.</a>
      <a>6. Elimine ou renegocie dívidas</a>
      <a>Priorize pagar dívidas caras: Como juros de cartão de crédito ou cheque especial.</a>
      <a>Renegocie condições: Converse com credores para buscar melhores prazos ou taxas menores.</a>
    </div>
  </div>
  <div class="espacoVideo4">
      <div class="video">
      <iframe 
          width="700" 
          height="350" 
          src="https://www.youtube.com/embed/Pr2lUEgqd3M"
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
      <a><a class="faseG">Fase 5: </a>Melhorar minha vida financeira</a>
    </div>
    <div class="textoFase">
      <a>1. Avalie sua Situação Atual</a>
      <a> Registre sua renda e despesas: Anote tudo, desde a sua renda fixa até os menores gastos diários, para entender onde seu dinheiro está indo.</a>
      <a>Identifique problemas: Verifique se você está gastando mais do que ganha, acumulando dívidas ou tendo dificuldades para poupar.</a>
      <a>2. Estabeleça Metas Financeiras</a>
      <a>Curto prazo: Quitação de dívidas, criação de uma reserva de emergência.</a>
      <a>Médio prazo: Compra de bens, como um carro ou curso de especialização.</a>
      <a>Longo prazo: Aposentadoria confortável, compra de imóveis ou independência financeira.</a>
      <a>Defina objetivos específicos, mensuráveis e com prazos.</a>
      <a>3. Crie um Orçamento</a>
      <a>Adote uma regra simples, como 50-30-20:</a>
      <a>50% para necessidades (moradia, alimentação, transporte).</a>
      <a>30% para desejos (lazer, viagens).</a>
      <a> 20% para poupança e investimentos.</a>
      <a>Reveja mensalmente: Ajuste conforme necessário para manter o controle.</a>
      <a>4. Reduza e Controle os Gastos</a>
      <a>Elimine despesas supérfluas: Avalie assinaturas e serviços pouco usados.</a>
      <a> Evite o consumismo: Planeje compras e priorize itens essenciais.</a>
      <a>Renegocie dívidas: Busque condições melhores com credores para reduzir juros e prazos.</a>
      <a>5. Construa uma Reserva de Emergência</a>
      <a>Acumule o equivalente a 3 a 6 meses de despesas essenciais.</a>
      <a>Invista essa reserva em opções de baixo risco e alta liquidez, como CDBs ou Tesouro Selic.</a>
      <a>6. Aumente sua Renda</a>
      <a>Busque renda extra: Considere trabalhos freelancers, vendas online ou aluguel de bens.</a>
      <a>Invista em sua carreira: Faça cursos de qualificação, aprenda novas habilidades ou procure promoções no trabalho.</a>
    </div>
  </div>
  <div class="espacoVideo5">
      <div class="video">
      <iframe 
        width="700" 
        height="350" 
        src="https://www.youtube.com/embed/0q-MAxta-d0"
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