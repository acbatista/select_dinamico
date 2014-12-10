<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="iso-8859-1">
    <title>Select com Jquery e PHP</title>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            $("select[name=estado]").change(function(){
                $("select[name=cidade]").html('<option value="0">Carregando...</option>');

                $.post("cidades.php",
                    {estado:$(this).val()},
                    function(valor){
                        $("select[name=cidade]").html(valor);
                    }
                )

            })
        })

    </script>
</head>

<body>
<form action="" method="post">
    <select name="estado">
        <option value="0">Escolha um Estado</option>
        <?php
        mysql_connect("localhost", "root", "root");
        mysql_select_db("select_dinamico");

        $sql = "SELECT * FROM tb_estados ORDER BY nome ASC";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<option value="'.$ln['id'].'">'.$ln['nome'].'</option>';
        }
        ?>

    </select>

    <select name="cidade">
        <option value="0" disabled="disabled">Escolha um Estado Primeiro</option>
    </select>
</form>
</body>
</html>