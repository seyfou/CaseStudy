 <?php
/*
Template Name: UploadData
*/

get_header(); 

if ( true === apply_filters( 'graduate_filter_frontpage_content_enable', true ) ) : ?>
	<!DOCTYPE html>

<div class="container page-section">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
  
    <html>  
      <head>  
           <title>Webslesson Tutorial</title> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <style>
   
   .box
   {
    width:1200px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
      </head>  
      <body>  
        <div class="container box">
          <h3 align="center">Scraping the Data of the given company</h3><br />
           <form action="" method="POST">
	    <input type="text" name="id" placeholder="Company Name" class="form-control" autocomplete="off"  value=""/>
	    <input type="submit" name="search" value="Submit">
		
	   </form>
	   
		  <?php 
			include('simple_html_dom.php');
			$myObj = new stdClass(); 	
			$connect = mysqli_connect("localhost", "root", "", "acrediusdb"); //Connect PHP to MySQL Database
            $query = '';
            $table_data = '';
		    
			if(isset($_POST['search']))
		   {   
	       
	              $id = $_POST['id'];
				  
				  
				  $output = rawurlencode($id);
	              $url1 = "https://www.moneyhouse.ch/en/search?q=".$id."&status=1&tab=companies";
				  $html = file_get_html("https://www.moneyhouse.ch/en/search?q=".$output."&status=1&tab=companies");
				  
				 $CompanyName = $html->find('div[class="row-person-data l-grid-cell l-two-fifths l-mobile-one-whole l-tablet-one-whole"]',0);
				 $C = $CompanyName->find('a',0);
				 
				 $b = $C->getAttribute('href');
				 $html1 = file_get_html("https://www.moneyhouse.ch".$b."");
				 
				 $CompanyName1 = $html1->find('div[class="company-name"]',0);
				 $C1 = $CompanyName1->find('h1',0)->text();
				 
				 $Status = $html1->find('div[class="company-status company-info-block"]',0);
				 $S = $Status->find('span',0)->text();
				 
				 $RegisterNumber = $html1->find('div[class="l-grid-cell l-one-third l-mobile-one-whole"]',0);
				 $EntryInTheComercialRegister = $RegisterNumber->find('p',0)->text();
				 $LegalForm = $RegisterNumber->find('p',1)->text();
				 $LegalHeadquarterOfTheCompany = $RegisterNumber->find('p',2)->text();
				 $CommercialRegisterOffice = $RegisterNumber->find('p',3)->text();
				 $CommercialRegisterNumber = $RegisterNumber->find('p',4)->text();
				 $VAT = $RegisterNumber->find('p',5)->text();
				 
				 $Sector =$html1->find('div[class="l-grid-cell l-two-thirds l-mobile-one-whole"]',0);
				 $Sector1= $Sector->find('p',0)->text();
				 
				 $Adress = $html1->find('div[class="l-grid-cell l-one-third l-mobile-one-whole l-tablet-one-whole"]',0);
				 $A = $Adress->find('p',0)->text();
				 
				 $AgeOfTheCompany = $html1->find('div[class="l-grid center"]',0);
				 $Age = $AgeOfTheCompany->find('div',0)->text();
				 $TurnOver = $AgeOfTheCompany->find('div',2)->text();
				 $Capital = $AgeOfTheCompany->find('div',4)->text();
				 $Employee = $AgeOfTheCompany->find('div',6)->text();
				 $ActiveBrands = $AgeOfTheCompany->find('div',8)->text();
				  
				 $Age1 = trim($Age," Age of the company");
				 $TurnOver1 = trim($TurnOver," Turnover in CHF"); 
                 $Capital2 =trim($Capital,"Capital in CHF");
				 $Capital3 = preg_replace("/[^a-zA-Z0-9\s]/", "", $Capital2);
				 $Employee1 = trim($Employee," Employees"); 
				  //$ActiveBrands1= trim($ActiveBrands, " ' ");
				  //$ActiveBrands1 = rm_special_char($ActiveBrands);
				  $ActiveBrands2= trim($ActiveBrands, " Active brands ");
				  
				 ?>
			   
			  
			   
			<?php $myObj->CompanyName = "".$C1.""; 
			      $myObj->CommercialRegisterNumber = "".$CommercialRegisterNumber."";
				  $myObj->LegalForm = "".$LegalForm."";
				  $myObj->Sector = "".$Sector1."";
			      $myObj->Status = "".$S."";
				  $myObj->Adress = "".$A."";
				  $myObj->EntryInTheComercialRegister = "".$EntryInTheComercialRegister."";
				  $myObj->LegalHeadquarterOfTheCompany = "".$LegalHeadquarterOfTheCompany."";
				  $myObj->CommercialRegisterOffice = "".$CommercialRegisterOffice."";
				  $myObj->VAT = "".$VAT."";
				  $myObj->AgeOfTheCompany = "".$Age1."";
				  $myObj->TurnOverInCHF = "".$TurnOver1."";
				  $myObj->CapitalInCHF = "".$Capital3."";
				  $myObj->Employee = "".$Employee1."";
				  $myObj->ActiveBrands = "".$ActiveBrands2."";
				  
            $myJSON = json_encode([$myObj]);

            echo $myJSON;
			?>
			   
		   
		  
		  <?php
            $myJSON = json_encode([$myObj]);
            //$filename = "C:\Users\ADMIN\Desktop\Scraping tool using React\Scraping-tool\company1.txt";
            //$data = file_get_contents($filename); //Read the JSON file in PHP
            $array = json_decode($myJSON, true); //Convert JSON String into PHP Array
          foreach($array as $row) //Extract the Array Values by using Foreach Loop
          {
			   
           $query .= "INSERT INTO company_information(CompanyName, CommercialRegisterNumber, LegalForm, Sector, Status, Adress, EntryInTheComercialRegister, LegalHeadquarterOfTheCompany, CommercialRegisterOffice, VAT, AgeOfTheCompany, TurnOverInCHF, CapitalInCHF, Employee, ActiveBrands) 
		   VALUES ('".$row["CompanyName"]."', '".$row["CommercialRegisterNumber"]."', '".$row["LegalForm"]."', '".$row["Sector"]."', '".$row["Status"]."', '".$row["Adress"]."', '".$row["EntryInTheComercialRegister"]."', '".$row["LegalHeadquarterOfTheCompany"]."', '".$row["CommercialRegisterOffice"]."', '".$row["VAT"]."', '".$row["AgeOfTheCompany"]."', '".$row["TurnOverInCHF"]."', '".$row["CapitalInCHF"]."', '".$row["Employee"]."', '".$row["ActiveBrands"]."'); ";  // Make Multiple Insert Query 
           $sql = "DELETE x1 FROM company_information x1 inner JOIN Company_information x2 where x1.id<x2.id  and x1.CompanyName = x2.CompanyName ";
		   $table_data .= ''; //Data for display on Web page
          }
		      if (mysqli_query($connect, $sql) ){
             // echo "Record deleted successfully";
	        }
		
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
		
     echo '<h3>Data Uploaded  successfully</h3><br />';
     echo '
      <table class="table table-bordered">
        <tr>
         <td width="6%">CompanyName</td>
		 <td>'.$row["CompanyName"].'</td>
		 </tr>
		 <tr>
         <td width="6%">CommercialRegisterNumber</td>
		 <td>'.$row["CommercialRegisterNumber"].'</td>
		 </tr>
		 <tr>
         <td width="6%">LegalForm</td>
		 <td>'.$row["LegalForm"].'</td>
		 </tr>
		 <tr>
		  <td width="6%">Sector</td>
		  <td>'.$row["Sector"].'</td>
		  </tr>
		  <tr>
         <td width="6%">Status</td>
		 <td>'.$row["Status"].'</td>
		 </tr>
		 <tr>
         <td width="6%">Adress</td>
		 <td>'.$row["Adress"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">EntryInTheComercialRegister</td>
		 <td>'.$row["EntryInTheComercialRegister"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">LegalHeadquarterOfTheCompany</td>
		 <td>'.$row["LegalHeadquarterOfTheCompany"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">CommercialRegisterOffice</td>
		 <td>'.$row["CommercialRegisterOffice"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">VAT</td>
		 <td>'.$row["VAT"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">AgeOfTheCompany</td>
		 <td>'.$row["AgeOfTheCompany"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">TurnOverInCHF</td>
		 <td>'.$row["TurnOverInCHF"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">CapitalInCHF</td>
		 <td>'.$row["CapitalInCHF"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">Employee</td>
		 <td>'.$row["Employee"].'</td>
		 </tr>
		 <tr>
		 <td width="6%">ActiveBrands</td>
		 <td>'.$row["ActiveBrands"].'</td>
		 </tr>

     ';
     echo $table_data;  
     echo '</table>';
          }
          ?>
		  <a href="http://localhost/Template">Show report</a>
		  <?php }
		   
			?>
			
     <br />
         </div>  
      </body>  
 </html>  
  
		

 
 		
		<?php
endif;
