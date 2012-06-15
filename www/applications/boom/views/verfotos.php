<style type="text/css">
	.gallery{
		position: relative;
		width: 730px;
	}

	.horizontalList{	
		list-style: none;
	}

	.horizontalListItem{
		float: left;
	}

	.borderContainer{
		position: relative;
		width: 190px;
		height: 140px;
		margin: 5px;
		border: 1px solid #000000;
		padding: 4px; 
	}

	.imageContainer{
		position: relative;
		width: 190px;
		height: 140px;
		background-size: cover;
	}
</style>


<script type="text/javascript" src="<?php print path("www/lib/fancybox/jquery.mousewheel-3.0.4.pack.js",true) ?>"></script>
<script type="text/javascript" src="<?php print path("www/lib/fancybox/jquery.fancybox-1.3.4.pack.js",true) ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php print path("www/lib/fancybox/jquery.fancybox-1.3.4.css",true); ?>" media="screen" />

<script type="text/javascript">
	$(document).ready(function() {

		$("a[rel=galeria]").fancybox({
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'titlePosition' 	: 'over',
			'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
						}
		});

	});
</script>

<form action="<?php print get('webURL')._sh.'boom/subirFoto/'.$album ?>" method="post" enctype="multipart/form-data">
	<hr>
Sube una foto: <input type="file" name="foto"><input type="submit" value="subir">
<hr><h3>NOMBRE DEL ÁLBUM: <?php print $fotos[0]['nombre_album'] ?></h3><hr>
</form>
 <table>
	  <tr>
		<td>
		  <div id="gallery">
			<ul id="galleyList" class="horizontalList">
			<?php if($fotos == NULL) print 'No hay fotos en este álbum'; else foreach ($fotos as $foto) { ?>					
					<li class="horizontalListItem">
					    <div class="borderContainer">
					       <a rel="galeria" href="<?php print get('webURL')._sh."www/lib/images/usuarios/albumes/".$foto['id_album']._sh.$foto['nombre_foto'] ?>">
						       <div class="imageContainer" style="background-image: url('<?php print get('webURL')._sh."www/lib/images/usuarios/albumes/".$foto['id_album']._sh.$foto['nombre_foto'] ?>');"></div>
						   </a>
				      </div>
				 	</li>						        							            
			<?php
			}
			?>
			</ul>
		  </div>
	    </td>
	  </tr>
   </table>