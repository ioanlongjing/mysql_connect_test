<?php
	// include the local , username and password
	include( 'conf/info.php' );

	// creat the db connect status
	$connect = new mysqli( $serverLocal , $serverUserName , $serverPassWord , $serverDataBase );

	// test the db connect status
	if( $connect -> connect_error )
	{
		die( "Connect Failed: " . $connect -> connect_error);
	};
	
	$sql_q = "SELECT UserName , PassWord FROM testTable ";
	$result = $connect -> query( $sql_q );

	if( $result -> num_rows > 0 )
	{
		// test select mysql data
		while( $row = $result -> fetch_assoc() ) 
		{
			echo "UserName:" . $row["UserName"] . "<br>";
			echo "Password:" . $row["PassWord"] . "<br>"; 
		}

		foreach( $result as $AllData )
		{
			echo $AllData['UserName'];
		}
	}
	else
	{
		echo "It not have result.";
	}

	$connect -> close();
