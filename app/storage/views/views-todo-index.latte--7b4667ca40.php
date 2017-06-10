<?php
// source: E:\sjm\app/views/todo/index.latte

use Latte\Runtime as LR;

class Template7b4667ca40 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<html>
<title>任务管理</title>
 <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<body>
            <div style="width:60%">
                <div class="row">
                    <div class="input-group">
                      <input type="text" class="form-control" name="title" placeholder="添加任务">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">添加</button>
                      </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
                <div  >

                    <ul class="list-group">
<?php
		$iterations = 0;
		foreach ($todos as $item) {
			?>                      <li class="list-group-item"><?php echo LR\Filters::escapeHtmlText($item->title) /* line 19 */ ?></li>
<?php
			$iterations++;
		}
?>
                    </ul>
                </div>
            </div>
</body>
<script src="/public/js/jquery/jquery-2.1.4.min.js"></script>
<script src="/public/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(function(){
    })

</script>
</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 18');
		
	}

}
