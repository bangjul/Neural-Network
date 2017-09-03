<?php
$myfile = fopen("data-hipertensi.txt", "r") or die("Unable to open file!");

$kolom = substr_count(fgets($myfile), ",");
$kolom+=1;
$bias = 1;
while(!feof($myfile)) {
	$data=fgets($myfile);
	$array=explode(",", $data);
	$arrayku[] = $array;

}
for($x=0; $x<sizeof($arrayku); $x++){
       
    for($y=0; $y<$kolom;$y++){
        if($y<$kolom-1){
            $input_sequence[$x][$y] = $arrayku[$x][$y];
        }else{
            $target_sequence[$x] = $arrayku[$x][$y];
        }
    }
}

for($x=0; $x<$kolom; $x++){
	echo "w$x = " ;
    ${"w".$x} = rand (-1*10, 1*10) / 10;
	echo ${"w".$x};
	echo "<br>";
}

$threshold = 0;
$iterasi = 0;
$miu = 0.5;
echo "==============================================<br>";

do{
    $i = $iterasi + 1;
    $baris = 0;
    $hasil = 0;
    echo "Iterasi ke " . $i . "<br>";
    $true = 0;
    do{
        $hasil = 0;
        echo "<br>";
        echo "> Data ke " . $baris . "<br>";
        for($y=0; $y < $kolom-1; $y++){
            $hasil+= $input_sequence[$baris][$y] * ${"w".$y};
        }
        $hasil+= $bias * $w2;
        echo "hasil perhitungan : " . +$hasil;
        echo "<br>";
        //pengecekan threshold
        if($hasil < $threshold)
            $output = 0;
        else
            $output = 1;
        
        echo "hasil threshold : " . +$output;
        echo "<br>";
        $err = $target_sequence[$baris] - $output;
        echo "error : " . +$err;
        echo "<br>";
        if($err != 0){
            echo "salah";
            echo "<br>";
            for($x=0; $x<$kolom; $x++){
                if($x!=$kolom-1)
                    echo "w$x   |";
                else
                    echo "w$x";
            }
            echo "<br>";
            for($x=0; $x<$kolom; $x++){
                if($x!=$kolom-1){
                    ${"w".$x} = ${"w".$x} +  $miu * $input_sequence[$baris][$x]  * $err;
                }else{
                    ${"w".$x} = ${"w".$x} +  $miu * $bias* $err;
                }
                echo ${"w".$x}."    |";
            }
            echo "<br>";
            $true = 0;
        }else{
        $true++;        }
        $baris++;
    }while($baris<sizeof($input_sequence));
    $iterasi++;
    echo "=============================================<br>";
}while($iterasi<10&&$true!=sizeof($input_sequence));

echo "Jumlah Iterasi : ". $iterasi ."<br>";
for($x=0; $x<$kolom; $x++){
    if($x!=$kolom-1)
        echo "w$x   |";
    else
        echo "w$x";
}
echo "<br>";
for($x=0; $x<$kolom; $x++){
    if($x!=$kolom-1)
        echo ${"w".$x}."    |";
    else
        echo ${"w".$x};
}
echo "<br>============================================<br>";
echo "<br>";
?>