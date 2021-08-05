<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link rel="stylesheet" href="mainhome.css">
</head>

<body dir="rtl">
    <div class="background">
    <?php //Connexion à la base de données
    $cnx->connection = require("connexion.php");

    $sql="SELECT `etab`,`code_etab`, `nom_direct` , `doti`,`code_gresa`  FROM `etablis_parc` WHERE `code_etab`='".$_SESSION['username']."' and `doti`='".$_SESSION['password']."'";
    $data=mysqli_query($cnx, $sql);
    //$affichage = mysqli_fetch_array($sql);

    ?>

    <section>
      <div class="container">
        <h3>إحصاء العتاد المعلوماتي بالمؤسسات التعليمية التابعة للمديرية الإقليمية بتطوان</h3>
        <div class="line"></div>
        <table class="main_information" style="width:300px" >
        <?php 
        while ($affichage = mysqli_fetch_assoc($data)) { ?>
            <tr><th style="width:120px">اسم المؤسسة:</th>
                <th><?php echo $affichage['etab']; ?></th>
            <tr><th style="width:120px">رمز GRESA:</th>
                <th><?php echo $affichage['code_gresa']; ?></th>
            <tr><th style="width:120px">اسم مدير المؤسسة:</th>
                <th><?php echo $affichage['nom_direct']; ?></th>
        <?php } ?>
        </table>
        
        <a class="logout_button" href="login.php">تسجيل الخروج</a>

        <div class="centrage_blocs">
            <div class="blocs_top_div">
                <div class="blocs_top">
                    <div class="bloc_background"><a href="institution.php?id_lieu=1"><p> جرد العتاد المعلوماتي المتواجد بالجناح الإداري</p></a></div>
                    <p dir=ltr class="total">Total : <?php 
                                            $query = "SELECT SUM(nombre) As sum FROM parc_info where code_etab = '".$_SESSION['username']."' and lieu_parc = '1' and existe='1'";
                                            $query_result = mysqli_query($cnx, $query);
                                            while($row6 = mysqli_fetch_assoc($query_result)){
                                            $output  = $row6['sum'] ;
                                             }
                                            echo $output; 
                                            if(empty($output)){
                                                echo "0";}?> </p>
                </div>

                <div class="blocs_top">
                    <div class="bloc_background"><a href="institution.php?id_lieu=2"><p>جرد العتاد المعلوماتي المتواجد بالجناح التربوي</p></a></div>
                    <p dir=ltr class="total">Total : <?php 
                                            $query = "SELECT SUM(nombre) As sum FROM parc_info where code_etab = '".$_SESSION['username']."' and lieu_parc = '2' and existe='1'";
                                            $query_result = mysqli_query($cnx, $query);
                                            while($row6 = mysqli_fetch_assoc($query_result)){
                                            $output  = $row6['sum'] ;
                                             }
                                            echo $output; 
                                            if(empty($output)){
                                                echo "0";}?></p>
                </div>

                <div class="blocs_top">
                    <div class="bloc_background"><a href="institution.php?id_lieu=3"><p>جرد العتاد المعلوماتي المتواجد بالمكتبة</p></a></div>
                    <p dir=ltr class="total">Total : <?php 
                                            $query = "SELECT SUM(nombre) As sum FROM parc_info where code_etab = '".$_SESSION['username']."' and lieu_parc = '3' and existe='1'";
                                            $query_result = mysqli_query($cnx, $query);
                                            while($row6 = mysqli_fetch_assoc($query_result)){
                                            $output  = $row6['sum'] ;
                                             }
                                            echo $output;
                                            if(empty($output)){
                                                echo "0";} ?></p>
                </div>
            </div>

            <div class="blocs_bas_div">
                <div class="blocs_bas">
                    <div class="bloc_background"><a href="institution.php?id_lieu=4"><p>جرد العتاد المعلوماتي المتواجد بقاعة جيني</p></a></div>
                    <p dir=ltr class="total">Total : <?php 
                                            $query = "SELECT SUM(nombre) As sum FROM parc_info where code_etab = '".$_SESSION['username']."' and lieu_parc = '4' and existe='1'";
                                            $query_result = mysqli_query($cnx, $query);
                                            while($row6 = mysqli_fetch_assoc($query_result)){
                                            $output  = $row6['sum'] ;
                                             }
                                            echo $output;
                                            if(empty($output)){
                                                echo "0";} ?></p>
                </div>

                <div class="blocs_bas">
                    <div class="bloc_background"><a href="institution.php?id_lieu=5"><p>جرد العتاد المعلوماتي المتواجد بقاعة الإعلاميات</p></a></div>
                    <p dir=ltr class="total">Total : <?php 
                                            $query = "SELECT SUM(nombre) As sum FROM parc_info where code_etab = '".$_SESSION['username']."' and lieu_parc = '5' and existe='1'";
                                            $query_result = mysqli_query($cnx, $query);
                                            while($row6 = mysqli_fetch_assoc($query_result)){
                                            $output  = $row6['sum'] ;
                                             }
                                            echo $output;
                                            if(empty($output)){
                                                echo "0";} ?></p>
                </div>

                <div class="blocs_bas">
                    <div class="bloc_background"><a href="institution.php?id_lieu=6"><p>جرد العتاد المعلوماتي المتواجد بالمخزن</p></a></div>
                     <p dir=ltr class="total">Total : <?php 
                                            $query = "SELECT SUM(nombre) As sum FROM parc_info where code_etab = '".$_SESSION['username']."' and lieu_parc = '6' and existe='1'";
                                            $query_result = mysqli_query($cnx, $query);
                                            while($row6 = mysqli_fetch_assoc($query_result)){
                                            $output  = $row6['sum'] ;
                                             }
                                            echo $output;
                                            if(empty($output)){
                                                echo "0";} ?></p>
                </div>
            <!-- Il faut configurer la table des éléments informatiques pour calculer le total -->
            </div>
        </div>
    </section>
    
    

    <section>
        <table class="table_calcul">
        <?php 
        $sql2="SELECT * FROM `type_parc_info`";
        // $sql3="SELECT parc_info.nombre, etablis_parc.code_etab, parc_info.code_etab, type_parc_info.id, parc_info.type_parc  FROM `parc_info`, `etablis_parc` , `type_parc_info` WHERE etablis_parc.code_etab= parc_info.code_etab AND etablis_parc.existe='1' ";
        $compteur=1;
        //$sql3="SELECT SUM(nombre), etablis_parc.code_etab, parc_info.code_etab, type_parc_info.id, parc_info.type_parc FROM `parc_info`, `etablis_parc` , `type_parc_info` WHERE parc_info.type_parc = $compteur AND etablis_parc.code_etab= parc_info.code_etab AND etablis_parc.existe='1' ";
        $sql3= "SELECT parc_info.type_parc, parc_info.existe, SUM(nombre) AS total FROM parc_info GROUP BY parc_info.type_parc, parc_info.existe ORDER BY parc_info.type_parc";
        $data2=mysqli_query($cnx, $sql2);
        $data3=mysqli_query($cnx, $sql3);
        $num1=0;
        $num2=1;
        $compteur=1;
        ?>
        <tr class="tr_calcul" id="first_row"><th class="th_calcul">نوع العتاد المعلوماتي</th>
        <?php
        while ($affichage2 = mysqli_fetch_assoc($data2)) { ?>
                <td class="td_calcul_first"><?php $result[$num1]=$affichage2['nomar']; echo $result[$num1]; $num1++; ?></td>

        <?php } ?>
        </tr>
            <tr class="tr_calcul"><th class="th_calcul">العدد الإجمالي</th>
            <?php $query = "SELECT * from type_parc_info ";
                  $result1 = mysqli_query($cnx,$query);?>

            <?php while($row1 = mysqli_fetch_array($result1)){ ?>
                <td class="td_calcul">
                    <?php 

                    $query = "SELECT SUM(nombre) As sum FROM parc_info where code_etab = '".$_SESSION['username']."' and existe='1' and type_parc = '$row1[0]' ";
                    $query_result = mysqli_query($cnx, $query);
                    while($row6 = mysqli_fetch_assoc($query_result)){
                    $output  = $row6['sum'] ;
                    echo $output;
                    if(empty($output)){
                        echo "0";
                    }
            }} ?>




                    </td>
        
        <?php  ?>
        </tr>
            
        </table>
        </section>
        </div>
        </body>

            




