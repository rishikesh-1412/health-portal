<?php
	include("header.php");
	if(isset($_POST[submit])){  
		$message = "Hi $_POST[name],
		Your Email ID is :$_POST[email]
		Message : $_POST[comment]					
		We will contact you within next 7 days.";
		$to_mail = $_POST['email'];
		$subject = "Contact Us";
		$headers = "From:HRMS<rishimung1412@gmail.com>";
		if(mail($to_mail,$subject,$message,$headers)){
			echo "Mail sent susccessfully!!";
		}else{
			echo "Mail Failed!!";
		}
	}
?>

<div class="wrapper col2">
  	<div id="breadcrumb">
		<ul>
			<li class="first">Contact Us</li>
		</ul>
  	</div>
</div>

<div class="wrapper col4">
  	<div id="container">
        <h6>Contact Us by entering following information</h6>
        <form action="" method="post">
          	<p>
				<input type="text" name="name" id="name" value="" size="22" required />
				<label for="name"><small>Name (required)</small></label>
			</p>
          	<p>
				<input type="text" name="email" id="email" value="" size="22" required />
				<label for="email"><small>Mail (required)</small></label>
          	</p>
          	<p>
				<textarea name="comment" id="comment" cols="100%" rows="10" required></textarea>
				<label for="comment" style="display:none;"><small>Comment (required)</small></label>
          	</p>
          	<p>
            	<input name="submit" type="submit" id="submit" value="Submit Form"  />
            	&nbsp;
            	<input name="reset" type="reset" id="reset" tabindex="5" value="Reset Form" />
          	</p>
        </form>
  	</div>
</div>

<div class="clear"></div>

<?php
	include("footer.php");	
?>