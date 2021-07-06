<!-- header -->
<div class="header" id="home1">
		<div class="container">
			<div class="w3l_login">
            <table>
            <tr>
            <?php if (isset($_SESSION['nama'])) {
            ?>
            <!-- ini kalau dia udah login -->
            <td><a href="index.php?logout"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></td>
            <td>Hallo, <h4>&nbsp;<?=$_SESSION['nama']?></h4></td>
            <?php
            } else {
            ?>
            <td> <a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></td>
            <?php
            }
            ?>
            
               
               
            </tr>
            </table>
			</div>
			<div class="w3l_logo">
				<h1><a href="index.php">Fresh Market<span>Fresh Vegetables & Fruits</span></a></h1>
			</div>
			
			<div class="cart cart box_1"> 
				<form action="#" method="post" class="last"> 
					<input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="display" value="1" />
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</form>   
			</div>  
		</div>
	</div>
	<!-- //header -->