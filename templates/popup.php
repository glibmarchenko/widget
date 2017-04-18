<?php
	$styleModal = '0';
	if ($this->data->style->modal == 'circle') {
		$styleModal = 'border-radius: 50%;';
	}
?>
	<div class="<?php echo $unique; ?>modal fade show">
		<div class="<?php echo $unique; ?>modal-dialog" role="document">
			<div class="<?php echo $unique; ?>modal-content">
				<div class="<?php echo $unique; ?>modal-header">
					<span class="close" aria-hidden="true">&times;</span>
				</div>
				<div class="<?php echo $unique; ?>modal-body">
					<?php echo $fields; ?>
				</div>
			</div>
		</div>
	</div>
	<style>
	 @import url('<?php echo $importFontUrl; ?>');

		#<?php echo $id; ?> .<?php echo $unique; ?>modal {
			display: none;
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			font-family: <?php echo $fontName; ?>;
			color: <?php echo $textColor; ?>;
			background: rgba(0, 0, 0, 0.5);
			-webkit-transition: opacity 0.15s linear;
    		transition: opacity 0.15s linear;
			z-index: 2050;
		}

		#<?php echo $id; ?> .<?php echo $unique; ?>modal.show {
			display: block;
		}

		#<?php echo $id; ?> .<?php echo $unique; ?>modal.show .<?php echo $unique; ?>modal-dialog {
			-webkit-transform: translate(0, -25%);
			transform: translate(0, -25%);
			-webkit-transition: -webkit-transform 0.3s ease-out;
			transition: -webkit-transform 0.3s ease-out;
			transition: transform 0.3s ease-out;
			transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
		}

		#<?php echo $id; ?> .<?php echo $unique; ?>modal.show .<?php echo $unique; ?>modal-dialog {
			margin: auto;
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			width: 300px;
			height: 300px;
			background: url('<?php echo $modalBg; ?>') center no-repeat;
			-webkit-background-size: cover;
			background-size: cover;
			transform: translate(0, 0);
			<?php echo $styleModal; ?>
		}

		#<?php echo $id; ?> .<?php echo $unique; ?>modal .<?php echo $unique; ?>modal-header span.close {
			position: absolute;
			right: 10px;
			top: 10px;
			color: #eee;
			cursor: pointer;
		}

		#<?php echo $id; ?> .<?php echo $unique; ?>modal.show .<?php echo $unique; ?>modal-body {
			text-align: center;
		}

		#<?php echo $id; ?> .<?php echo $unique; ?>modal.show .<?php echo $unique; ?>modal-body p {
			margin: 0 auto 20px;
			width: 80%;
			text-align: center;
			font-family: <?php echo $fontName; ?>;
			font-size: 14px;
			line-height: 1.2;
			color: <?php echo $textColor; ?>;
		}

		#<?php echo $id; ?> .<?php echo $unique; ?>modal.show .<?php echo $unique; ?>modal-body .title {
			margin-top: 50px;
		}

		#<?php echo $id; ?> .<?php echo $unique; ?>modal.show  .<?php echo $unique; ?>modal-body button {
			padding: 6px 12px;
			font-family: <?php echo $fontName; ?>;
			font-size: 14px;
			line-height: 1.3;
			text-transform: none;
			color: #fff;
			background-color: #0B83FB;
			border: none;
			border-radius: 0;
			box-shadow: none;
		}
	</style>