

<form method="post" enctype="multipart/form-data">
	<input type="file" name="docx" />
	<button type="submit">Parse DOCX file</button>
</form>
<hr />
<?php 
if(isset($_FILES['docx'])){
		require_once "docxHtml.php";
	
	$docx = new docxHtml\docxHtml($_FILES['docx']['tmp_name']);
	
	echo $docx->render();
	
}

//example