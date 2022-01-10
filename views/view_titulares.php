<h1>Titulares</h1>
<br>
<button class="btn btn-sm btn-outline-secondary" id="titulares-btn-show-all-children" type="button"><i class="fas fa-plus-circle"></i>&nbsp;Expandir todos</button>
<button class="btn btn-sm btn-outline-secondary" id="titulares-btn-hide-all-children" type="button"><i class="fas fa-minus-circle"></i>&nbsp;Recolher todos</button>
<a class="btn btn-sm btn-secondary float-right" href="?pagina=inserir_titular"><i class="fas fa-plus"></i>&nbsp;Inserir novo titular</a>
<br>
<br>
<div class="table-responsive">
	<table class="table table-hover table-striped display dt-responsive" id="titular">
		<thead class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center" style="width: 16px;"></th> -->
				<th class="va-middle ha-center sorting all" data-type="number" data-filter="no" data-filtering="">Id</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">CPF</th>
				<th class="va-middle ha-center sorting" data-type="text" data-filter="yes" data-filtering="input">Nome</th>
				<th class="va-middle ha-center sorting" data-type="text" data-filter="yes" data-filtering="input">Nome reduzido</th>
				<th class="va-middle ha-center sorting_disabled">Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				while($linha = mysqli_fetch_array($consulta_titular)){
					echo '<tr>';
					//echo '<td class="va-middle ha-center"></td>';
					echo '<td class="va-middle ha-center">'.$linha['titular_id'].'</td>';
					echo '<td class="va-middle ha-right">'.$linha['titular_cpf'].'</td>';
					echo '<td class="va-middle ha-left">'.$linha['titular_nome'].'</td>';
					echo '<td class="va-middle ha-left">'.$linha['titular_nome_reduzido'].'</td>';
				?>

				<td class="va-middle ha-center"><a class="btn btn-primary" href="?pagina=inserir_titular&editar=<?php echo $linha['titular_id']; ?>"><i class="fas fa-pen"></i></a>&nbsp;<a class="btn btn-danger" href="deleta_titular.php?id=<?php echo $linha['titular_id']; ?>"><i class="fas fa-trash"></i></a></td></tr>

			<?php
				}
			?>
		</tbody>
		<tfoot class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center"></th> -->
				<th class="va-middle ha-center">Id</th>
				<th class="va-middle ha-center">CPF</th>
				<th class="va-middle ha-center">Nome</th>
				<th class="va-middle ha-center">Nome reduzido</th>
				<th class="va-middle ha-center">Opções</th>
			</tr>
		</tfoot>
	</table>
</div>