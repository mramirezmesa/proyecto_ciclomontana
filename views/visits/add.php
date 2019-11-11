<?php if(!isset($_SESSION["validar"])){
    echo("<script>location.href='index.php?controller=Front&action=error';</script>");
    exit();
} ?>
<?php include "views/helpers/template.php" ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="header">
				<h2>Registrar Nueva Visita</h2>
			</div>
			<div class="body">
				<!-- Formulario Cliente -->
				<form id="form_validation" method="post" action="<?php echo $helper->url("Visit","save"); ?>">
				<div class="row clearfix">
						<div class="col-md-4">
							<select class="form-control show-tick" name="seller" required>
								<option value="" disabled selected>Comercial</option>
								<?php
								$get = new VisitController();
								$getall = $get->getBy('seller');
								foreach ($getall as $get )
								{
									echo'<option value="'.$get['id'].'">'.$get['name'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
						<select class="form-control show-tick" name="customer" required>
								<option value="" disabled selected>Cliente</option>
								<?php
								$get = new VisitController();
								$getall = $get->getBy('customers');
								foreach ($getall as $get )
								{
									echo'<option value="'.$get['id'].'">'.$get['name'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="date" name="date" class="form-control" required>
									<label class="form-label"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="4" class="form-control no-resize" name="observations" placeholder="Observaciones de la visíta" required></textarea>
								</div>
							</div>
						</div>
					</div>
				<br>
				<button type="submit" class="btn bg-teal btn-sm waves-effect">
					<i class="material-icons">save</i>
					<span>Registrar</span></a>
				</button>
				<a href="<?php echo $helper->url("Visit","index"); ?>">
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