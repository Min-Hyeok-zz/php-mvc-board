<div id="write" class="form">
	<p class="title">글작성 페이지</p>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="insert">
		<label>
			<input type="text" name="writer" value="<?php echo $_SESSION['member']->name; ?>" readonly required>
		</label>
		<label>
			<input type="text" name="subject" placeholder="글제목" required>
		</label>
		<label>
			<textarea name="content" cols="30" rows="10" placeholder="글내용" required></textarea>
		</label>
		<label>
			<input type="file" name="file">
		</label>
		<button type="submit" class="btn">글작성</button>
	</form>
	<a href="/" class="btn">메인으로</a>
</div>