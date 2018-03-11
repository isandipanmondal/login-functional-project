<?php  
	
	global $wpdb;
	/*Template Name: my-profile*/

	get_header();



	if (isset($_POST['submit'])) {


		//$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);

		//print_r($_FILES["fileToUpload1"]);

		

		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		

		$check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);

		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }



		}


		//$experience = $_POST['number'];
		//$image = $_FILES["fileToUpload1"]["name"];

		$uer_ex = $wpdb->escape(trim($_POST['number']));
		$user_img = $wpdb->escape(trim($_FILES["fileToUpload1"]["name"]));

		/*$userdata = [
				'user_expre' => $uer_ex, 
				'user_img' => $user_img,
				'user_pass' => $user_pass,
				'role' => $role
			];*/

		if ( !empty( $uer_ex ) ) {
        	update_user_meta( $current_user->ID, 'user_expre', esc_attr( $uer_ex ) );
		}

		if ( !empty( $user_img ) ) {
        	update_user_meta( $current_user->ID, 'user_image', esc_attr( $user_img ) );
		}


?>


<h1>My profile</h1>


<form method="POST" action="" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Experience </td> 
			<td><input type="number" name="number" min="0"></td>
		</tr>

		<tr>
			<td> Profile Picture </td> 
			<td><input type="file" name="fileToUpload1" id="fileToUpload1"></td>
		</tr>

		<tr>
			<td>Picture Upload </td> 
			<td><input type="file" name="fileToUpload2" id="fileToUpload2" multiple="multiple"></td>
		</tr>

		<tr>
			<td>Location </td> 
			<td><textarea name="addre"></textarea></td>
		</tr>

		<tr>
			<td>Price/Service</td>
			<td><input type="text" name="servie"></td>
		</tr>

		<tr>
			<td><input type="submit" name="submit"></td>
		</tr>

	</table>

</form>






<table>
	<tr>
		<td>Experience</td>
		<td><?php echo get_user_meta( "3", 'user_image', true ); ?></td>
	</tr>
	<tr>
		<td>Image</td>
		<td><?php  ?></td>
	</tr>
</table>

<?php get_footer(); ?>