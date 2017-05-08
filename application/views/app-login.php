<!DOCTYPE html>
<html>
<head>
<?php echo '<title>'.$title.'</title>'.$meta_scripts.$css_scripts; ?>
<style>
#login-container{
	margin-top: 25vh;
	border: 1px solid grey;
	padding: 1rem 1rem 1rem 1rem;
}
</style>
</head>

<body id="has-logo">

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-md-4 col-lg-4 col-sm-push-2 col-md-push-4 col-lg-push-4">
			<div id="login-container" style="background-color: white;">
			<h1 style="text-align: center;"><?php echo $type; ?></h1>
				<?php echo form_open($login_type."_ajax/applogin",'class="form-horizontal" id="app-login"');?>
					<div class="form-group">
					  <label class="col-sm-2 col-xs-4 col-md-3" for="email">Account:</label>
					  <div class="col-sm-10 col-xs-8 col-md-9">
					  <div class="ui left icon input fluid">
					    <input type="text" class="form-control" id="account" name="account" placeholder="Enter Account">
					    <i class="user icon"></i>
					  </div>
					    
					    <p class="help-block" id="account_help-block"><?php echo form_error('account'); ?></p>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 col-xs-4 col-md-3" for="pwd">Password:</label>
					  <div class="col-sm-10 col-xs-8 col-md-9"> 
					    <div class="ui left icon input fluid">
					      <input type="password" class="form-control" id="account_password" name="account_password" placeholder="Enter Password">
					      <i class="lock icon"></i>
					    </div>
					    <p class="help-block" id="account_password_help-block"><?php echo form_error('account_password'); ?></p>
					  </div>
					</div>
					<div class="form-group"> 
					  <div class="col-sm-12">
					    <button type="submit" class="btn btn-primary btn-block">Login</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>
<?php echo $js_scripts; ?>
</body>
</html>