<?php if(!isset($_SESSION["validar"])){
    echo("<script>location.href='index.php?controller=Front&action=error';</script>");
    exit();
} ?>
<?php include "views/helpers/template.php" ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="header">
				<h2>Registrar Nuevo Cliente</h2>
			</div>
			<div class="body">
				<!-- Formulario Cliente -->
				<form id="form_validation" method="post" action="<?php echo $helper->url("Customer","save"); ?>">
				<div class="row clearfix">
						<div class="col-md-2">
						<div class="form-group form-float">
								<div class="form-line">
									<input type="text" name="nit" class="form-control" required>
									<label class="form-label">Nit</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" name="name" class="form-control" required>
									<label class="form-label">Nombre</label>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" name="address" class="form-control" required>
									<label class="form-label">Dirección</label>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" name="phone" class="form-control" required>
									<label class="form-label">Teléfono</label>
								</div>
							</div>

						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-4">
							<select class="form-control show-tick" name="country" required>
								<option value="" disabled selected>País</option>
								<?php
								$get = new CustomerController();
								$getall = $get->getBy('countries');
								foreach ($getall as $get )
								{
									echo'<option value="'.$get['id'].'">'.$get['name'].'</option>';
								}
								?>
							</select>
						</div>

						<div class="col-md-4">
							<select class="form-control show-tick" name="department" required>
								<option value="" disabled selected>Departamento</option>
								<?php
								$get = new CustomerController();
								$getall = $get->getBy('departments');
								foreach ($getall as $get )
								{
									echo'<option value="'.$get['id'].'">'.$get['name'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<select class="form-control show-tick" name="city" required>
								<option value="" disabled selected>Ciudad</option>
								<?php
								$get = new CustomerController();
								$getall = $get->getBy('cities');
								foreach ($getall as $get )
								{
									echo'<option value="'.$get['id'].'">'.$get['name'].'</option>';
								}
								?>
							</select>
						</div>

					</div>


				<br>
				<button type="submit" class="btn bg-teal btn-sm waves-effect">
					<i class="material-icons">save</i>
					<span>Registrar</span></a>
				</button>
				<a href="<?php echo $helper->url("Customer","index"); ?>">
					<button type="button" class="btn bg-grey waves-effect">
						<i class="material-icons">settings_backup_restore</i>
						<span>Regresar</span>
					</button>
				</a>
			</form>
			<!-- fin formulario usuario -->
		</div>
	</div>
</div>
</section>