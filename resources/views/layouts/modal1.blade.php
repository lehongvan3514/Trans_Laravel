<!-- Modal1 -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
				<div class="signin-form profile">
				<h3 class="agileinfo_sign">Sign In</h3>	
						<div class="login-form">
							<form action="signin" method="post">
							 {{ csrf_field() }}
								<input type="email" name="email" placeholder="E-mail" required="">
								<input type="password" name="password" placeholder="Password" required="">
								<button class="btn btn-primary" type="submit">Sign in</button>
							</form>
							@include('layouts.errors')
							
						</div>
						<div class="login-social-grids">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
						<p><a href="#" data-toggle="modal" data-target="#myModal3" > Don't have an account?</a></p>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- //Modal1 -->	
<!-- Modal2 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
				<div class="signin-form profile">
				<h3 class="agileinfo_sign">Sign Up</h3>	
						<div class="login-form">
							<form action="signup" method="post">
								{{ csrf_field() }}
							   <input type="text" name="name" placeholder="Name" required="">
								<input type="email" name="email" placeholder="Email" required="">
								<input type="password" name="password" placeholder="Password" required="">
								<input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
								<button class="btn btn-primary" type="submit">Sign up</button>
							</form>
							@include('layouts.errors')
						</div>
						<p><a href="#"> By clicking register, I agree to your terms</a></p>
					</div>
			</div>
		</div>	

	</div>
</div>

<!-- //Modal2 -->	
