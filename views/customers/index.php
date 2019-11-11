<?php if(!isset($_SESSION["validar"])){
	echo("<script>location.href='index.php?controller=Front&action=error';</script>");
	exit();
} ?>
<?php include "views/helpers/template.php" ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="header">
				<h2>Clientes</h2>
				<ul class="header-dropdown m-r--5">
					<li>
						<a href="<?php echo $helper->url("Customer","register") ?>">
							<button class="btn bg-teal btn-xs waves-effect top"><i class="material-icons icon">add</i><span>Registrar</span></button>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons ">more_vert</i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a href="javascript:void(0);">Informe</a></li>
						</ul>
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
							<th>Fecha</th>
							<th>Nombre</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>País</th>
							<th>Departamento</th>
							<th>Ciudad</th>
							<th></th>
							<th></th>
						</thead>
						<tbody>
							<?php
							foreach ($getAll as $get )
							{
								$id = $get["id"];
								$c = new BaseController();
								$countries= $c->getById($get["country"],'countries');
								$ci = new BaseController();
								$cities= $ci->getById($get["city"],'cities');
								$d = new BaseController();
								$department= $d->getById($get["department"],'departments');
								?>
								<tr>
									<td><?php echo $get["create_at"] ?></td>
									<td><?php echo $get["name"] ?></td>
									<td><?php echo $get["address"] ?></td>
									<td><?php echo $get["phone"] ?></td>
									<td><?php echo $countries["name"] ?></td>
									<td><?php echo $department["name"] ?></td>
									<td><?php echo $cities["name"] ?></td>

									<td>


									<a href="<?php echo $helper->url("Customer","update&id=$id") ?>">
											<button type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Editar">
											<i class="material-icons">mode_edit</i>
											</button>
											</a>

									</td>

										<td>
										<?php 
										{
											echo'
											<a href="'.$helper->url("Customer","delete&id=$id").'">
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