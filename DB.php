<?php

    class DB 
    {

        private $info = [
                            'DB_NAME' => 'asterisk',
                            'DB_USER' => 'consult',
                            'DB_PASS' => 'consult',
							'DB_HOST' => 'localhost'

                        ];

        private $pdo;                

        function __construct()
        {
            try {
                
                $this->pdo = new PDO('mysql:host=' . $this->info['DB_HOST'] . ';dbname=' . $this->info['DB_NAME'], $this->info['DB_USER'], 
                                      $this->info['DB_PASS'],
                                      
                                      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                      
                                    );

                return $this->pdo;                    

            } catch (PDOException $e) {
                
                die('No se pudo conectar a la Database: ' . $e->getMessage());
            }                      
            
		}

	function showInfo($query) {

               try {

                    $result = $this->pdo->query($query);

                    return ($result->rowCount() > 0) ? $result : false;

               } catch (Exception $e) {

                    return false;
               }

        }
        
        
    
    }

