<p>메인 페이지</p>
	<?php foreach ($this->list as $data): ?>
	<fieldset>
		<p>작성자 : <?php echo $data->writer; ?></p>
		<p>제에목 : <a href="/board/view/<?php echo $data->idx; ?>"><?php echo $data->subject; ?></a></p>
	</fieldset>
	<?php endforeach ?>
	
<?php if (isset($_SESSION['member'])): ?>
	<a href="/board/write">글작성</a>
<?php endif ?>