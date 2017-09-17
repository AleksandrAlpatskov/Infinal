<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#expand-nav" aria-expanded="false">
				<span class="sr-only">toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://infinal.de"><?=LANGUAGE::msg('header')?></a>
		</div>
		<div class="collapse navbar-collapse" id="expand-nav">
			<ul class="nav navbar-nav navbar-left">
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=LANGUAGE::msg('ark'); ?></a>
					<ul class="dropdown-menu">
						<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('detail'); ?></a></li>
						<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('player'); ?></a></li>
						<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('mod'); ?></a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=LANGUAGE::msg('minecraft'); ?></a>
					<ul class="dropdown-menu">
						<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('detail'); ?></a></li>
						<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('player'); ?></a></li>
						<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('mod'); ?></a></li>
					</ul>
				</li>	
				<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('teamspeak'); ?></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('home'); ?></a></li>
				<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('about'); ?></a></li>
				<li class="nav-item"><a href="#" class="nav-link"><?=LANGUAGE::msg('support'); ?></a></li>
			</ul>
		</div>
	</div>
</nav>