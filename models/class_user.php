<?php

class Usuario{
        //ATRIBUTOS PRINCIPALES
        private $dni;
        private $nombre;
        private $email;

        public $exist;

        //OTROS ATRIBUTOS REQUERIDOS
        function __construct($_dni)
        {
            $this->valid = False;
            $this->dni = $_dni;
            $this->load_from_DB();
        }
        //METODOS GET
        private function  load_from_DB(){
            try{
                $sql_manager = new SqlManager();     
                $sql_manager->select_from("inscripcion","ins_dni = '".$this->dni."'");
                if($sql_manager->get_result_rows() != 0)
                    {
                        $this->nombre = $sql_manager->get_value_at("ins_nom");
                        $this->email = $sql_manager->get_value_at("ins_mai");
                        $verificado = $sql_manager->get_value_at("cod_est");
                        if($verificado == "VER")
                            $this->valid = True;
                        else
                            $this->valid = False;
                    }
                else
                    throw new Exception("error", 1);
                
                }
            catch(Exception $e)
            {
                $this->valid = False;
                return;
            }
        }
       
        public  function getid()
        {
            return $this->dni;
        }
        public  function getnombre()
        {
            return $this->nombre;
        }
        public  function getemail()
        {
            return $this->email;
        }
        public  function getinfo()
        {
            return "ID: ".$this->getid() ."<br>".
                    "Nombre :".$this->getnombre() ."<br>".
                    "Email :".$this->getemail() ."<br>";
        }

    }
?>
