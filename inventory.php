<?php 
  $page_title = "Estoque de Veículos";
  include 'includes/header.php'; 
  include 'includes/navbar.php'; 
  include 'data/cars.php';

  // 1. Captação dos Parâmetros de Busca e Filtro (via GET)
  $search       = isset($_GET['search']) ? trim($_GET['search']) : '';
  $brand_filter = isset($_GET['brand']) ? $_GET['brand'] : '';
  $fuel_filter  = isset($_GET['fuel']) ? $_GET['fuel'] : '';
  $trans_filter = isset($_GET['transmission']) ? $_GET['transmission'] : '';
  $max_price    = isset($_GET['max_price']) && !empty($_GET['max_price']) ? (float)$_GET['max_price'] : null;

  // 2. Lógica de Filtragem do Array $vehicles
  $filtered_vehicles = array_filter($vehicles, function($car) use ($search, $brand_filter, $fuel_filter, $trans_filter, $max_price) {
      
      // Filtro por termo de busca (Nome ou Marca)
      if (!empty($search)) {
          $term = mb_strtolower($search);
          $nameMatch  = strpos(mb_strtolower($car['name']), $term) !== false;
          $brandMatch = strpos(mb_strtolower($car['brand']), $term) !== false;
          if (!$nameMatch && !$brandMatch) return false;
      }

      // Filtro por Marca
      if (!empty($brand_filter) && strtolower($car['brand']) !== strtolower($brand_filter)) {
          return false;
      }

      // Filtro por Combustível
      if (!empty($fuel_filter) && strtolower($car['fuel']) !== strtolower($fuel_filter)) {
          return false;
      }

      // Filtro por Transmissão
      if (!empty($trans_filter) && strtolower($car['transmission']) !== strtolower($trans_filter)) {
          return false;
      }

      // Filtro por Preço Máximo
      if (!is_null($max_price) && $car['price'] > $max_price) {
          return false;
      }

      return true;
  });
?>

<section class="page-banner">
    <div class="banner-content">
        <h1>Nosso Estoque</h1>
        <p>Encontre o seminovo perfeito para você com garantia e procedência.</p>
    </div>
</section>

<nav class="breadcrumb">
    <a href="index.php">Home</a> &gt; <span>Estoque</span>
</nav>

<div class="search-bar-container">
    <form action="inventory.php" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Buscar por modelo ou marca (ex: Volvo, BMW...)" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

<main class="inventory-container">

    <aside class="filters-sidebar">
        <h3>Filtrar Veículos</h3>
        <form action="inventory.php" method="GET">
            
            <?php if (!empty($search)): ?>
                <input type="hidden" name="search" value="<?php echo htmlspecialchars($search); ?>">
            <?php endif; ?>

            <div class="filter-group">
                <h4>Marca</h4>
                <select name="brand" onchange="this.form.submit()">
                    <option value="">Todas as Marcas</option>
                    <option value="Volvo" <?php echo ($brand_filter == 'Volvo') ? 'selected' : ''; ?>>Volvo</option>
                    <option value="BMW" <?php echo ($brand_filter == 'BMW') ? 'selected' : ''; ?>>BMW</option>
                    <option value="Jetour" <?php echo ($brand_filter == 'Jetour') ? 'selected' : ''; ?>>Jetour</option>
                    <option value="BYD" <?php echo ($brand_filter == 'BYD') ? 'selected' : ''; ?>>BYD</option>
                    <option value="GWM" <?php echo ($brand_filter == 'GWM') ? 'selected' : ''; ?>>GWM</option>
                    <option value="Toyota" <?php echo ($brand_filter == 'Toyota') ? 'selected' : ''; ?>>Toyota</option>
                    <option value="Audi" <?php echo ($brand_filter == 'Audi') ? 'selected' : ''; ?>>Audi</option>
                    <option value="Jeep" <?php echo ($brand_filter == 'Jeep') ? 'selected' : ''; ?>>Jeep</option>
                </select>
            </div>

            <div class="filter-group">
                <h4>Combustível</h4>
                <select name="fuel" onchange="this.form.submit()">
                    <option value="">Todos</option>
                    <option value="Híbrido" <?php echo ($fuel_filter == 'Híbrido') ? 'selected' : ''; ?>>Híbrido</option>
                    <option value="Gasolina" <?php echo ($fuel_filter == 'Gasolina') ? 'selected' : ''; ?>>Gasolina</option>
                    <option value="Elétrico" <?php echo ($fuel_filter == 'Elétrico') ? 'selected' : ''; ?>>Elétrico</option>
                    <option value="Flex" <?php echo ($fuel_filter == 'Flex') ? 'selected' : ''; ?>>Flex</option>
                </select>
            </div>

            <div class="filter-group">
                <h4>Preço Máximo (R$)</h4>
                <input type="number" name="max_price" placeholder="Ex: 200000" value="<?php echo htmlspecialchars($max_price ?? ''); ?>" step="10000">
            </div>

            <div style="display: flex; gap: 10px; margin-top: 15px;">
                <button type="submit" class="btn btn-primary" style="flex: 1;">Aplicar</button>
                <a href="inventory.php" class="btn btn-secondary" style="padding: 10px; text-align: center;">Limpar</a>
            </div>

        </form>
    </aside>

    <section class="inventory-results">
        
        <div class="inventory-header">
            <p>Mostrando <strong><?php echo count($filtered_vehicles); ?></strong> veículo(s) encontrado(s)</p>
        </div>

        <?php if (!empty($filtered_vehicles)): ?>
            <div class="cards-grid">
                <?php foreach ($filtered_vehicles as $car): ?>
                    <article class="card-vehicle">
                        <img src="<?php echo htmlspecialchars($car['image']); ?>" alt="<?php echo htmlspecialchars($car['name']); ?>">
                        <div class="card-body">
                            <h3><?php echo htmlspecialchars($car['name']); ?></h3>
                            <p class="details"><?php echo $car['year']; ?> • <?php echo number_format($car['km'], 0, ',', '.'); ?> km • <?php echo htmlspecialchars($car['fuel']); ?></p>
                            <p class="price">R$ <?php echo number_format($car['price'], 2, ',', '.'); ?></p>
                            <a href="vehicle.php?id=<?php echo $car['id']; ?>" class="btn-details">Ver detalhes</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div style="background: var(--color-white); padding: 50px; text-align: center; border-radius: var(--radius-md); border: 1px solid var(--color-gray-light);">
                <h3>Nenhum veículo encontrado</h3>
                <p style="color: var(--color-gray-medium); margin-top: 10px;">Tente ajustar seus filtros ou buscar por outro termo.</p>
                <a href="inventory.php" class="btn btn-primary" style="margin-top: 20px;">Ver Todos os Veículos</a>
            </div>
        <?php endif; ?>

    </section>

</main>

<?php 
  include 'includes/footer.php'; 
?>