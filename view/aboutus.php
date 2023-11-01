<?php
session_start();
include("components/navbar.php");

if (!isset($_SESSION['email'])) {
  header("Location: ../public/index.php");
  exit();
}
$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre nós</title>
  <link rel="stylesheet" href="../public/css/stylesin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>

<body class="bg-custom">
  <!-- Dentro do corpo do seu arquivo HTML -->
  <div class="background-square-gradient">
    <p>Sobre a Easy Donation</p>
    <p>
      Bem-vindo ao Easy Donation!
      Somos apaixonados por fazer a diferença no mundo e acreditamos que cada um de nós tem o poder de impactar vidas de
      maneira positiva. É por isso que criamos esta plataforma, um espaço dedicado a promover o bem e a solidariedade em
      nossa comunidade e em todo o mundo.
      Nossa missão é conectar pessoas que desejam ajudar com organizações não governamentais (ONGs) dedicadas a diversas
      causas sociais. Acreditamos que todos têm a capacidade de causar um impacto significativo, independentemente do
      tamanho da contribuição. Com a ajuda de nossa plataforma,
      tornamos mais fácil do que nunca fazer a diferença nas vidas daqueles que precisam.
      O Easy Donation é o lugar onde a compaixão encontra a ação. Nossa equipe está empenhada em fornecer uma plataforma
      confiável e acessível, onde doadores e ONGs possam se conectar de maneira transparente e eficaz. Quer você esteja
      procurando uma maneira de apoiar causas que lhe tocam
      profundamente ou esteja com uma ONG incrível em busca de apoio, estamos aqui para ajudar a tornar isso possível.
      Nós acreditamos na transparência, na responsabilidade e na prestação de contas. Trabalhamos incansavelmente para
      garantir que cada doação feita através do Easy Donation seja direcionada de maneira eficaz e chegue às mãos
      certas. Cada ONG que apresentamos aqui é cuidadosamente selecionada
      e avaliada para garantir que atendam aos mais altos padrões de ética e eficácia.
      Nossa jornada é alimentada pelo desejo de criar um mundo melhor, e isso só é possível graças ao apoio e à
      generosidade de pessoas como você. Juntos, estamos construindo uma comunidade de corações altruístas, prontos para
      enfrentar os desafios sociais e fazer a diferença.
      Junte-se a nós nesta jornada de compaixão, solidariedade e mudança positiva. Explore as diversas ONGs e causas
      sociais que apoiamos, faça uma doação, compartilhe sua história ou ofereça seu tempo como voluntário. Cada pequena
      ação pode criar um impacto transformador.
      Obrigado por fazer parte do Easy Donation e por ser parte da mudança que queremos ver no mundo. Juntos, somos
      fortes, juntos fazemos a diferença.
      Se você tiver alguma dúvida, sugestão ou desejar saber mais sobre como você pode se envolver, não hesite em entrar
      em contato conosco. Estamos aqui para ajudar e inspirar.
      Juntos, podemos construir um futuro mais brilhante e compassivo para todos.
    </p>
  </div>

  <!-- Segundo quadrado à direita -->
  <div class="background-square-gradient-right">
    <div class="background-image-container">
      <div class="content-container">
        <p>
          <img src="../public/img/logonobg.png" alt="Imagem de fundo"
            style="width: 45px; height: auto; float: left; margin-right: 10px;">
          É muito simples fazer uma doação pelo nosso site. Estamos comprometidos em tornar o processo o mais
          conveniente e acessível
          possível para você. Aqui estão os passos fáceis de seguir:
        </p>


        <p>1. Escolha sua ONG: Navegue pelo nosso site e explore as diversas organizações não governamentais (ONGs) e
          causas sociais que apoiamos. Encontre a que mais ressoa com você e com a causa que deseja apoiar.</p>
        <p>2. Selecione o valor da doação: Após escolher a ONG, você terá a opção de selecionar o valor que deseja doar.
          Nossa plataforma é flexível, permitindo que você escolha a quantia que mais se adequa ao seu orçamento e ao
          seu desejo de contribuir.</p>
        <p>3. Escolha o método de pagamento: Oferecemos três métodos de pagamento convenientes para atender às suas
          preferências:
        <p>• Cartão de Crédito: Você pode optar por fazer sua doação usando seu cartão de crédito. Basta inserir as
          informações do cartão, como número, data de validade e código de segurança. Nossos sistemas garantem segurança
          e proteção de dados.</p>
        <p>• Boleto Bancário: Se preferir pagar por boleto, basta selecionar essa opção. Você receberá um boleto gerado
          automaticamente com todos os detalhes necessários para o pagamento. É uma ótima opção para quem não possui um
          cartão de crédito.</p>
        <p>• PIX: Para uma doação ainda mais rápida e conveniente, oferecemos a opção de pagamento via PIX. Basta
          escanear o código QR ou inserir as informações necessárias, e a transação será concluída em segundos.</p>
        <p>4. Confirme e faça a doação: Depois de selecionar o método de pagamento e revisar os detalhes da sua doação,
          basta clicar no botão "Doar". Sua contribuição será processada imediatamente e direcionada para a ONG
          escolhida.</p>
        <p>5. Receba um comprovante: Após a conclusão da doação, você receberá um comprovante por e-mail, confirmando
          sua contribuição. Esse comprovante serve como registro do seu gesto generoso e também pode ser usado para fins
          fiscais, se aplicável.</p>
        <p>Estamos comprometidos em garantir que o processo de doação seja fácil, seguro e transparente. Se você tiver
          alguma dúvida ou precisar de assistência durante o processo de doação, nossa equipe de suporte estará à
          disposição para ajudar. </p>
        </p>
      </div>
      

</body>

</html>