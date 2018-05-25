<?php
	Class Model{
		
		function __construct(){//db연결
			$this->param = Application::getParam();
			$this->db = new PDO("mysql:host=localhost;dbname=mvc;charset=utf8;","root","");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);//mysql 정보를 object형식으로
		}

		//쿼리문 설정
		function query($sql = false){
			if ($sql) $this->sql = $sql;//$this->sql로 초기화
			$res = $this->db->query($this->sql);//$res에 쿼리정보 저장
			if (!$res) {//$res가 없을 경우 sql문,오류메세지 출력
				echo $this->sql;
				echo "<pre>";
				print_p($this->db->errorInfo());
				echo "</pre>";
			} else{
				return $res;//쿼리값 반환
			}
		}

		function fetch($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->fetch();
		}

		function fetchAll($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->fetchAll();
		}

		function cnt($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->rowCount();
		}

		//배열을 컬럼 형태로 반환
		function get_column($arr,$cancel){
			$cancel = explode("/", $cancel);
			$column = "";
			foreach ($arr as $key => $val) {
				if (!in_array($key, $cancel)) {
					$column .= ", {$key}='{$val}'";
				}
			}
			return substr($column, 2);
		}

		//action의 value값에 따라 쿼리문 변경
		function get_query($column){
			switch ($this->action) {
				case 'insert':
					$sql = "INSERT INTO {$this->table} SET ";
					break;
				case 'update':
					$sql = "UPDATE {$this->table} SET ";
					break;
				case 'delete':
					$sql = "DELETE FROM {$this->table} ";
					break;
			}
			$sql .= $column;
			return $this->query($sql);
		}

	}