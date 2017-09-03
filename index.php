<?php
include 'form.php';
include 'neuralnetwork.php';

if(isset($_POST['x0'])){
	$x0 = $_POST['x0'];
	$x1 = $_POST['x1'];
	echo "X0 = ".$x0."<br>";
	echo "X1 = ".$x1."<br>";
	echo "Bias = 1 <br>";
	$hasil = 0;
	        for($y=0; $y < $kolom-1; $y++){
	            $hasil+= ${"x".$y} * ${"w".$y};
	        }
	        $hasil+= $bias * $w2;
	        echo "hasil perhitungan : " . +$hasil;
	        echo "<br>";
	        //pengecekan threshold
	        if($hasil < $threshold)
	            $output = 0;
	        else
	            $output = 1;
	        if($output == 0)
	            $ket = "tidak hipertensi";
	        else
	            $ket = "hipertensi";
	        echo "Hasil : ".$ket."<br>";
}

?>