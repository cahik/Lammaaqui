<?php

require_once "classes/site.class.php";

$teste = new Site();

$sql1 = "SELECT * FROM estado";


?>


Estado<br>
<select>
	<option value="">Selecione o estado</option>

	<?php while ($resultado1 = mysqli_query($query1)) { ?>

		<option value="<?=$resultado1['Id_estado']?>"><?=$resultado1['Nome']?></option>

	<?php } ?>

</select>

<br><br>

Cidade<br>
<select>
	<option value="">Selecione a cidade</option>
	
</select>