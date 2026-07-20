<?php 
  include 'includes/header.php'; 
  include 'includes/navbar.php'; 

  // Variáveis para armazenar mensagens e dados do formulário
  $errors = [];
  $success_message = "";

  // Recupera o nome do carro da URL, caso o usuário venha da página vehicle.php
  $selected_car = isset($_GET['car']) ? htmlspecialchars($_GET['car']) : '';

  // Processamento do formulário quando submetido via POST
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // 1. Sanitização dos dados (remover espaços e tags indesejadas)
      $name    = trim(strip_tags($_POST['name'] ?? ''));
      $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
      $phone   = trim(strip_tags($_POST['phone'] ?? ''));
      $subject = trim(strip_tags($_POST['subject'] ?? ''));
      $message = trim(strip_tags($_POST['message'] ?? ''));
      $privacy = isset($_POST['privacy']);

      // 2. Validações básicas
      if (empty($name)) {
          $errors[] = "Por favor, preencha o seu nome completo.";
      }

      if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors[] = "Por favor, informe um e-mail válido.";
      }

      if (empty($phone)) {
          $errors[] = "Por favor, informe seu telefone de contato.";
      }

      if (empty($subject)) {
          $errors[] = "Por favor, selecione um assunto.";
      }

      if (empty($message)) {
          $errors[] = "Por favor, digite sua mensagem.";
      }

      if (!$privacy) {
          $errors[] = "Você precisa aceitar a Política de Privacidade para enviar.";
      }

      // 3. Se não houver erros, simula o sucesso
      if (empty($errors)) {
          $success_message = "Mensagem enviada com sucesso! Nossa equipe entrará em contato em breve.";
          
          // Limpa os campos após o envio com sucesso
          $name = $email = $phone = $subject = $message = "";
          $selected_car = "";
      }
  }
?>

<section class="page-banner">
    <div class="banner-content">
        <h1>Entre em Contato</h1>
        <p>Estamos prontos para ajudar você a encontrar o veículo ideal.</p>
    </div>
</section>

<nav class="breadcrumb">
    <a href="index.php">Home</a> &gt; <span>Contato</span>
</nav>

<main class="contact-container">

    <?php if (!empty($success_message)): ?>
        <div class="alert alert-success">
            <p>✓ <?php echo $success_message; ?></p>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>⚠ <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <section class="contact-cards-grid">
        <div class="contact-card">
            <h3>📍 Endereço</h3>
            <p>Av. Exemplo, 1000<br>Vila Velha - ES</p>
        </div>
        <div class="contact-card">
            <h3>📞 Telefone</h3>
            <p>(27) 99999-9999</p>
        </div>
        <div class="contact-card">
            <h3>✉ Email</h3>
            <p>contato@evoa.com</p>
        </div>
        <div class="contact-card">
            <h3>💬 WhatsApp</h3>
            <p>(27) 99999-9999</p>
        </div>
    </section>

    <div class="contact-content-grid">

        <section class="contact-form-section">
            <h2>Envie uma mensagem</h2>
            
            <form action="contact.php" method="POST" novalidate>
                <div class="form-group">
                    <label for="name">Nome Completo *</label>
                    <input type="text" id="name" name="name" placeholder="Seu nome" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail *</label>
                    <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="phone">Telefone / WhatsApp *</label>
                    <input type="tel" id="phone" name="phone" placeholder="(27) 99999-9999" value="<?php echo htmlspecialchars($phone ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="subject">Assunto *</label>
                    <select id="subject" name="subject" required>
                        <option value="">Selecione um assunto</option>
                        <option value="Compra" <?php echo (isset($subject) && $subject == 'Compra') ? 'selected' : ''; ?>>Compra</option>
                        <option value="Venda" <?php echo (isset($subject) && $subject == 'Venda') ? 'selected' : ''; ?>>Venda</option>
                        <option value="Financiamento" <?php echo (isset($subject) && $subject == 'Financiamento') ? 'selected' : ''; ?>>Financiamento</option>
                        <option value="Troca" <?php echo (isset($subject) && $subject == 'Troca') ? 'selected' : ''; ?>>Troca</option>
                        <option value="Outros" <?php echo (isset($subject) && $subject == 'Outros') ? 'selected' : ''; ?>>Outros</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Mensagem *</label>
                    <textarea id="message" name="message" rows="5" placeholder="Como podemos ajudar?" required><?php 
                        if (!empty($selected_car) && empty($message)) {
                            echo "Olá, gostaria de mais informações sobre o veículo " . htmlspecialchars($selected_car) . ".";
                        } else {
                            echo htmlspecialchars($message ?? ''); 
                        }
                    ?></textarea>
                </div>

                <div class="form-group checkbox-group">
                    <label>
                        <input type="checkbox" name="privacy" value="1" <?php echo isset($privacy) && $privacy ? 'checked' : ''; ?>> 
                        Aceito a <a href="#" target="_blank">Política de Privacidade</a>
                    </label>
                </div>

                <button type="submit" class="btn-submit">Enviar Mensagem</button>
            </form>
        </section>

        <aside class="business-hours-section">
            <h2>Horário de Atendimento</h2>
            <ul class="hours-list">
                <li><span>Segunda-feira:</span> <strong>08:00 - 18:00</strong></li>
                <li><span>Terça-feira:</span> <strong>08:00 - 18:00</strong></li>
                <li><span>Quarta-feira:</span> <strong>08:00 - 18:00</strong></li>
                <li><span>Quinta-feira:</span> <strong>08:00 - 18:00</strong></li>
                <li><span>Sexta-feira:</span> <strong>08:00 - 18:00</strong></li>
                <li><span>Sábado:</span> <strong>08:00 - 13:00</strong></li>
                <li><span>Domingo:</span> <strong>Fechado</strong></li>
            </ul>
        </aside>

    </div>

    <section class="location-section">
        <h2>Onde Estamos</h2>
        <div class="map-placeholder">
            <p>📍 <strong>EVOA Seminovos</strong> - Av. Exemplo, 1000 - Vila Velha, ES</p>
            <div class="map-box">
                <p>[ Integração do Google Maps ]</p>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2>Perguntas Frequentes (FAQ)</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h3>Posso financiar um veículo?</h3>
                <p>Sim, trabalhamos com diversas instituições financeiras para oferecer as melhores taxas e opções de parcelamento.</p>
            </div>
            <div class="faq-item">
                <h3>Aceitam meu carro usado na troca?</h3>
                <p>Sim! Realizamos a avaliação do seu seminovo e utilizamos o valor como entrada ou parte do pagamento.</p>
            </div>
            <div class="faq-item">
                <h3>Os veículos possuem garantia?</h3>
                <p>Todos os veículos do nosso estoque possuem procedência garantida, laudo cautelar aprovado e garantia estendida.</p>
            </div>
            <div class="faq-item">
                <h3>Posso agendar um test-drive?</h3>
                <p>Com certeza! Entre em contato conosco pelo formulário ou WhatsApp e escolha o melhor dia e horário para a visita.</p>
            </div>
        </div>
    </section>

</main>

<section class="cta-banner">
    <h2>Ainda tem dúvidas?</h2>
    <p>Nossa equipe de consultores está pronta para te atender.</p>
    <div class="cta-buttons">
        <a href="inventory.php" class="btn-cta">Ver Estoque</a>
        <a href="https://wa.me/5527999999999" target="_blank" class="btn-cta btn-whatsapp">Conversar no WhatsApp</a>
    </div>
</section>

<?php 
  include 'includes/footer.php'; 
?>