<?php
	Class Application{

		function __construct(){//생성자 : 클래스가 로드될 때 자동으로 실행
			$ctr = $this->getParam()->type."Controller";
			new $ctr();
		}

		function getParam(){//url 주소를 변수로 저장
			if (isset($_GET['param'])) $get = explode("/", $_GET['param']);
			$param['type'] = isset($get[0]) && $get[0] != "" ? $get[0] : "main";
			$param['page'] = isset($get[1]) && $get[1] != "" ? $get[1] : NULL;
			$param['idx'] = isset($get[2]) && $get[2] != "" ? $get[2] : NULL;
			$param['page_num'] = isset($get[2]) && $get[2] != "" ? $get[2] : "1";
			return (object)$param;//object 형식으로 반환
		}

	}