<?php

    class Produto{

        private $id;
        private $descricao;
        private $quantidade;
        private $valor;

        public function getId():int{
            return $this->id;
		}

		public function setId($id):void{
            $this->id = $id;
		}

		public function getDescricao():string{
            return $this->descricao;
		}

		public function setDescricao($descricao):void{
            $this->descricao = $descricao;
		}

		public function getQuantidade():int{
            return $this->quantidade;
		}

		public function setQuantidade($quantidade):void{
            $this->quantidade = $quantidade;
		}

		public function getValor():float{
            return $this->valor;
		}

		public function setValor($valor):void{
            $this->valor = $valor;
		}        
        
    }