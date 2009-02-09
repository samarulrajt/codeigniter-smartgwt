<html>
    <head>
        <title>Document</title>
    </head>
    <?php
    if( $_POST['Submit']){
        $distance = getDistanceBetweenPointsNew($_POST[LAT1], $_POST[LONG1], $_POST[LAT2],$_POST[LONG2]);

    }
//http://www.google.com/mapmaker?hl=en&q=Ba+hom&gw=30&ll=10.777567,106.690936&spn=0.005629,0.023518&z=16&ctype=0

    function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Km') {
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) +
        (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) *
            cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        switch($unit) {
            case "Mi": break;
                case "Km" : $distance = $distance * 1.609344;
                }return (round($distance,2));
            }


            ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <form name="form1" method="post" action="">
            <p>Point one Lat
                <input type="text" name="LAT1" value="<?=$_POST[LAT1]?>" >
                Long
                <input type="text" name="LONG1" value="<?=$_POST[LONG1]?>">
            </p>
            <p>Point two Lat
                <input type="text" name="LAT2" value="<?=$_POST[LAT2]?>">
                Long
                <input type="text" name="LONG2" value="<?=$_POST[LONG2]?>">
            </p>
            <p>
                <input type="submit" name="Submit" value="Submit">
            </p>
        </form>
        <? echo "<br>distance = ".$distance." Kms (as the crow flies)<br>"; ?>
    </body>
</html>
