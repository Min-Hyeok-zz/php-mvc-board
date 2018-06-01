<div id="main">
	<table class="list-table">
		<thead>게시글 리스트</thead>
	<ul class="list">
		<?php foreach ($this->list as $data): ?>
			<li><a href="/board/view/<?php echo $data->idx; ?>"><?php echo $data->subject; ?></a></li>
		<?php endforeach ?>
	</ul>
	</table>
	<div class="btn_group">
		<?php if (isset($_SESSION['member'])): ?>
			<a href="/board/write" class="btn">글작성</a>
		<?php endif ?>
	</div>
</div>
	