<?php

    class Usuario{

        private $id;
        private $nome;
        private $senha;
        private $carteira;
        private $admin;

        public function getId():int{
            return $this->id;
		}

		public function setId($id):void{
            $this->id = $id;
		}

		public function getNome():string{
            return $this->nome;
		}

		public function setNome($nome):void{
            $this->nome = $nome;
		}

		public function getSenha():string{
            return $this->senha;
		}

		public function setSenha($senha):void{
            $this->senha = $senha;
		}

		public function getCarteira():float{
            return $this->carteira;
		}

		public function setCarteira($carteira):void{
            $this->carteira = $carteira;
		}

		public function getAdmin():int{
            return $this->admin;
		}

		public function setAdmin($admin):void{
            $this->admin = $admin;
		}        
        
    }