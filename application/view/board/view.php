<div class="content">
	<p class="title">글보기 페이지</p>
	<table class="table">
		<colgroup>
			<col>
			<col>
		</colgroup>
		<tbody>
			<tr>
				<td>작성자</td>
				<td><?php echo $this->view->writer ?></td>
			</tr>
			<tr>
				<td>글제목</td>
				<td><?php echo $this->view->subject ?></td>
			</tr>
			<tr>
				<td>글내용</td>
				<td><?php echo $this->view->content ?></td>
			</tr>
			<tr>
				<td>작성일</td>
				<td><?php echo $this->view->date ?></td>
			</tr>
			<?php if ($this->view->file_size > 0): ?>
			<tr>
				<td>파일</td>
				<td><a href="/board/down/<?php echo $this->view->idx; ?>"><?php echo $this->view->file_name; ?> (<?php echo get_size($this->view->file_size); ?>)</a></td>
			</tr>
			<?php endif ?>
			<tr>
				<td>조회수</td>
				<td><?php echo $this->view->hit ?></td>
			</tr>
			<?php if (isset($_SESSION['member'])): ?>
				<tr>
					<td>관리</td>
					<td>
						<a href="/board/update/<?php echo $this->view->idx; ?>" class="btn">수정</a>
						<button onclick="if(confirm('삭제하시겠습니까?')) location.href='/board/delete/<?php echo $this->view->idx; ?>'" class="btn">삭제</button>
					</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
	<a href="/" class="btn">메인으로</a>
	<div class="btn_group">
		<a href="<?php echo $this->next ?>" class="btn">다음</a>
		<a href="<?php echo $this->prev ?>" class="btn">이전</a>
	</div>
</div>
