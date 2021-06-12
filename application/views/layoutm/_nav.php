<nav class="navbar navbar-static-top">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

	<div class="navbar-custom-menu">
		
		
		<ul class="nav navbar-nav">
			<!-- Messages: style can be found in dropdown.less-->
			<li class="dropdown messages-menu">     
      
				<ul class="dropdown-menu">
					<!-- <li class="header">You have 4 messages</li> -->
					<li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu">
							
						</ul>
					</li>
					<li class="footer"><a href="#">See All Messages</a></li>
				</ul>
			</li>
			<!-- Notifications: style can be found in dropdown.less -->
			<li class="dropdown notifications-menu">
           	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo date('l, d-m-Y');?>
              <!-- <span class="glyphicon  glyphicon-calendar"></span></p> -->
             <!--  <?php 
              date_default_timezone_set('Asia/Jakarta');?>
              <p class=" text-bold"> <?php echo date('h:i a');?> -->
              </a>

				<ul class="dropdown-menu">
					<li class="header">You have 10 notifications</li>
					<li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu">
							
							
						</ul>
					</li>
					<li class="footer"><a href="#">View all</a></li>
				</ul>
			</li>
			<!-- Tasks: style can be found in dropdown.less -->

			<!-- User Account: style can be found in dropdown.less -->

			<li class="dropdown user user-menu">		

				  <a href="<?php echo base_url() ?>auth/logout" class="dropdown-toggle" data-toggle="dropdown">

                <!-- <img src="<?php echo base_url('assets/upload/images/foto_profil/'.$this->session->userdata('photo')); ?>" class="user-image"> -->
                <span class="hidden-xs"><?php echo $this->session->userdata('first_name'); ?> <?php echo $this->session->userdata('last_name'); ?></span>
            </a>  
				<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header">
						
					</li>
					<!-- Menu Footer-->
					<li class="user-footer">
						
					</li>
				</ul>
			</li>
			<!-- Control Sidebar Toggle Button -->
		</ul>
	</div>
</nav>
