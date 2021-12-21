

<html> 
 <header>
<title>Template</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
 .col col-lg-2{
     padding-right:100px;
 }
 .acredius{
     width:30px
 }
 .container1{
     background-color: #FAE0DB;
     width:85%;
     margin-left:100px;
     font-size:25px;
     
     
 }
 .container2{
     background-color: #ADD8E6;
     width:85%;
     margin-left:100px;
     font-size:25px
 }
 .gauge{
     width:300px;
     margin-left:170px
     
 }
 th,td{
     border-bottom:1px solid
 }
</style> 


</header>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "", "acrediusdb"); //Connect PHP to MySQL Database
$table_data = '';
$sql = " SELECT * FROM company_information ORDER BY ID DESC LIMIT 1";
 $table_data .= ''; //Data for display on Web page
 $result =$connect->query($sql);
 if($result->num_rows>0){
     while($row=$result->fetch_assoc()){
        
 
 echo '
<div class="container">
  <div class="row">
    <div class="col">
      SCORING REPORT TEMPLATE
    </div>
    <div class="col-md-auto">
      
    </div>
    <div class="col col-lg-2">
        <img class="acredius" src="https://yt3.ggpht.com/ytc/AKedOLRPKMNuHd0f0Uq_PgUmSAOM0StN7pzm8N9aNw7Q=s900-c-k-c0x00ffffff-no-rj"></img>
      acredius
    </div>
  </div>
</div>
  <hr size="50" width="85%" color="black">
  <br><br>
 
 <div class="container1">
  Risk assessment
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <table class="table">
  <tbody>
  <tr>
      <th scope="col">Company Name</th>
      <td scope="col">'.$row["CompanyName"].'</td>
    </tr>
    <tr>
      <th scope="row">Score (0-1000)</th>
      <td>NA</td>
    </tr>
    <tr>
      <th scope="row">Risk class</th>
      <td>NA</td>
    </tr>
    <tr>
      <th scope="row">Risk assessment</th>
      <td>NA</td>
    </tr>
    <tr>
      <th scope="row">Recommendation</th>
      <td>NA</td>
    </tr>
  </tbody>
</table>
    </div>
    <div class="col">
      <img class="Gauge" src="https://cdn4.vectorstock.com/i/thumb-large/61/68/scale-measurement-heat-speed-arrow-from-vector-30196168.jpg"></img>
    </div>   
  </div>
</div>
<br><br>

<div class="container2">
  Company information
  </div>
  <div class="container">
  <div class="row">
    <div class="col">
    <table class="table">
  <tbody>
  <tr>
      <th scope="col">Country</th>
      <td scope="col">'.$row["LegalHeadquarterOfTheCompany"].'</td>
    </tr>
    <tr>
      <th scope="row">Adress</th>
      <td>'.$row["Adress"].'</td>
    </tr>
    <tr>
      <th scope="row">Number of employee</th>
      <td>'.$row["Employee"].'</td>
    </tr>
    <tr>
      <th scope="row">Activity</th>
      <td>'.$row["Sector"].'</td>
    </tr>
    <tr>
      <th scope="row">VAT number</th>
      <td>'.$row["VAT"].'</td>
    </tr>
    <tr>
      <th scope="row">Year of creation</th>
      <td>'.$row["EntryInTheComercialRegister"].'</td>
    </tr>
    <tr>
      <th scope="row">Commercial Register Office</th>
      <td>'.$row["CommercialRegisterOffice"].'</td>
    </tr>
    <tr>
      <th scope="row">Age Of The Company</th>
      <td>'.$row["AgeOfTheCompany"].'</td>
    </tr>
    <tr>
      <th scope="row">TurnOver In CHF</th>
      <td>'.$row["TurnOverInCHF"].'</td>
    </tr>
    <tr>
      <th scope="row">Capital In CHF</th>
      <td>'.$row["CapitalInCHF"].'</td>
    </tr>
    <tr>
      <th scope="row">Active brands</th>
      <td>'.$row["ActiveBrands"].'</td>
    </tr>
      <th scope="row">Legal Form</th>
      <td>'.$row["LegalForm"].'</td>
    </tr>
    <tr>
      <th scope="row">Commercial register number</th>
      <td>'.$row["CommercialRegisterNumber"].'</td>
    </tr>
    <tr>
      <th scope="row">Status</th>
      <td>'.$row["Status"].'</td>
    </tr>
    <tr>
  </tbody>
</table>
<button type="button" onclick="window.print();" class="btn btn-primary">Print Pdf</button>

    </div>
    ';
    echo $table_data;  
    echo '</table>';
}
}

         
    ?>
</body>
<br>


  </html>
 
