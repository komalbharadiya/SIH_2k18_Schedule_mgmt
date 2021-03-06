<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("location:login.php");
	}
        if(!isset($db))
        {
	include_once("private/conn.php");
        }
        $_SESSION['currentpage']='index';
        if(isset($_GET['eventapproval'])){
            $db->query("UPDATE guests SET Status=2 WHERE event_id = '".$_GET['eventid']."' and guest_id='".$_SESSION['id']."'");
            header("location:".$_SESSION['currentpage'].".php?qs=".$_GET['qs']."&d=".$_GET['d']."&f=".$_GET['f']);
            
        }elseif (isset($_GET['eventinterested'])) {
            $db->query("UPDATE guests SET Status=1 WHERE event_id = '".$_GET['eventid']."' and guest_id='".$_SESSION['id']."'");
            header("location:".$_SESSION['currentpage'].".php?qs=".$_GET['qs']."&d=".$_GET['d']."&f=".$_GET['f']);
        }elseif (isset($_GET['eventdisapprove'])) {
            $db->query("UPDATE guests SET Status=0 WHERE event_id = '".$_GET['eventid']."' and guest_id='".$_SESSION['id']."'");
            header("location:".$_SESSION['currentpage'].".php?qs=".$_GET['qs']."&d=".$_GET['d']."&f=".$_GET['f']);
        }
        
        
            
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MSP| Schedule management</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
   
      $(document).ready(function (){
          $( "#pick" ).hide();
          $("#calendertext").click(function (){
              $("#calendertext").hide();
              $( "#pick" ).show();
          });
           $( "#pick" ).change(function (){
               window.location = "index.php?d="+this.value+"&qs=calenderschedule";
           });
          
      });
            
            
      
       
    </script>
</head>
<body>

    <div id="wrapper">
<?php
	include("template/top.php");
?>
  <div id="page-wrapper">
            
      <div class="row">
            <!-- Content Header (Page header) -->
<?php
	include("component/home.php");
       # include ("component/process/home.php");
?>
            <?php
	include("component/topTenNotification.php");
       # include ("component/process/home.php");
?>
              </div>
  </div>
    </div>
</div>
    <?php
	include("template/bottomScripts.php");
?>
    <script>
function loadDoc(filename) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("page-content").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "component/"+filename, true);
  xhttp.send();
}
</script>
    
    
</body>
</html>