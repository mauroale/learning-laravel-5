<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">

			<div class="navbar-header">
				
				<a class="navbar-brand" href="">Blog </a>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="/articles"> Articles </a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li>  {!! link_to_action('ArticlesController@show', $latest->title , [$latest->id] ) !!}  </li>
				</ul>
			</div>

	</div>
</nav>