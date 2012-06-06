<?php 
	if(!defined("_access")) {
		die("Error: You don't have permission to access here..."); 
	}
	
	if(isMobile()) {
		include "mobile/footer.php";
	} else {
?>
			</div>
		</div>

		<footer>
			<p>&copy; <?php print __("All rights reserved"); ?> - Boom! Social Network </p>
		</footer>
	  
		</div>
	</body>
</html>
<?php } ?>