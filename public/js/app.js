$(function(){

	$("#memberDelete > .btn").click(function(e){
		e.preventDefault();
		if (confirm('회원탈퇴 하시겠습니까?')) {
			$("#memberDelete").submit();
		}
	})

})