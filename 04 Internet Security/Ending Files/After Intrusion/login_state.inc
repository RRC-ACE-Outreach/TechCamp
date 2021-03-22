<?php if (isset($_SESSION['username'])): ?>
	<p class="log-button">Logged in as: <?= $_SESSION['username'] ?></p>
	<p class="log-button"><a href="logout.php">Click Here to Log Out</a></p>
<?php endif ?>