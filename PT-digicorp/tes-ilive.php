<?php

    class Satu{
        public $array=array();
        public function generate($user){
            $str = substr(str_shuffle('abcdefghijklmnopqerstuvwxyz'),0,20);
            $temp = array($user => [$str]);
            
            $count=0;
            if (count($this->array)===0){
                array_push($this->array, $temp);
                return $this->array;
            }else{
                for($i=0; $i<count($this->array);$i++){
                    if(isset($this->array[$i][$user])){
                        $count++;
                        if(count($this->array[$i][$user]) === 10){
                            array_splice($this->array[$i][$user],0,1);
                            array_push($this->array[$i][$user], $str);
                        }else{
                            array_push($this->array[$i][$user],$str);
                        }
                    }
                }
            }
            if($count <1){
                array_push($this->array, $temp);
            }
            return $this->array;
        }

        public function verifyToken($user, $token){
            for($i=0; $i<count($token);$i++){
                if(isset($token[$i][$user])){
                    array_splice($token[$i][$user],0,1);
                    return true;
                }
            }
            return false;
        }
    }

    $generate = new Satu();
    $generateToken = $generate->generate('bagus');
    var_dump($generate);
    echo "<hr>";
    $generateToken = $generate->generate('bagus');
    var_dump($generate);
    echo "<hr>";
    $generateToken = $generate->generate('dimas');
    var_dump($generate);
    echo "<hr>";

    $verify = new Satu();
    $verifyToken = $verify->verifyToken('dimas', $generateToken );
    var_dump($verifyToken);
    echo "<hr>";


    class Siswa{
        public $nrp, $nama, $daftarNilai;

        public function __construct($nrp="", $nama="", $daftarNilai=""){
            $this->nrp = $nrp;
            $this->nama = $nama;
            $this->daftarNilai = $daftarNilai;
        }
        public function daftarNilai(Nilai $nilai){
            $array = [$this->nrp, $this->nama, $nilai];
            return $array;
        }
        public function siswaBaru($siswa){
            return $siswa;
        }
        public function generateRandom(){

            $nama = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,10);

            $array = array("inggris", "indonesia", "italy");
            $randomMapel = array_rand($array, 1);
            $mapel = $array[$randomMapel];
            
            $nilai = rand(0,100);

            $array = ['nama' => $nama, 'mapel' => $mapel, 'nilai'=>$nilai];
            return $array;
        }
    }

    class Nilai {
        public $mapel, $nilai; 

        public function __construct($mapel="", $nilai=0){
            $this->mapel = $mapel;
            $this->nilai = $nilai;
        }
    }

    $nilai = new Nilai("",0);
    $siswa = new Siswa();
    $daftarNilai = $siswa->daftarNilai($nilai);
    var_dump($daftarNilai);
    echo "<hr>";

    $nilai = new Nilai("inggris",100);
    $siswa = new Siswa('123', 'bagus', $nilai);
    $siswaBaru = $siswa->siswaBaru($siswa);
    var_dump($siswaBaru);
    echo "<hr>";

    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";
    $generate = $siswa->generateRandom();
    var_dump($generate);
    echo "<hr>";


    class Warna{
        public $count = 0;
        public function array(){
            $array = array("merah", "kuning", "hijau");
            $this->count+=1;

            switch ($this->count) {
            case 1:
                return $array[0];
                break;
            case 2:
                return $array[1];
                break;
            case 3:
                return $array[2];
                break;
            default:
                $this->count= 0;
                return $this->array();
            }
        }
    }

    echo "<hr>";
    echo "3";
    echo "<br>";
    $classWarna = new Warna();
    $warna = $classWarna->array();
    var_dump($warna);
    echo "<hr>";
    $warna = $classWarna->array();
    var_dump($warna);
    echo "<hr>";
    $warna = $classWarna->array();
    var_dump($warna);
    echo "<hr>";
    $warna = $classWarna->array();
    var_dump($warna);
    echo "<hr>";
    $warna = $classWarna->array();
    var_dump($warna);
    echo "<hr>";
    $warna = $classWarna->array();
    var_dump($warna);
    echo "<hr>";
    $warna = $classWarna->array();
    var_dump($warna);
    echo "<hr>";
    $warna = $classWarna->array();
    var_dump($warna);
    echo "<hr>";

    class RandomInteger{
        function randomInteger(){
            $array = array(100,50,79,82,84);
            $maksOne = max($array);
            $newArray = array_diff($array, [$maksOne]);
            $maksTwo = max($newArray);
            var_dump($maksTwo);

            return $maksTwo;
        }

    }

    $randInteger = new RandomInteger();
    $integer = $randInteger->randomInteger();
    var_dump("nilai terbesar kedua ".$integer);
    echo "<hr>";

    class CountChar{
        public function countChar($string){
            foreach (count_chars($string,1) as $i => $val){
                echo "Huruf \"", chr($i), "\" muncul $val kali.<br>";
                echo "<hr>";
            }
        }
    }

    $char = new CountChar();
    $countChar = $char->countChar('aaaaaaabc');
    $countChar = $char->countChar('wellcome');


