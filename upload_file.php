<?php
if(isset($_FILES['file'])){

	if ((($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")))
	  {
	  if ($_FILES["file"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
	  else
		{
			$uploaded_name = $_FILES[ 'file' ][ 'name' ];
			$uploaded_ext  = substr( $uploaded_name, strrpos( $uploaded_name, '.' ) + 1);
			$target_name = md5( uniqid() . $uploaded_name ) . '.' . $uploaded_ext;
			if( ( strtolower( $uploaded_ext ) == "jpg" || strtolower( $uploaded_ext ) == "jpeg" || strtolower( $uploaded_ext ) == "png" )) 
			{
				$dir = "uploads/";
				if (file_exists("$dir" . $target_name))
				  {
				  echo $_FILES["file"]["name"] . " already exists. ";
				  }
				else
				  {
				  move_uploaded_file($_FILES["file"]["tmp_name"],
				  "$dir" . $target_name);
				  $result = $dir . $target_name;
				  //echo "$result";
				  }
			}
			else{
				echo "<script>alert('Invalid file!');</script>";
				echo "<script>history.go(-1);</script>";
			}
		}
	  }
	else
	  {
		echo "<script>alert('Invalid file!');</script>";
		echo "<script>history.go(-1);</script>";
	  }
}
?>