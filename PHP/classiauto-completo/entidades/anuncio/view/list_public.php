<h2>
  Anúncios
</h2>

<div>
	<?php
	while ($anuncio = mysqli_fetch_array($result)) :
	?>
		<div class="col">
				<div class="card-header">
					<b><?= $anuncio["destaque"] ?></b>
				</div>
				<img src="images/car.svg">
				<div class="card-body">
					<p>
						<?= $anuncio["categoria"] ?> | <?= $anuncio["marca"] ?>
					</p>
					<p>
						<?= $anuncio["descricao"] ?>
					</p>
				</div>
				<div class="card-footer">
					<span>Contato: <?= $anuncio["nome"] ?> (<?= $anuncio["telefone"] ?>)</span>
				</div>
			</div>
		</div>
	<?php
	endwhile;
	?>
</div>