<?php
	Class boardController extends Controller{

		//글작성 페이지
		function write(){
			loginChk();
			if (isset($_POST['action'])) $this->model->process();
		}

		//글보기 페이지
		function view(){
			$this->view = $this->model->getView();
			$this->prev = $this->model->prev();
			$this->next = $this->model->next();
			access($this->view == "","존재하지 않는 페이지 입니다.");
		}

		//글수정 페이지
		function update(){
			loginChk();
			$this->view();
			$this->write();
		}

		//파일 다운로드
		function down(){
			$data = $this->model->getView();
			header("Content-Disposition: attachment; filename=\"{$data->file_name}\"");
			readfile(_DATA.$data->change_name);
			exit;
		}

		//글 삭제
		function delete(){
			loginChk();
			$data = $this->model->getView();
			@unlink(_DATA.$data->change_name);
			$this->model->query("DELETE FROM board where idx='{$this->param->idx}'");
			alert("삭제되었습니다.");
			move("/");
		}

	}