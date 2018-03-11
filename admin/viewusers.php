<?php
 include_once '../include/sqlConnect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?v=56"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

	.body-cont{
		margin-right : 30px;
		margin-left : 30px;
	}
		/* Remove the navbar's default margin-bottom and rounded borders */ 
		.navbar {
		margin-bottom: 0;
		border-radius: 0;
		}
		
		/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
		.row.content {height: 450px}
		
		/* Set gray background color and 100% height */
		.sidenav {
		padding-top: 20px;
		background-color: #f1f1f1;
		height: 100%;
		}
		
		/* Set black background color, white text and some padding */
		footer {
		background-color: #555;
		color: white;
		padding: 15px;
		}
		
		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (max-width: 767px) {
		.sidenav {
			height: auto;
			padding: 15px;
		}
		.row.content {height:auto;}
		body{
			max-width : 700px;
		}
    }
  </style>
</head>
<body>
 <div class="my-nav"></div>
 <script>
            $(function(){
            $(".my-nav").load("nav.php");
        });
	 </script>
	 <div class="container">
  <div class="page-header text-center">
    <h1>USERS LIST</h1>      
  </div>
  
</div>
  
<div class="container-fluid text-center body-cont center">    

                <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th  class = "text-center btn-primary">#</th>
                                <th class = "text-center btn-primary">User Name</th>
                                <th class = "text-center btn-primary">First Name</th>
                                <th class = "text-center btn-primary">Last Name</th>
                                <th class = "text-center btn-primary">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                       
				<?php
                /*How many records you want to show in a single page.*/
               
				$limit = 10;
				/*How may adjacent page links should be shown on each side of the current page link.*/
				$adjacents = 2;
				/*Get total number of records */
				$sql = "SELECT COUNT(*) 'total_rows' FROM `users`";
				$res = mysqli_fetch_object(mysqli_query($db, $sql));
				$total_rows = $res->total_rows;
				/*Get the total number of pages.*/
				$total_pages = ceil($total_rows / $limit);
				
				
				if(isset($_GET['page']) && $_GET['page'] != "") {
					$page = $_GET['page'];
					$offset = $limit * ($page-1);
				} else {
					$page = 1;
					$offset = 0;
				}


				$query  = "select * from `users` limit $offset, $limit";
				$result = mysqli_query($db, $query);
				if(mysqli_num_rows($result) > 0) {

					while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td>".($offset+1)."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['uFname']."</td>
                        <td>".$row['uLname']."</td>
                        
                        <td>".$row['uEmail']."</td>
                        </tr>";
                        $offset++;
					}
				}

				//Checking if the adjacent plus current page number is less than the total page number.
				//If small then page link start showing from page 1 to upto last page.
				if($total_pages <= (1+($adjacents * 2))) {
					$start = 1;
					$end   = $total_pages;
				} else {
					if(($page - $adjacents) > 1) {				   //Checking if the current page minus adjacent is greateer than one.
						if(($page + $adjacents) < $total_pages) {  //Checking if current page plus adjacents is less than total pages.
							$start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
							$end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
						} else {								   //If current page plus adjacents is greater than total pages.
							$start = ($total_pages - (1+($adjacents*2)));  //then the page range will start from total pages minus 1+($adjacents*2)
							$end   = $total_pages;						   //and the end will be the last page number that is total pages number.
						}
					} else {									   //If the current page minus adjacent is less than one.
						$start = 1;                                //then start will be start from page number 1
						$end   = (1+($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
					}
				}
				//If you want to display all page links in the pagination then
				//uncomment the following two lines
				//and comment out the whole if condition just above it.
				/*$start = 1;
				$end = $total_pages;*/
				?>
				 </tbody>
            </table>
				<?php if($total_pages > 1) { ?>
					<ul class="pagination pagination-sm justify-content-center">
						<!-- Link of the first page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=1'>&lt;&lt;</a>
						</li>
						<!-- Link of the previous page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page>1 ? print($page-1) : print 1)?>'>&lt;</a>
						</li>
						<!-- Links of the pages with page number -->
						<?php for($i=$start; $i<=$end; $i++) { ?>
						<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
							<a class='page-link' href='?page=<?php echo $i;?>'><?php echo $i;?></a>
						</li>
						<?php } ?>
						<!-- Link of the next page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>&gt;</a>
						</li>
						<!-- Link of the last page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php echo $total_pages;?>'>&gt;&gt;</a>
						</li>
					</ul>
				<?php } ?>
				<?php mysqli_close($db); ?>
 		
</div>



</body>
</html>
