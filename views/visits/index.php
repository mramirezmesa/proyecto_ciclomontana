<?php if(!isset($_SESSION["validar"])){
	echo("<script>location.href='index.php?controller=Front&action=error';</script>");
	exit();
} ?>
<?php include "views/helpers/template.php" ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="header">
				<h2>Visitas</h2>
				<ul class="header-dropdown m-r--5">
					<li>
						<a href="<?php echo $helper->url("Visit","register") ?>">
							<button class="btn bg-teal btn-xs waves-effect top"><i class="material-icons icon">date_range</i><span>Asignar Visita</span></button>
						</a>
					</li>
				</ul>
				<br>
				<?php
				if (isset($_GET["resp"])) {
					if ($_GET["resp"]==1)
					{
						$helper->success();
					}else
					{
						$helper->error();
					}
				}
				?>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-striped table-hover js-basic-example dataTable">
						<thead>
							<th>Fecha Visita</th>
							<th>Vendedor</th>
							<th>Cliente</th>
							<th>Valor Visita</th>
							<th>Saldo Cupo</th>
							<th>Observaciones</th>
							<th></th>
						</thead>
						<tbody>
							<?php
							foreach ($getAll as $get )
							{
								$id = $get["id"];
								$q = new BaseController();
								$seller= $q->getById($get["seller"],'seller');
								

								$id = $get["id"];
								$c = new BaseController();
								$customer= $c->getById($get["customer"],'customers');

								?>
								<tr>
									<td><?php echo $get["date"] ?></td>
									<td><?php echo $seller["name"] ?></td>
									<td><?php echo $customer["name"] ?></td>
									<td><?php echo $get["visit_value"] ?></td>
									<td><?php echo $get["quota_balance"] ?></td>
									<td><?php echo $get["observations"] ?></td>
										<td>
										<?php 
										{
											echo'
											<a href="'.$helper->url("Visit","deleteVisits&id=$id").'">
											<button type="button" onclick="return confirm(\'¿Estas seguro?\')";" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
											<i class="material-icons">delete</i>
											</button>
											</a>
											';
										} ?>
										</td>

								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>