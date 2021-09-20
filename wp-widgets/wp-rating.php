<?php


class rating extends WP_Widget
{
	function __construct()
	{
		parent::__construct("rating_cus", "rating", array('description' => "Hostinger Widget Tutorial"));
	}

	public function widget($args, $instance)
	{
		$rating_star = 5;
		$rating = isset($instance['rating']) ? $instance['rating'] : "";

		$rating = $rating + 0;
		if (is_float($rating)) {
			$rating = $rating - 1;
			$rating_star--;
		} else {
			$rating = $rating - 1;
		}

		echo $args['before_widget'];
		echo $args['rating_before'];
		for ($i = 0; $i < $rating_star; $i++) {

			if ($i <= $rating) {
				echo '<span class="rating"><i class="fas fa-star"></i></span>';
				if ($i . '.5' == $rating) {
					echo '<span class="rating"><i class="fas fa-star-half-alt"></i></span>';
				}
			} else {
				echo '<span class="rating"><i class="far fa-star"></i></span>';
			}
		}
		echo $args['rating_after'];


		echo $args['after_widget'];
	}
	public function form($instance)
	{
		$rating = isset($instance['rating']) ? $instance['rating'] : "Default Text";
	?>

		<p>
			<label for="<?php echo $this->get_field_id('rating') ?>"> <?php _e('rating')	?> </label>
			<input type="range" step="0.5" min="0" max="5" class="widefat" id="<?php echo $this->get_field_id('rating') ?>" name="<?php echo $this->get_field_name('rating') ?>" value="<?php echo esc_attr($rating) ?>">
		</p>
<?php
	}
	public function update($new_instance, $old_instance)
	{
		$instance = array();

		$instance['rating'] = (!empty($new_instance['rating'])) ? strip_tags($new_instance['rating']) : '';
		return $instance;
	}
}

add_action('widgets_init', function () {
	register_widget('rating');
});


?>