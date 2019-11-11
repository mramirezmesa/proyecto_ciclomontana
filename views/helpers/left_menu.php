<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="active">
                <a href="<?php echo $helper->url("Front","home") ?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo $helper->url("Customer","index") ?>">
                <i class="material-icons">face</i>
                <span>Clientes</span>
                </a>
                </li>
                <li>
                <a href="<?php echo $helper->url("Visit","index") ?>">
                <i class="material-icons">assignment_ind</i>
                <span>Programar Visita</span>
                </a>
                </li>
                <li>
                <a href="<?php echo $helper->url("Visit","indexQuota") ?>">
                <i class="material-icons">attach_money</i>
                <span>Asignar Cupo Vendedor</span>
                </a>
                </li>




            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?php echo date("Y"); ?><a href="javascript:void(0);"> CicloMontaña S.A</a>.
            </div>
        </div>
    <!-- #Footer -->
    </aside>
<!-- #END# Left Sidebar -->
</section>