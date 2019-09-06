<?php
class LoginDefiner{
    private $id;
    const id_file = "resources/id_file.txt";

    public function getFreeID(){
        if(!file_exists(self::id_file)){
            $creation = fopen(self::id_file, 'w');
            fwrite($creation, "");
            fclose($creation);
        }
        $my_file = file(self::id_file);
        $ctr = 0;
        if(count($my_file) == 0){
            $this->id = 1;
            return;
        }
        foreach ($my_file as $id){
            $ctr++;
            $count = count($my_file);
            if($ctr == count($my_file)){

                $this->id = intval($id) + 1;
                return;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function takeID(){
        $my_file = fopen(self::id_file, 'a');
        fwrite($my_file, $this->id.PHP_EOL);
        fclose($my_file);
        return $this->id;
    }
}
?>