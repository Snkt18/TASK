<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project Management</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script type="text/javascript" src="jquery.min.js"></script>
		
		<script src="jquery-ui/jquery-ui.js"></script>
		
		<link href="jquery-ui/jquery-ui.css" rel="stylesheet">
		
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<link href="css/mdb.min.css" rel="stylesheet">
		
		<script type="text/javascript" src="js/mdb.min.js"></script>
		
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<link rel="stylesheet" href="index_style.css">

    </head>


    <body>

    
    <div class="container-fluid">
   
        <!--Navbar -->
		<nav class=" mb-1 navbar navbar-expand-lg navbar-dark peach-gradient lighten-1">
        
		  <a class="navbar-brand nav-link" href="/home_page">Home</a>
         
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
			aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
			<ul class="navbar-nav mr-auto">

           
			 
              <li class="nav-item">
				<a class="nav-link" href="/my-work">My Work</a>
			  </li>

              <li class="nav-item">
				<a class="nav-link" href="/projects">Projects</a>
			  </li>

			  <li class="nav-item">
				<a class="nav-link" href="/groups">Groups</a>
			  </li>

              <li class="nav-item active btn-outline-white">
				<a class="nav-link" href="/notification">Notification<span class="badge-notify badge badge-danger ml-2">2</span><span class="sr-only">unread messages</span></a>
			  </li>

              
			  
			</ul>
			<ul class="navbar-nav ml-auto nav-flex-icons">
			 
			  <li class="nav-item avatar dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
				  aria-haspopup="true" aria-expanded="false">
				  <img src="download.png" class="ig rounded-circle z-depth-0"
					alt="avatar image">
				</a>
				<div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
				  aria-labelledby="navbarDropdownMenuLink-55">
				  <a class="dropdown-item" href="/my-account">My Account</a>
				  
				  <a class="dropdown-item" href="/home">Logout</a>
				</div>
			  </li>
			</ul>
		  </div>
		</nav>
		<!--/.Navbar -->
      
    
     <div class="list-group" id="myList">
  <a class="list-group-item list-group-item-action" >Your deadline for project 'Gutsy Gibbon' is close.</a>
  <a class="list-group-item list-group-item-action" >You are alloted for new project.</a>
  
</div>

      </div>

      <?php $__env->startSection('notify'); ?>

      <script type="text/javascript">

            localStorage.setItem("seen_badge", "false");

            if(localStorage.seen_badge === "false") {
    $('.badge-notify').show();
}

    $('.badge-notify').on('click', function() {
    $(this).hide();
    localStorage.seen_badge = "true";
});

      </script>

      <?php $__env->stopSection(); ?>

    </body>

</html>
<?php /**PATH C:\Users\Sanket\pm\resources\views/project/notification.blade.php ENDPATH**/ ?>