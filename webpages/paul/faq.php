<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
<?php include "partials/navigation.php"; ?>
<?php include "./admin/functions.php"; ?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type = "text/javascript" src="js/jquery-1.11.0.min.js"> </script>
<script type = "text/javascript" src="js/script.js"></script>
</head>
<?php 
if(!isset($_SESSION['username'])) {
    header("Location:registration.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
           
			<div class = "faq">
			<h1 class="page-header">
			
                Frequently asked questions
               
            </h1>
			<H4>
			-What is playitbypeer and what do we?</H4>
			 <div class="lead">
				<i>playitbypeer is a platform to assist and facilitate the proofreading of students disserations, assignments and research papers
				among acedamics and staff.</i> 
			 </div>
				
			<H4>-How do i submit a document?</H4>
			 <p class="lead">
			 <i>In order to submit a document to be proofread by your peers, successfully sign-up and create an account. In order to this your must 
				have 'ul.ie' email address. Then naivigate to the create task section and submit your details about your peice of work to be proofread. 
			 </i>
			 </p>
			 	<H4>-Who uses our services?</H4>
			  <p class="lead">
			  
			 <i>Our service is used by primarialy current UL students and staff, with some alumni still being able to access it the platform.
			 </i>
			 </p>
			 	
				
				<H4>-Can i delete my proof reading task after i submited it? </H4>
		 <p class="lead">
		<i>	 Yes, after you have signed up and registered your account, you can then upload a task, you can also edit and delete the tasks you upload if you see fit. 
			</br>At the index page, naivigate to Your Dashboard>Tasks>All Tasks> Delete tasks. 
			</i> </p>
			
			 	<H4>-How much does a playitbypeer cost? </H4>
			  <p class= "lead">
			  <i> The platform is an entirely free platform to use for boths students and staff.
				</i>
			</p>
			 	
			 
			 </div>
			 </div>
			 <?php include "partials/sideBar.php"; ?> 
    </div>
</div>



<?php include "partials/footer.php"; ?>