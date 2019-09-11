<?php

CONST HOST = "llamaaqui.ml:3306";
CONST USER = "llamaaqui";
CONST PASS = "entra21@Blusoft";
CONST DB   = "llamaaqu_master";

$con = mysqli_connect(HOST, USER, PASS, DB);

$sql1 = "SELECT * FROM estado";

$query1 = mysqli_query($con, $sql1);



?>


Estado<br>
<select>
	<option value="">Selecione o estado</option>

	<?php while ($resultado1 = mysqli_fetch_array($query1)) { ?>

		<option value="<?=$resultado1['Id_estado']?>"><?=utf8_encode($resultado1['Nome_estado'])?></option>

	<?php } ?>

</select>

<br><br>

Cidade<br>
<select>
	<option value="">Selecione a cidade</option>
	
</select>