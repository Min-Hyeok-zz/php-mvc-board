<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>MVC 게시판</title>
<style>
	*{list-style: none;text-decoration: none;outline: none;color: inherit;}
</style>
</head>
<body>
	<header>
		<nav>
			<ul>
				<?php if (isset($_SESSION['member'])): ?>
				<li><a href="/member/logout">로그아웃</a></li>
				<li><a href="#!"><?php echo $_SESSION['member']->name ?></a></li>
				<?php else: ?>
				<li><a href="/member/login">로그인</a></li>
				<li><a href="/member/join">회원가입</a></li>
				<?php endif ?>
			</ul>
		</nav>
	</header>