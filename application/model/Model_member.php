<?php
	Class Model_member extends Model{

		function idChk(){
			$this->sql = "SELECT * FROM member where id='{$_POST{'id'}}'";
			return $this->cnt();
		}

		function login(){
			$this->sql = "SELECT * FROM member where id='{$_POST['id']}' and pw='{$_POST['pw']}'";
			return $this->fetch();
		}

		function process(){
			$this->action = $_POST['action'];
			$this->table = "member";
			$cancel = "/action";
			access($this->idChk() != 0,"중복된 아이디 입니다.");
			$column = $this->get_column($_POST,$cancel);
			access($this->get_query($column),"회원가입이 완료되었습니다.","/");
		}

	}