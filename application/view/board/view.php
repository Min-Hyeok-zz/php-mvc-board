<fieldset><legend>글보기 페이지</legend>
	<p>작성자 : <?php echo $this->view->writer; ?></p>
	<p>제에목 : <?php echo $this->view->subject; ?></p>
	<p>내애용 : <?php echo $this->view->content; ?></p>
	<p>작성일 : <?php echo $this->view->date; ?></p>
	<p>파이일 : <a href="/board/down/<?php echo $this->view->idx; ?>"><?php echo $this->view->file_name; ?> (<?php echo get_size($this->view->file_size); ?>)</a></p>
	<p>조회수 : <?php echo number_format($this->view->hit); ?></p>
	<?php if (isset($_SESSION['member'])): ?>
		<button onclick="if(confirm('삭제하시겠습니까?')) location.href='/board/delete/<?php echo $this->view->idx; ?>'">삭제</button>
		<a href="/board/update/<?php echo $this->view->idx; ?>">수정</a>
	<?php endif ?>
</fieldset>
<a href="/">메인으로</a>