<html>

	<head>
	
		<title>Project</title>
	
		    <script type="text/javascript" src="jquery.min.js"></script>
		
		    <script src="jquery-ui/jquery-ui.js"></script>
		
		    <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
		
		    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
		    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

		    <link href="style.css" rel="stylesheet">
				
	</head>
	
	<body>

     <div class="container">

   <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
   </div>

	<div class="login-box container" id="homePageContainer">

		<h1>LOGIN</h1>

		<form method="post" id="signInForm" action="/tasks">

        <?php echo csrf_field(); ?>
       
		
		<p class="para">Haven't registeres yet? Register now.</p>

            <div class="text-box">
				<input name="name" type="text" placeholder="Full Name"><br>

                <?php if($errors->has('name')): ?>
                            <p><?php echo e($errors->first('name')); ?></p>
                        <?php endif; ?>

			</div>	
		
			<div class="text-box">
				<input name="email" type="text" placeholder="Email Address"><br>

                <?php if($errors->has('email')): ?>
                            <p><?php echo e($errors->first('email')); ?></p>
                        <?php endif; ?>

			</div>	
			
			<div class="form-group text-box">			
				<input name="password" type="password" placeholder="Password" ><br>

                  <?php if($errors->has('password')): ?>
                            <p><?php echo e($errors->first('password')); ?></p>
                        <?php endif; ?>

            </div>

            <div class="form-group text-box">			
				<input name="cpassword" type="password" placeholder="Confirm Password" ><br>

                  <?php if($errors->has('cpassword')): ?>
                            <p><?php echo e($errors->first('cpassword')); ?></p>
                        <?php endif; ?>

            </div>
											
			<div class="form-group text-box">			
								
				<button class="button is-link btn btn-success" type="submit">Sign In!</button><br>				
			</div>
			
			<p><a  class="toggleForms">Log In</a></p>
			
		</form>

	    <form method="post" id="logInForm" action="/tasks">

        <?php echo csrf_field(); ?>
		
		<p class="para">Log in using your usename & password.</p>

			<div class="form-group text-box">
				<input  name="email" type="text" placeholder="Email Address"><br>

                 <?php if($errors->has('email')): ?>
                            <p><?php echo e($errors->first('email')); ?></p>
                        <?php endif; ?>

			</div>	
			
			<div class="form-group text-box">			
				<input  name="password" type="password" placeholder="Password"><br>

                 <?php if($errors->has('password')): ?>
                            <p><?php echo e($errors->first('password')); ?></p>
                        <?php endif; ?>

			</div>
									
			<div class="form-group text-box">			
								
				<button class="button is-link btn btn-success" type="submit">Log In!</button><br>		
			</div>
			
			<p><a  class="toggleForms">Sign Up</a></p>
			
		</form>
	
	</div>
	
	<script type="text/javascript">
	
		$('.toggleForms').click(function(){
			
			$('#signInForm').toggle();
			$('#logInForm').toggle();
		});
		
		
		
	</script>
	
	</body>
	
</html>	
<?php /**PATH C:\Users\Sanket\pm\resources\views/project/header.blade.php ENDPATH**/ ?>