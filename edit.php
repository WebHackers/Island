<DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Editing</title>
	<link rel="stylesheet" type="text/css" href="./public/uikit/css/uikit.gradient.min.css">
	<script type="text/javascript" src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="./public/uikit/js/uikit.min.js"></script>
	<script type="text/javascript" src="./public/ckeditor/ckeditor.js"></script>
</head>

<body>
	<div class="uk-grid">
    	<div class="uk-width-2-10"><br></div>
    	<div class="uk-width-6-10">
    		<br><br>
    		<form class="uk-form">
    			<fieldset data-uk-margin>
        		<legend>Editing</legend>
        		<br>
        		<!-- This is the container enabling the JavaScript -->
        		<!--<div class="uk-button-dropdown" data-uk-dropdown style="float:right;">-->

    			<!-- This is the button toggling the dropdown -->
    			<!--<button class="uk-button">Push To <i class="uk-icon-sort-down"></i></button>-->

    			<!-- This is the dropdown -->
    			<!--<div class="uk-dropdown uk-dropdown-small">
        			<ul class="uk-nav uk-nav-dropdown">
            			<li><a href="">QQ</a></li>
            			<li><a href="">Weibo</a></li>
            			<li><a href="">Wechat</a></li>
        			</ul>
    			</div>

				</div>-->
				<!-- Set title and submit -->
        		<button class="uk-button uk-button-primary" type="button" data-uk-modal="{target:'#my-id'}" style="float:right;margin-right:20px;">Set title & Save</button>
    			</fieldset>
			</form>
			<!-- ckeditor -->
			<textarea rows="30" cols="50" name="editor01"></textarea>
			<script type="text/javascript">var editor = CKEDITOR.replace('editor01');</script>

    	</div>
	</div>

	<a href="#my-id" data-uk-modal></a>

	<div id="my-id" class="uk-modal">
    	<div class="uk-modal-dialog">
    	    <a class="uk-modal-close uk-close"></a>
    	    <br><br>
    	    <form class="uk-form">
    		<fieldset>
    			<div class="uk-grid">
    				<div class="uk-width-3-5">
        				<input id="title" type="text" placeholder="Input title" class="uk-form-large uk-width-1-1">
    				</div>
    				<div class="uk-width-2-5">
    					<button id="submit" class="uk-button-large uk-button" type="button" style="float:right;margin-right:60px;">Submit</button>
    				</div>
    			</div>
    		</fieldset>
			</form>
			<br><br>
			<div class="uk-grid">
				<div class="uk-width-1-4"><br></div>
    			<div class="uk-width-2-4">
					<button class="uk-button-danger uk-button uk-width-1-1 uk-modal-close" type="button">Cancel</button>
				</div>
			</div>
    	</div>
	</div>
	
<script type="text/javascript">
var query = window.location.href.split('?')[1];
var j = false;
var operation = 'save';

if (query) {
	var id = query.split('=')[1];

	$.post(
		'./class/alter.class.php',
		{
			id: id
		},
		function(data) {
			var data = data.split('&&&&&');

			$('#title').val(data[0]);
			editor.setData(data[1]);
		}
	);

	operation = 'alter';
}

	$('#submit').click(function() {
		if (j)return;
		j = true;
		var title = $('#title').val();
		var content = editor.document.getBody().getHtml();
		var myday = new Date();
		var time = 
		myday.getFullYear().toString()+'-'+
		(myday.getMonth()+1).toString()+'-'+
		myday.getDate().toString()+'-'+
		myday.getHours().toString()+'-'+
		myday.getMinutes().toString();

		if (!query) {
			var id = myday.getTime().toString();
		}
		else {
			var id = query.split('=')[1];
		}

		if(title==""||title==undefined) {
			alert('please input title!');
		}
		else if(content==""||content==undefined) {
			alert('article is empty!');
		}
		else {
			$.post(
				'./class/save.class.php',
				{
					operation: operation,
					id: id,
					time: time,
					title: title,
					content: content
				},
				function(data) {
					alert(data);
				}
			);
		}
	});

</script>
</body>
</html>