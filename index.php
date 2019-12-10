<?php

$link = mysqli_connect("127.0.0.1", "username", "password", "Store");

function SQL_array($query) {
	global $link;
	$A = Array();
	$i = 0;
	$R = mysqli_query($link, $query);
	if (!mysqli_num_rows($R)) return NULL;
	while ($r = mysqli_fetch_assoc($R))
	 	$A[$i++] = $r;
	return $A;
}

if ($_POST["search"]) {
  $p = mysqli_real_escape_string($link, $_POST["search"]);
  $A = SQL_array("SELECT * FROM Items WHERE name LIKE '%$p%';");
} else
  $A = SQL_array("SELECT * FROM Items;");
?>

<style>

@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');

body {
	text-align: center;
	font-family: 'Roboto', sans-serif;
}

h1 {
	font-size: 64px;
}

h2 {
	font-size: 32px;
}

div.coffee {
	position: relative;
	left: 50%;
	transform: translateX(-50%);
	width: 300px;
}

form {
	height: 64px;
}

input {
	background: white;
	border: 4px solid black;
	width: 512px;
	height: 64px;
	padding: 16px;
	font-family: 'Roboto', sans-serif;
	vertical-align: middle;
	border-radius: 16px 0 0 16px;
	font-size: 32px;
}

button {
	margin-left: -4px;
	background: black;
	border: 4px solid black;
	width: 128px;
	height: 64px;
	vertical-align: middle;
	border-radius: 0 16px 16px 0;
}

button > svg {
	stroke: white;
	fill: white;
}

table {
	position: relative;
	width: 50%;
	font-size: 32px;
	left: 50%;
	transform: translateX(-50%);
}

td {
	font-family: 'Roboto', sans-serif;
	padding: 16px;
	text-align: center;
	border: 4px solid black;
}

thead > tr > td {
	background: black;
	color: white;
}

thead > tr > td:first-child {
	border-radius: 16px 0 0 0;
}

thead > tr > td:last-child {
	border-radius: 0 16px 0 0;
}

tbody > tr:last-child > td:first-child {
	border-radius: 0 0 0 16px;
}

tbody > tr:last-child > td:last-child {
	border-radius: 0 0 16px 0;
}

tbody > tr > td {

}

</style>

<html>
	<head>
		<title> Big Cup Energy </title>
	</head>
	<body>
		<div class="coffee">
			<svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 24 24">
				<path d="M14.911 10c-.308 3.325-1.398 5.712-2.949 8h-4.925c-1.373-2.009-2.612-4.372-2.948-8h10.822zm2.089-2h-15c0 5.716 1.826 8.996 4 12h7c2.12-2.911 4-6.333 4-12zm1.119 2c-.057.701-.141 1.367-.252 2h1.55c-.449 1.29-1.5 2.478-2.299 2.914-.358 1.038-.787 1.981-1.26 2.852 3.274-1.143 5.846-4.509 6.142-7.766h-3.881zm-7.745-3.001c4.737-4.27-.98-4.044.117-6.999-3.783 3.817 1.409 3.902-.117 6.999zm-2.78.001c3.154-2.825-.664-3.102.087-5.099-2.642 2.787.95 2.859-.087 5.099zm9.406 15h-15v2h15v-2z"/>
			</svg>
		</div>
		<h1> BIG CUP ENERGY </h1>
		<h2> &quot;I WILL TAKE IT BLACK, LIKE MY MEN&quot;</h2>
		<br/>
		<form action="index.php" method="post">
			<input type="text" name="search" value="<?= $_POST["search"] ?>" placeholder="SEARCH FOR COFFEE HERE..."/>
			<button type="submit">
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
					<path d="M23.822 20.88l-6.353-6.354c.93-1.465 1.467-3.2 1.467-5.059.001-5.219-4.247-9.467-9.468-9.467s-9.468 4.248-9.468 9.468c0 5.221 4.247 9.469 9.468 9.469 1.768 0 3.421-.487 4.839-1.333l6.396 6.396 3.119-3.12zm-20.294-11.412c0-3.273 2.665-5.938 5.939-5.938 3.275 0 5.94 2.664 5.94 5.938 0 3.275-2.665 5.939-5.94 5.939-3.274 0-5.939-2.664-5.939-5.939z"/>
				</svg>
			</button>
		</form>

		<br/>

		<table cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<td> Item Name </td>
					<td> Description </td>
					<td> Price </td>
				</tr>
			</thead>
			<tbody>
			<?php

			for ($i = 0; $i < count($A); $i++)
				echo "<tr><td>" . $A[$i]["name"] . "</td><td>" . $A[$i]["descr"] . "</td><td>" . $A[$i]["price"] . "</td></tr>";
			 ?>
			</tbody>
		</table>

	</body>
</html>
