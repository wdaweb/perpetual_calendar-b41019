<!-- 爆肝歷 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>爆肝月曆製作</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    
        table{
            width:700px;
            margin:auto;
            background: #ccc;
            border:1px solid #333;
        }
        table  td {
            border:1px solid #FFF;
            text-align:center;
            padding:10px 0;
            width: 100px;
            height: 75px;
        }
        table td:hover{
        background-color: #FFF842;
        color: #403E10;
        font-weight: bold;
        
        box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
        transform: translate3d(6px, -6px, 0);
        
        transition-delay: 0s;
            transition-duration: 0.4s;
            transition-property: all;
        transition-timing-function: line;
        }
        .today{
            background: #777;
            color: #FFF;
        }
        .now{
            /* background-color: #55608f; */
            font-size: 20px;
            /* line-height: 1px; */
            text-transform: lowercase;
            color: #FFF;
        }
        thead{
            background-color: #55608f;
            color: #FFF;
        }
        
        .bigcontainer{
            background: #AAA;
        }
        
        a,a:hover{
            font-size: 10px;
            color: #000;
        }
        
        .mark{
            color: #F00;
            opacity: 0.8;
            background: ;
        }
       

    </style>

</head>
<body>
<div class="bigcontainer">
<h3>月曆製作</h3>

<?php
if(isset($_GET['month'])){
    $thisMonth=$_GET['month'];
}else{
    $thisMonth=date('m');
}
if(isset($_GET['year'])){
    $thisYear=$_GET['year'];
}else{
    $thisYear=date('Y');
}

// switch($thisMonth){
//     case "a":
//         $thisMonth=$_GET['month'];
//     break;
//     default :
//         $thisMonth=date('m');
//     break;
// }

// switch($thisYear){
//     case isset($_GET['year']):
//         $thisYear=$_GET['year'];
//     break;
//     case !isset($_GET['year']):
//         $thisYear=date('Y');
//     break;
// }




// if($thisMonth>=12){
//     $nextMonth=1;
//     $nextYear=$thisYear+1;
// }else{
//     $nextMonth=$thisMonth+1;
//     $nextYear=$thisYear;

// }
// if($thisMonth<=1){
//     $prevMonth=12;
//     $prevYear=$thisYear-1;
// }else{
//     $prevMonth=$thisMonth-1;
//     $prevYear=$thisYear;
// }


switch($thisMonth>=12){
    case"a":
    $nextMonth=1;
    $nextYear=$thisYear+1;
    break;
    default:
    $nextMonth=$thisMonth+1;
    $nextYear=$thisYear;
}

switch($thisMonth<=1){
    case"a":
        $prevMonth=12;
        $prevYear=$thisYear-1;
    break;
    default:
    $prevMonth=$thisMonth-1;
    $prevYear=$thisYear;
}



// if(isset($_GET['month']) && isset($_GET['year'])){
//     $thisYear=$_GET['year'];
//     $thisMonth=$_GET['month'];
// }else{
//     $thisYear=date('Y');
//     $thisMonth=date('m');
// }


// $thisMonth=date('m');
    // echo "這個月=>".$thisMonth;
    // echo "<br>";
$firstDate=strtotime($thisYear."-".$thisMonth."-".'1');
$monthDays=date('t',$firstDate);
    // echo "這個月天數=>".$monthDays;
    // echo "<br>";
//  echo $firstDate;
// $firstDate2=date('Y年m月');
//  echo $firstDate2;
$startDayWeek=date('w',$firstDate);
    // echo "第一天星期=>".$startDayWeek;
    // echo "<br>";
// $monthDays1 = date('t',strtotime("{$thisYear}-{$thisMonth}"));
// echo $monthDays1;
$year;
// echo $thisYear;

$getDate= date("Y年m月d日");
// echo $getDate;




?>
<div>
<span  class="today">今天是<?=$getDate;?></span>
</div>

<?php
echo "<br>";
?>

<div class='justify-content-between d-flex m-auto' style="width:750px">
<button type="button" class="btn btn-light btn-sm"><a href="calendar.php?year=<?=$prevYear;?>&month=<?=$prevMonth;?>">上一個月</a></button>
<span  class="now"><?=$thisYear;?>年<?=$thisMonth;?>月</span>
<button type="button" class="btn btn-light btn-sm"><a href="calendar.php?year=<?=$nextYear;?>&month=<?=$nextMonth;?>">下一個月</a></button>
</div>

<?php
echo "<br>";
?>

<table>
    <thead>
    <tr>
        <td>日</td>
        <td>一</td>
        <td>二</td>
        <td>三</td>
        <td>四</td>
        <td>五</td>
        <td>六</td>
    </tr>
    </thead>
    <?php
$event=[
    '1-1'=>'元旦',
    '2-14'=>'情人節',
    '3-8'=>'婦女節',
    '4-1'=>'愚人節',
    '8-8'=>'父親節',
    '9-28'=>'教師節',
    '10-10'=>'雙十節',
    '10-30'=>'萬聖節',
    '12-25'=>'聖誕節',
    '12-31'=>'跨年'
];

for($i=0; $i<6;$i++){
    echo "<tr>";
    for($j=0;$j<7;$j++){

        echo "<td>";
        $date='';
        if($i==0 && $j<$startDayWeek){
            echo "&nbsp;";
        }else if((($i*7) + ($j+1) - $startDayWeek)>$monthDays){
            echo "&nbsp;";
        }else{
            $date=(($i*7) + ($j+1) - $startDayWeek);
        
        }
        echo $date;
        if(!empty($event[$thisMonth.'-'.$date])){
            echo "<br>" ;
            echo "<div class='mark'>";
            echo $event[$thisMonth.'-'.$date];
            echo "</div>";
         };
        echo "</td>";
    }
    echo "</tr>";



}

?>
</table>
<?php
if(0<=0){
    echo (($i*7) + ($j+1) - $startDayWeek);
}
?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>