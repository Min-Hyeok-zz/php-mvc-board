<?php
	//세선 스타트
	session_start();

	//경고창
	function alert($msg){
		echo "<script>alert('{$msg}');</script>";
	}

	//페이지 이동
	function move($url = false){
		echo "<script>";
			echo $url ? "location.href='{$url}'" : "history.back();";
		echo "</script>";
		exit;
	}

	//조건문,경고창,페이지 이동
	function access($bool,$msg,$url = false){
		if ($bool) {
			alert($msg);
			move($url);
		}
	}

	//비회원이면 뒤로
	function loginChk(){
		access(!isset($_SESSION['member']),"회원만 접근 가능합니다.");
	}

	//회원이면 뒤로
	function memberChk(){
		access(isset($_SESSION['member']),"이미 로그인 하셨습니다.");
	}

	//파일업로드
	function file_upload($file){
		$name = $file['name'];//파일이름 저장
		$tmp_name = $file['tmp_name'];//파일 상세정보 저장
		access($tmp_name == "","파일이 업로드 되지 않았습니다.");//파일정보 없으면 뒤로
		if (is_uploaded_file($tmp_name)) {//파일이 업로드 되었을 경우
			$change_name = time().rand(0,99999);//파일이름 중복 안되게 change_name 생성
			if (move_uploaded_file($tmp_name, _DATA.$change_name)) {//파일이 해당경로에 change_name으로 이름 바꿔서 업로드됨
				return $change_name;//change_name 반환
			}
		}
	}

	//파일 용량 계산(MB단위)
	function get_size($size){
		$size /= 1024*1024;
		if ($size > 1) {
			$size = number_format($size)."MB";
		} else{
			$size = ($size*1024);
			$size = substr($size, 0,5)."KB";
		}
		return $size;
	}

	//정의되지 않는 객체가 생성되었을 때 자동으로 실행
	function __autoload($className){//$className == new (클래스 이름) <-
		$className = strtolower($className);//클래스 이름 소문자로
		$className2 = preg_replace("/(model|application)(.*)/", "$1", $className);
		switch ($className2) {
			case 'model': $dir = _MODEL; break;
			case 'application': $dir = _APP; break;
			default: $dir = _CTR; break;
		}
		require_once("{$dir}{$className}.php");
	}