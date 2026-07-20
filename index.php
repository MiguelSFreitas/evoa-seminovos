<?php 
  include 'includes/header.php'; 
  include 'includes/navbar.php'; 
?>

<link rel="stylesheet" href="style.css">

<section class="hero">
    <div class="hero-content">
        <h1>Encontre seu próximo seminovo.</h1>
        <p>Veículos revisados, com garantia e procedência.</p>
        <a href="inventory.php" class="btn">Ver Estoque</a>
    </div>
</section>

<section class="quick-search">
    <form action="inventory.php" method="GET">
        <div class="form-group">
            <label for="brand">Marca</label>
            <select name="brand" id="brand">
                <option value="">Todas as marcas</option>
                <option value="volvo">Volvo</option>
                <option value="bmw">BMW</option>
                <option value="jetour">Jetour</option>
                <option value="byd">BYD</option>
            </select>
        </div>

        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" id="model" name="model" placeholder="Ex: XC60, Dolphin...">
        </div>

        <div class="form-group">
            <label for="price">Faixa de Preço</label>
            <select name="price" id="price">
                <option value="">Qualquer valor</option>
                <option value="0-50000">Até R$ 50.000</option>
                <option value="50000-100000">R$ 50.000 - R$ 100.000</option>
                <option value="100000+">Acima de R$ 100.000</option>
            </select>
        </div>

        <button type="submit">Buscar</button>
    </form>
</section>

<section class="featured-vehicles">
    <h2>Veículos em Destaque</h2>
    
    <div class="cards-grid">
        <article class="card-vehicle">
            <img src="assets/img/volvo-xc60.jpg" alt="Volvo XC60">
            <h3>Volvo XC60</h3>
            <p class="details">Ano: 2022 | 35.000 km</p>
            <p class="price">R$ 240.000</p>
            <a href="vehicle-details.php?id=1" class="btn-details">Ver detalhes</a>
        </article>

        <article class="card-vehicle">
            <img src="assets/img/bmw-x1.jpg" alt="BMW X1">
            <h3>BMW X1</h3>
            <p class="details">Ano: 2021 | 42.000 km</p>
            <p class="price">R$ 195.000</p>
            <a href="vehicle-details.php?id=2" class="btn-details">Ver detalhes</a>
        </article>

        <article class="card-vehicle">
            <img src="assets/img/jetour-t2.jpg" alt="Jetour T2">
            <h3>Jetour T2</h3>
            <p class="details">Ano: 2024 | 5.000 km</p>
            <p class="price">R$ 210.000</p>
            <a href="vehicle-details.php?id=3" class="btn-details">Ver detalhes</a>
        </article>

        <article class="card-vehicle">
            <img src="assets/img/byd-dolphin.jpg" alt="BYD Dolphin">
            <h3>BYD Dolphin</h3>
            <p class="details">Ano: 2023 | 12.000 km</p>
            <p class="price">R$ 125.000</p>
            <a href="vehicle-details.php?id=4" class="btn-details">Ver detalhes</a>
        </article>
    </div>
</section>

<section class="why-choose-us">
    <h2>Por que escolher a EVOA?</h2>
    <div class="benefits-grid">
        <div class="benefit-card">
            <h3>✓ Procedência</h3>
            <p>Histórico veicular 100% verificado e documentação em dia.</p>
        </div>
        <div class="benefit-card">
            <h3>✓ Garantia</h3>
            <p>Tranquilidade garantida para o seu seminovo rodar sem preocupações.</p>
        </div>
        <div class="benefit-card">
            <h3>✓ Financiamento</h3>
            <p>As melhores taxas e condições facilitadas no mercado.</p>
        </div>
        <div class="benefit-card">
            <h3>✓ Atendimento</h3>
            <p>Consultoria personalizada do início ao pós-venda.</p>
        </div>
    </div>
</section>

<section class="services">
    <h2>Nossos Serviços</h2>
    <ul>
        <li>Compra</li>
        <li>Venda</li>
        <li>Financiamento</li>
        <li>Avaliação</li>
        <li>Troca</li>
    </ul>
</section>

<section class="statistics">
    <div class="stat-item">
        <h3>+150</h3>
        <p>Veículos vendidos</p>
    </div>
    <div class="stat-item">
        <h3>★★★★★</h3>
        <p>Clientes satisfeitos</p>
    </div>
    <div class="stat-item">
        <h3>10 anos</h3>
        <p>Experiência</p>
    </div>
    <div class="stat-item">
        <h3>100%</h3>
        <p>Veículos revisados</p>
    </div>
</section>

<section class="reviews">
    <h2>O que nossos clientes dizem</h2>
    <div class="review-card">
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <blockquote>"Excelente atendimento! Comprei meu carro com total transparência e facilidade no financiamento."</blockquote>
        <p class="author">- Cliente EVOA</p>
    </div>
</section>

<section class="cta-banner">
    <h2>Pronto para encontrar seu próximo carro?</h2>
    <a href="inventory.php" class="btn-cta">Ver Estoque</a>
</section>

<?php 
  include 'includes/footer.php'; 
?>