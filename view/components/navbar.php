<link rel="icon" href="../public/img/logonobg.png" type="image/x-icon">
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../public/index.php"><img src="../public/img/logonobg.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../public/index.php">
            Inicio
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../view/aboutus.php">
            Sobre nós
          </a>
        </li>
        <li class="nav-item">
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          </form>
        </li>
        <?php if (isset($_SESSION['email'])): ?>
          <input type="checkbox" role="button" ar ia-label="Display the menu" class="menu" id="menuToggle">
          <div class="opcs">
            <button id="opc1" class="opc" style="font-size: 18px;">Perfil<br><small style="font-size: 0.6em;"><?php echo $_SESSION['nome']; ?></small></button>
            <button id="opc2" class="opc">Configurações</button>
            <button id="opc3" class="opc">Contato</button>
            <button id="opc4" class="opc">Sair</button>
          </div>
        <?php else: ?>
          <input type="checkbox" role="button" aria-label="Display the menu" class="menu" id="menuToggle">
          <div class="opcs">
            <button id="opc1" class="opc">Perfil</button>
            <button id="opc2" class="opc">Configurações</button>
            <button id="opc3" class="opc">Contato</button>
            <button id="opc4" class="opc">Entrar</button>
          </div>
        <?php endif; ?>



      </ul>
    </div>
  </nav>
</header>
<script>
  const menuToggle = document.getElementById("menuToggle");
  const optionButtons = document.querySelectorAll(".opcs button");

  // Função para mostrar/ocultar as opções com base no estado do checkbox
  function toggleOptions() {
    const opc = document.querySelector(".opcs");
    opc.style.display = menuToggle.checked ? "block" : "none";
  }

  // Função para lidar com os redirecionamentos
  function redirectToPage(page) {
    // Redirecionar o usuário para a página desejada
    switch (page) {
      case "opc1":
        window.location.href = "../view/perfil.php";
        break;
      case "opc2":
        window.location.href = "pagina2.html";
        break;
      case "opc3":
        window.location.href = "pagina3.html";
        break;
      case "opc4":
        window.location.href = "../view/cduser.php";
        break;
      default:
        break;
    }
  }

  // Adicionar eventos aos botões de opção
  optionButtons.forEach(button => {
    button.addEventListener("click", function () {
      const page = this.id;
      redirectToPage(page);
    });
  });

  // Adicionar evento ao checkbox para mostrar/ocultar as opções
  menuToggle.addEventListener("change", toggleOptions);

  document.addEventListener("DOMContentLoaded", function () {
    const navbarPlaceholder = document.getElementById("navbar-placeholder");
    navbarPlaceholder.innerHTML = `
        <!-- Aqui vai o código HTML da sua Navbar -->
    `;
  });

</script>