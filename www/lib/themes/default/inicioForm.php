<div class="container" style="width:100%">
	<div class="content">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span6">
				<?php $this->load(isset($view['registro']) ? $view['registro'] : NULL, TRUE); ?>
			</div>
			<div class="span6">
				<?php $this->load(isset($view['inicio']) ? $view['inicio'] : NULL, TRUE); ?>
			</div>