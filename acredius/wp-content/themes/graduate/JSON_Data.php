<?php
/*
Template Name: JSON_data
*/

get_header(); 

if ( true === apply_filters( 'graduate_filter_frontpage_content_enable', true ) ) : ?>
	<!DOCTYPE html>

<div class="container page-section">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

<html>
<head?
   <title> Search Data by CompanyName</title>

 
 </head>
   <body>
     <center>
	  <h1> Search for a Company Information</h1>
	  <div class="container">
	   <form action="" method="POST">
	    <input type="text" name="id" placeholder="Enter" />
	    <input type="submit" name="search" value="Submit">
	   </form>
	  
		   <?php 
		   $connection =mysqli_connect("localhost","root","");
		   $db = mysqli_select_db($connection, 'acredius');
		   
		   if(isset($_POST['search']))
		   {
			   
			   $id = $_POST['id'];
			   
			   $query = " SELECT * FROM `company_information` where CompanyName='$id' ";
			   $query_run = mysqli_query($connection,$query);
			   
			   while($row = mysqli_fetch_array($query_run))
			   {
				   ?>
				
			
			
    <p>[ <br>{ "CompanyName": "<?php echo $row['CompanyName'] ?>"},</p> 
     <p> { "RegisterNumber": "<?php echo $row['RegisterNumber'] ?>"},</p> 
	 <p>{ "LegalForm": "<?php echo $row['LegalForm'] ?>"},</p> 
	 <p>{ "Sector": "<?php echo $row['Sector'] ?>"},</p> 
	 <p>{ "Status": "<?php echo $row['Status'] ?>"},</p> 
	 <p>{ "Adress": "<?php echo $row['Adress'] ?>"}, <br> ]</p> 
  
				   <?php
			   }
		   }
		   
		   ?>
	  
	 </center>
	 </body>
	 </html>

<?php
endif;

