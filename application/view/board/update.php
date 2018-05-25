<fieldset><legend>글수정 페이지</legend>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="update">
		<input type="text" name="writer" value="<?php echo $this->view->writer; ?>" readonly required><br>
		<input type="text" name="subject" placeholder="글제목" value="<?php echo $this->view->subject; ?>" required><br>
		<textarea name="content" cols="30" rows="10" placeholder="글내용" required><?php echo $this->view->content; ?></textarea><br>
		<input type="file" name="file"><br>
		<button type="submit">글작성</button>
	</form>
</fieldset>
<a href="/">메인으로</a>