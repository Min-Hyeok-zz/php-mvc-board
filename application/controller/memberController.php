<?php
	Class memberController extends Controller{

		//회원가입
		function join(){
			memberChk();
			if (isset($_POST['action'])) $this->model->process();
		}

		//로그인
		function login(){
			memberChk();
			if (isset($_POST['action'])) {
				$this->model->query("UPDATE member SET change_date=now() where id='{$_POST['id']}' and pw='{$_POST['pw']}'");
				$a = $this->model->login();
				access($a == "","아이디 또는 비밀번호가 일치하지 않습니다.");
				$_SESSION['member'] = $a;
				alert("로그인 되었습니다.");
				move('/');
			}
		}

		//로그아웃
		function logout(){
			loginChk();
			access(session_destroy(),"로그아웃 되었습니다.","/");
		}

		//마이페이지
		function mypage(){
			loginChk();
			if (isset($_POST['idx'])){
				$this->model->memberDelete();	
				session_destroy();
				alert("회원탈퇴가 완료되었습니다.");
				move('/');
			} 
		}
		
	}