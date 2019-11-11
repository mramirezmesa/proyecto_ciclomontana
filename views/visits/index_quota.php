<?php if(!isset($_SESSION["validar"])){
	echo("<script>location.href='index.php?controller=Front&action=error';</script>");
	exit();
} ?>
<?php include "views/helpers/template.php" ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="header">
				<h2>Asignar Cupo Vendedor</h2>
				<ul class="header-dropdown m-r--5">
					<li>
						<a href="<?php echo $helper->url("Visit","registerQuota") ?>">
							<button class="btn bg-teal btn-xs waves-effect top"><i class="material-icons icon">add</i><span>Asignar Cupo</span></button>
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
							<th>Vendedor</th>
							<th>Cupo</th>
							<th>Cantidad Visitas Programadas</th>
							<th></th>
							<th></th>
						</thead>
						<tbody>
							<?php
							foreach ($getAll as $get )
							{
								$id = $get["id"];
								$q = new BaseController();
								$seller= $q->getById($get["seller"],'seller');

								?>
								<tr>

									<td><?php echo $seller["name"] ?></td>
									<td><?php echo $get["quota"] ?></td>
									<td><?php echo $get["max_visits"] ?></td>
									<td>


									<a href="<?php echo $helper->url("Visit","update&id=$id") ?>">
											<button type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Editar">
											<i class="material-icons">mode_edit</i>
											</button>
											</a>

									</td>

										<td>
										<?php 
										{
											echo'
											<a href="'.$helper->url("Visit","delete&id=$id").'">
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