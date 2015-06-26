<?php 
function breadcrumb($datas){
	$nomor = count($datas);
	$i = 0;
	echo"<ul class=\"breadcrumb\">";
	foreach($datas as $data) {
	  $i = $i + 1;
	  if($i === $nomor) {
	    echo "<li>".$data."</li>";
	  }else{
	  	echo "<li><a href=\"#\">".$data."</a></li>";
	  }

	}   
	echo "</ul>";
}

function flash($method,$message){
	echo "
	<div class=\"alert alert-$method alert-dismissible\" role=\"alert\">
	  <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
	  $message
	</div>
	";
}

function hapus($id){
	return "<form action=\"\" method=\"POST\">
		<input type=\"hidden\" name=\"id\" value=$id>
		<button name=\"method\" rel=\"tooltip\" data-placement=\"top\" data-original-title=\"Hapus data\" value=\"delete\" class=\"btn btn-danger btn-xs\" onclick='return confirm(\"anda yakin menghapus? \")'>
			<i class=\"glyphicon glyphicon-trash\"></i>
		</button>
	</form>";
}

 ?>