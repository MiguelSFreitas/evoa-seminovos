<?php 
  include 'includes/header.php'; 
  include 'includes/navbar.php'; 
  include 'data/cars.php';

  // Obter o ID do veículo pela URL
  $vehicle_id = $_GET['id'] ?? null;

  // Verificar se o veículo existe
  if (!$vehicle_id || !isset($vehicles[$vehicle_id])) {
      header("Location: inventory.php");
      exit;
  }

  $car = $vehicles[$vehicle_id];
?>

<nav class="breadcrumb">
    <a href="index.php">Home</a> &gt; 
    <a href="inventory.php">Estoque</a> &gt; 
    <span><?php echo $car['name']; ?></span>
</nav>

<main class="vehicle-details-container">

    <div class="vehicle-hero-grid">
        
        <section class="vehicle-gallery">
            <div class="main-image">
                <img id="current-image" src="<?php echo $car['image']; ?>" alt="<?php echo $car['name']; ?>">
            </div>
            
            <div class="thumbnail-list">
                <img src="/img/volvo" alt="">
                <?php if (!empty($car['gallery'])): ?>
                    <?php foreach ($car['gallery'] as $img): ?>
                        <img src="<?php echo $img; ?>" class="thumb" onclick="changeImage(this.src)">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="vehicle-main-info">
            <h1><?php echo $car['name']; ?></h1>
            <div class="rating">★★★★☆</div>
            <p class="price">R$ <?php echo number_format($car['price'], 2, ',', '.'); ?></p>

            <hr>

            <div class="quick-specs">
                <div class="spec-item"><strong>Ano:</strong> <?php echo $car['year']; ?></div>
                <div class="spec-item"><strong>Quilometragem:</strong> <?php echo number_format($car['km'], 0, ',', '.'); ?> km</div>
                <div class="spec-item"><strong>Combustível:</strong> <?php echo $car['fuel']; ?></div>
                <div class="spec-item"><strong>Transmissão:</strong> <?php echo $car['transmission']; ?></div>
                <div class="spec-item"><strong>Motor:</strong> <?php echo $car['engine']; ?></div>
                <div class="spec-item"><strong>Potência:</strong> <?php echo $car['power']; ?></div>
            </div>

            <div class="action-buttons">
                <a href="#financing" class="btn btn-secondary">Simular Financiamento</a>
                <a href="contact.php?car=<?php echo urlencode($car['name']); ?>" class="btn btn-primary">Entrar em Contato</a>
            </div>
        </section>

    </div>

    <section class="vehicle-highlights">
        <h2>Destaques do Veículo</h2>
        <div class="highlights-grid">
            <?php foreach ($car['highlights'] as $highlight): ?>
                <div class="highlight-card">
                    <span>✓</span> <?php echo $highlight; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="technical-specs">
        <h2>Especificações Técnicas</h2>
        <table class="specs-table">
            <tbody>
                <tr><td><strong>Marca</strong></td><td><?php echo $car['brand']; ?></td></tr>
                <tr><td><strong>Modelo</strong></td><td><?php echo $car['model']; ?></td></tr>
                <tr><td><strong>Ano</strong></td><td><?php echo $car['year']; ?></td></tr>
                <tr><td><strong>Cor</strong></td><td><?php echo $car['color']; ?></td></tr>
                <tr><td><strong>Portas</strong></td><td><?php echo $car['doors']; ?></td></tr>
                <tr><td><strong>Motor</strong></td><td><?php echo $car['engine']; ?></td></tr>
                <tr><td><strong>Tração</strong></td><td><?php echo $car['traction']; ?></td></tr>
                <tr><td><strong>Potência</strong></td><td><?php echo $car['power']; ?></td></tr>
                <tr><td><strong>Combustível</strong></td><td><?php echo $car['fuel']; ?></td></tr>
                <tr><td><strong>Câmbio</strong></td><td><?php echo $car['transmission']; ?></td></tr>
                <tr><td><strong>Quilometragem</strong></td><td><?php echo number_format($car['km'], 0, ',', '.'); ?> km</td></tr>
            </tbody>
        </table>
    </section>

    <section id="financing" class="financing-simulator">
        <h2>Simulação de Financiamento</h2>
        <form action="#" method="POST" onsubmit="return false;">
            <div class="form-group">
                <label for="down_payment">Valor de Entrada (R$)</label>
                <input type="number" id="down_payment" name="down_payment" placeholder="Ex: 80000" value="80000">
            </div>

            <div class="form-group">
                <label for="installments">Número de Parcelas</label>
                <select id="installments" name="installments">
                    <option value="12">12x</option>
                    <option value="24">24x</option>
                    <option value="36">36x</option>
                    <option value="48" selected>48x</option>
                    <option value="60">60x</option>
                </select>
            </div>

            <button type="button" class="btn-calc">Calcular</button>
        </form>

        <div class="simulation-result">
            <p>Parcela aproximada: <strong>R$ 5.980,00 / mês</strong></p>
            <small>*Valor ilustrativo. Sujeito à aprovação de crédito.</small>
        </div>
    </section>

    <section class="similar-vehicles">
        <h2>Veículos Semelhantes</h2>
        <div class="cards-grid">
            <?php 
                // Renderiza outros carros do array excluindo o atual
                $count = 0;
                foreach ($vehicles as $sim_id => $similar): 
                    if ($sim_id != $car['id'] && $count < 3): 
                        $count++;
            ?>
                <article class="card-vehicle">
                    <img src="<?php echo $similar['image']; ?>" alt="<?php echo $similar['name']; ?>">
                    <h3><?php echo $similar['name']; ?></h3>
                    <p class="details"><?php echo $similar['year']; ?> • <?php echo number_format($similar['km'], 0, ',', '.'); ?> km</p>
                    <p class="price">R$ <?php echo number_format($similar['price'], 2, ',', '.'); ?></p>
                    <a href="vehicle.php?id=<?php echo $similar['id']; ?>" class="btn-details">Ver detalhes</a>
                </article>
            <?php 
                    endif;
                endforeach; 
            ?>
        </div>
    </section>

</main>

<section class="cta-banner">
    <h2>Gostou deste veículo?</h2>
    <p>Agende uma visita ou solicite mais informações com nossa equipe.</p>
    <a href="contact.php?car=<?php echo urlencode($car['name']); ?>" class="btn-cta">Falar com um Consultor</a>
</section>

<script>
    function changeImage(src) {
        document.getElementById('current-image').src = src;
    }
</script>

<?php 
  include 'includes/footer.php'; 
?>