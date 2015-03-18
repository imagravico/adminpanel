   <?php
   use app\models\User;
   ?>
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Welcome <strong><?= User::getRealName();?></strong><br><small><?= date('d. F Y');?></small></h1>
                </div>
                <!-- END Main Title -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="web/backend/img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->

    <!-- Mini Top Stats Row -->
    <div class="row">
		<div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="/clients" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="fa fa-user"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <?= $count['clients']?> <strong>Clients</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
		
		<div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="/websites" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="fa fa-globe"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <?= $count['websites']?> <strong>Websites</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
		
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="/checklists" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <?= $count['checklists']?> <strong>Checklists</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="/messages" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-envelope"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <?= $count['messages']?> <strong>Messages</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Mini Top Stats Row -->

