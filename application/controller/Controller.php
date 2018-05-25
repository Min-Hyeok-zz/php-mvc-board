<?php
	Class Controller{

		function __construct(){//getParam 주소 가져옴,모델 require
			$this->param = Application::getParam();
			$model = "Model_{$this->param->type}";
			new $model();
			$this->model = new $model();
			$this->index();
		}

		//페이지 로드
		function index(){
			//$this->param->page 와 일치하는 함수가 있으면 그 함수 실행
			$method = isset($this->param->page) ? $this->param->page : "basic";
			if (method_exists($this, $method)) $this->$method();
			$this->header();
			$this->content();
			$this->footer();
		}

		function header(){
			include_once(_VIEW."header.php");
		}
		
		function content(){
			if (isset($this->param->page)) {
				include_once(_VIEW."{$this->param->type}/{$this->param->page}.php");
			} else{
				include_once(_VIEW."main.php");
			}
		}

		function footer(){
			include_once(_VIEW."footer.php");
		}

	}