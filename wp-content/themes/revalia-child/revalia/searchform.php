<?php
/**
 * The template for displaying search forms in Codepags
 *
 * @package Codepags
 */
?>

<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	<input id="m_search" type="search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" placeholder="Enter Keyword">
	<button id="b_search" type="submit" class="search-submit btn btn-default searchsubmit"><span><i class="fa fa-search"></i></span></button>
</form>
