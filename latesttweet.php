<?php
/*
Plugin Name: Latest Tweet Widget
Description: Adds a sidebar widget to show the latest tweet from a twitter account
Author: Dsyko
Version: 1.0
Author URI: https://github.com/Dsyko
*/

// Put functions into one big function we'll call at the plugins_loaded
// action. This ensures that all required plugin functions are defined.
function widget_latesttweet_init() {

	// Check for the required plugin functions. This will prevent fatal
	// errors occurring when you deactivate the dynamic-sidebar plugin.
	if ( !function_exists('register_sidebar_widget') )
		return;

	// This is the function that outputs our twitter widget
	function widget_latesttweet($args) {
		
		// $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
		extract($args);

		// Each widget can store its own options. We keep strings here.
		$options = get_option('widget_latesttweet');
		$username = $options['username'];

		// These lines generate our output. Widgets can be very complex
		// but as you can see here, they can also be very, very simple.
		//echo $before_widget . $before_title . $title . $after_title;
		//echo 'Derp! ' . $username; 
		if(empty($username))
			$username = "PortFwdPodcast";
		?>
		<div class="twitter row span3"> 
			<a href="http://twitter.com/#!/<?php echo $username; ?>" title="Follow us on Twitter!" target="_blank"><strong>@<?php echo $username; ?>:</strong></a>
				 <br />
				<div id="tweet" class="tweet">"Latest Tweet"</div> <br />
				<div id="tweettime" class="right tweettime">when</div>
				<script>
				/*
				$.getJSON("'. $this->Html->url(array("controller" => "posts", "action" => "tweet")) .'", function(data) {
						//console.log(data);
						$("#tweet").html(data[0].text);
						$("#tweettime").html(jQuery.timeago(data[0].created_at));
						});
				*/
				</script>
						
				</div>
				<span class="sprite twitterbird">
				</span>
				<br />
				<br />
		<?php
		//echo $after_widget;
	}

	// This is the function that outputs the form to let the users edit
	// the widget's title. It's an optional feature that users cry for.
	function widget_latesttweet_control() {

		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_latesttweet');
		if ( !is_array($options) )
			$options = array('username'=>'PortFwdPodcast');
		if ( $_POST['latesttweet-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['username'] = strip_tags(stripslashes($_POST['latesttweet-username']));
			update_option('widget_latesttweet', $options);
		}

		// Be sure you format your options to be valid HTML attributes.
		$username = htmlspecialchars($options['username'], ENT_QUOTES);
		
		// Here is our little form segment. Notice that we don't need a
		// complete form. This will be embedded into the existing form.
		echo '<p style="text-align:left;"><label for="latesttweet-username">' . __('Twitter Username:') . ' <input style="width: 200px;" id="latesttweet-username" name="latesttweet-username" type="text" value="'.$username.'" /></label></p>';
		echo '<input type="hidden" id="latesttweet-submit" name="latesttweet-submit" value="1" />';
	}
	
	// This registers our widget so it appears with the other available
	// widgets and can be dragged and dropped into any active sidebars.
	register_sidebar_widget(array('Latest Tweet', 'widgets'), 'widget_latesttweet');

	// This registers our optional widget control form. Because of this
	// our widget will have a button that reveals a 300x100 pixel form.
	register_widget_control(array('Latest Tweet', 'widgets'), 'widget_latesttweet_control', 250, 100);
}

// Run our code later in case this loads prior to any required plugins.
add_action('widgets_init', 'widget_latesttweet_init');

?>