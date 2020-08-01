<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
				<a class="nav-link " href="/my-work">My Work</a>
			  </li>

              <li class="nav-item">
				<a class="nav-link" href="/projects">Projects</a>
			  </li>

			  <li class="nav-item active btn-outline-white">
				<a class="nav-link" href="/groups">Groups</a>
			  </li>

              <li class="nav-item">
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
</div>

       <div class=" accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Insomnias
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">Prajwal Sumbe (L)</li>
          <li class="list-group-item">Somesh Gawade</li>
          <li class="list-group-item">Sanket Deone</li>
          <li class="list-group-item">Nikhil Jorwekar</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          The Uncalled Four
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">Sunanda Somwase (L)</li>
          <li class="list-group-item">Tejas Shah</li>
          <li class="list-group-item">Shivam Rajput</li>
          <li class="list-group-item">Soham Pawar</li>
        </ul>
        </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Fantastic 4
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">Vicky Mali (L)</li>
          <li class="list-group-item">Kashmira Dhere</li>
          <li class="list-group-item">Aditi Kanzarkar</li>
          <li class="list-group-item">Jozia Khan</li>
        </ul>
        </div>
    </div>
  </div>


<div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
         Alpha Team
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">Dheeraj Danve (L)</li>
          <li class="list-group-item">Prachi Ambure</li>
          <li class="list-group-item">Abhishek Jagtap</li>
          <li class="list-group-item">Yashwardhan Chavan</li>
        </ul>
        </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
          The Chosen Ones
        </button>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">Niranjan Sawant (L)</li>
          <li class="list-group-item">Sanket Bhogade</li>
          <li class="list-group-item">Omkar Latpate</li>
          <li class="list-group-item">Mahesh Sanap</li>
        </ul>
        </div>
    </div>
  </div>
  </div>

  @yield('notify')

  <script type="text/javascript">

    $('.collapse').collapse()

  </script>
  
    </body>

</html>
