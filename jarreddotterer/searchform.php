<div id="search-box">
	<form method="get" id="searchform" action="<?php echo home_url(); ?>/" class="searchForm">
		<p>
			<input type="text" placeholder="Search" value="<?php the_search_query(); ?>" name="s" id="s" class="field" />
			<input type="image" src="//deb4296i83tjn.cloudfront.net/other/search-white.png" title="Search" id="searchsubmit" class="btn" />
		</p>
	</form>
</div>