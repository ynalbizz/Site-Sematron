<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Cadastro - Sematron</title>

<style>
/* RESET */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* BODY */
body {
  background-color: #000;
  color: #fff;
  font-family: 'BankGothic Lt BT', Inter, sans-serif;
}

/* HEADER */
.header {
  border-top: 4px solid #fb9a03;
  height: 84px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 2rem;
}

.header-left {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.header-left img {
  width: 36px;
}

.sematron {
  font-family: 'BankGothic Md BT';
  font-size: 28px;
  color: #fb9a03;
}

.header-nav {
  display: flex;
  gap: 1.5rem;
  font-size: 15px;
}

.header-nav a {
  color: #fff;
  text-decoration: none;
  font-weight: 300;
}

/* MAIN */
.main {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 3rem;
  padding: 4rem 2rem;
  flex-wrap: wrap;
}

/* INFO */
.info {
  max-width: 560px;
  width: 100%;
  border-radius: 22px;
  padding: 3rem;
  background-color: #000;
  font-family: 'BankGothic Md BT';
}

.info h1 {
  font-size: 42px;
  color: #fb9a03;
}

.info p {
  margin-top: 1rem;
  font-size: 14px;
  font-family: Inter;
  color: #fff;
}

/* FORM */
.form-container {
  max-width: 460px;
  width: 100%;
  border-radius: 22px;
  border: 1px solid #fb9a03;
  padding: 2.5rem;
}

.form-container h2 {
  font-family: 'BankGothic Md BT';
  font-size: 24px;
  margin-bottom: 2rem;
}

.form-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 1rem;
}

.form-group label {
  font-size: 12px;
  margin-bottom: 0.3rem;
}

.form-group input {
  height: 44px;
  border-radius: 12px;
  border: 1px solid #fb9a03;
  background: transparent;
  color: #fff;
  padding: 0 1rem;
}

.form-group input:focus {
  outline: none;
  border-color: #ffb43a;
}

/* BUTTON */
button {
  margin-top: 1.5rem;
  height: 46px;
  width: 100%;
  border-radius: 14px;
  background-color: #fb9a03;
  color: #000;
  border: none;
  font-weight: 600;
  cursor: pointer;
}

/* FOOTER */
.footer {
  padding: 2rem;
  font-family: Inter;
  font-size: 11px;
}

.footer-content {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
}

.social {
  display: flex;
  gap: 1rem;
  margin-top: 1rem;
}

.social a {
  border: 1px solid #fb9a03;
  border-radius: 999px;
  padding: 0.4rem 1rem;
  color: #fb9a03;
  text-decoration: none;
}

/* RESPONSIVO */
@media (max-width: 768px) {
  .header-nav {
    display: none;
  }

  .info h1 {
    font-size: 32px;
  }

  .main {
    padding: 2rem 1rem;
  }
}
</style>
</head>

<body>

<header class="header">
  <div class="header-left">
    <img src="logo.png" alt="Logo">
    <span class="sematron">SEMETRON XXII</span>
  </div>

  <nav class="header-nav">
    <a href="#">Página inicial</a>
    <a href="#">Inscrições</a>
    <a href="#">Minicursos</a>
    <a href="#">Visitas</a>
    <a href="#">Login</a>
    <a href="#">Cadastro</a>
    <a href="#">Contato</a>
  </nav>
</header>

<main class="main">
  <section class="info">
    <h1>Cadastro</h1>
    <p>Faça o cadastro para participar do evento Sematron XXII.</p>
  </section>

  <section class="form-container">
    <h2>Cadastro</h2>

    <div class="form-group">
      <label>Nome</label>
      <input type="text">
    </div>

    <div class="form-group">
      <label>Usuário</label>
      <input type="text">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email">
    </div>

    <div class="form-group">
      <label>Senha</label>
      <input type="password">
    </div>

    <div class="form-group">
      <label>Confirmar senha</label>
      <input type="password">
    </div>

    <button>ENVIAR</button>
  </section>
</main>

<footer class="footer">
  <div class="footer-content">
    <div>
      <strong>Créditos</strong><br>
      © 2014–2025<br>
      Av. Trabalhador São Carlense<br>
      Tel: +55 61
    </div>

    <div class="social">
      <a href="#">Facebook</a>
      <a href="#">Instagram</a>
      <a href="#">YouTube</a>
      <a href="#">Site</a>
    </div>
  </div>
</footer>

</body>
</html>
