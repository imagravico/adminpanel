<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Welcome <strong>First Last Name</strong><br><small><?php echo date('j. F Y'); ?></small></h1>
                </div>
                <!-- END Main Title -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->

    <!-- Mini Top Stats Row -->
    <div class="row">
		<div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="panel_client.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="fa fa-user"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        12 <strong>Clients</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
		
		<div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_comp_gallery.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="fa fa-globe"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        6 <strong>Websites</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
		
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="panel_settings_checklists.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        5 <strong>Checklists</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="panel_settings_messages.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-envelope"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        9 <strong>Messages</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Mini Top Stats Row -->

</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php include 'inc/template_scripts.php'; ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/helpers/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>

<?php include 'inc/template_end.php'; ?>