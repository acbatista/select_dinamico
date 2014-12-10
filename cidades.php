<meta charset="UTF-8">
<?php

mysql_connect("localhost", "root", "root");
mysql_select_db("select_dinamico");

$estado = $_POST['estado'];

$sql = "SELECT * FROM tb_cidades WHERE estado = '$estado' ORDER BY nome ASC";
$qr = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($qr) == 0){
    echo  '<option value="0">'.htmlentities('Não cidades nesse estado').'</option>';

}else{
    while($ln = mysql_fetch_assoc($qr)){
        echo '<option value="'.$ln['id'].'">'.$ln['nome'].'</option>';
    }
}

?>