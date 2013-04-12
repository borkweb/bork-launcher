<?php

class Bork_Menu_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'launcher-links',
			'Launcher Links',
			array(
				'description' => 'Launcher link widget',
			)
		);
	}//end __construct

	public function widget( $args, $instance ) {
		extract( $args );

		if ( ! isset( $instance['menu'] ) ) {
			return;
		}//end if

		$title   = isset( $instance['title'] ) ? $instance['title'] : '';
		$type    = isset( $instance['type'] ) ? $instance['type'] : '';
		$menu    = isset( $instance['menu'] ) ? $instance['menu'] : '';
		$title_1 = isset( $instance['title_1'] ) ? $instance['title_1'] : '';
		$col1_1  = isset( $instance['col1_1'] ) ? $instance['col1_1'] : '';
		$col1_2  = isset( $instance['col1_2'] ) ? $instance['col1_2'] : '';
		$col1_3  = isset( $instance['col1_3'] ) ? $instance['col1_3'] : '';
		$type1_1 = isset( $instance['type1_1'] ) ? $instance['type1_1'] : '';
		$type1_2 = isset( $instance['type1_2'] ) ? $instance['type1_2'] : '';
		$type1_3 = isset( $instance['type1_3'] ) ? $instance['type1_3'] : '';
		$title_2 = isset( $instance['title_2'] ) ? $instance['title_2'] : '';
		$col2_1  = isset( $instance['col2_1'] ) ? $instance['col2_1'] : '';
		$col2_2  = isset( $instance['col2_2'] ) ? $instance['col2_2'] : '';
		$col2_3  = isset( $instance['col2_3'] ) ? $instance['col2_3'] : '';
		$type2_1 = isset( $instance['type2_1'] ) ? $instance['type2_1'] : '';
		$type2_2 = isset( $instance['type2_2'] ) ? $instance['type2_2'] : '';
		$type2_3 = isset( $instance['type2_3'] ) ? $instance['type2_3'] : '';

		$this->render_menu( $instance['menu'], $type );

		if ( $title_1 || $title_2 ) {
			?>
			<div class="row-fluid">
				<div class="span6">
					<h4><?php echo $title_1; ?></h4>
					<?php
						$this->render_menu( $col1_1, $type1_1 );
						$this->render_menu( $col1_2, $type1_2 );
						$this->render_menu( $col1_3, $type1_3 );
					?>
				</div>
				<div class="span6">
					<h4><?php echo $title_2; ?></h4>
					<?php
						$this->render_menu( $col2_1, $type2_1 );
						$this->render_menu( $col2_2, $type2_2 );
						$this->render_menu( $col2_3, $type2_3 );
					?>
				</div>
			</div>
			<?php
		}//end if
	}//end widget

	public function render_menu( $menu, $type ) {
		$items = wp_get_nav_menu_items( $menu );

		if ( ! $items ) {
			return;
		}//end if

		foreach ( $items as $item ) {
			?>
			<a href="<?php echo $item->url; ?>" class="menu-item btn btn-<?php echo $type; ?>"><?php echo $item->title; ?></a>
			<?php
		}//end foreach
	}//end render_menu

	public function form( $instance ) {
		$title   = isset( $instance['title'] ) ? $instance['title'] : '';
		$type    = isset( $instance['type'] ) ? $instance['type'] : '';
		$menu    = isset( $instance['menu'] ) ? $instance['menu'] : '';
		$title_1 = isset( $instance['title_1'] ) ? $instance['title_1'] : '';
		$col1_1  = isset( $instance['col1_1'] ) ? $instance['col1_1'] : '';
		$col1_2  = isset( $instance['col1_2'] ) ? $instance['col1_2'] : '';
		$col1_3  = isset( $instance['col1_3'] ) ? $instance['col1_3'] : '';
		$type1_1 = isset( $instance['type1_1'] ) ? $instance['type1_1'] : '';
		$type1_2 = isset( $instance['type1_2'] ) ? $instance['type1_2'] : '';
		$type1_3 = isset( $instance['type1_3'] ) ? $instance['type1_3'] : '';
		$title_2 = isset( $instance['title_2'] ) ? $instance['title_2'] : '';
		$col2_1  = isset( $instance['col2_1'] ) ? $instance['col2_1'] : '';
		$col2_2  = isset( $instance['col2_2'] ) ? $instance['col2_2'] : '';
		$col2_3  = isset( $instance['col2_3'] ) ? $instance['col2_3'] : '';
		$type2_1 = isset( $instance['type2_1'] ) ? $instance['type2_1'] : '';
		$type2_2 = isset( $instance['type2_2'] ) ? $instance['type2_2'] : '';
		$type2_3 = isset( $instance['type2_3'] ) ? $instance['type2_3'] : '';

		$menus = wp_get_nav_menus();
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Color:' ); ?></label> 
			<select class="widefat" name="<?php echo $this->get_field_name( 'type' ); ?>" id="<?php echo $this->get_field_id( 'type' ); ?>">
				<option value='' <?php selected( $type, '' ); ?>>Gray</option>
				<option value='inverse' <?php selected( $type, 'inverse' ); ?>>Black</option>
				<option value='primary' <?php selected( $type, 'primary' ); ?>>Blue (dark)</option>
				<option value='info' <?php selected( $type, 'info' ); ?>>Blue (light)</option>
				<option value='success' <?php selected( $type, 'success' ); ?>>Green</option>
				<option value='warning' <?php selected( $type, 'warning' ); ?>>Orange</option>
				<option value='danger' <?php selected( $type, 'danger' ); ?>>Red</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'menu' ); ?>"><?php _e( 'Primary Menu:' ); ?></label> 
			<select class="widefat" name="<?php echo $this->get_field_name( 'menu' ); ?>" id="<?php echo $this->get_field_id( 'menu' ); ?>">
				<option></option>
				<?php
				foreach ( $menus as $data ) {
					?>
					<option value='<?php echo $data->slug; ?>' <?php selected( $menu, $data->slug ); ?>><?php echo $data->name; ?></option>
					<?php
				}//end foreach
				?>
			</select>
		</p>
		<?php
		for ( $col = 1; $col <= 2; $col++ ) {
			$which_col_title = "title_{$col}";
			?>
			<div class="admin-column">
			<p>
				<label for="<?php echo $this->get_field_id( "title_{$col}" ); ?>"><?php _e( "Column {$col} Title:" ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( "title_{$col}" ); ?>" name="<?php echo $this->get_field_name( "title_{$col}" ); ?>" type="text" value="<?php echo esc_attr( $$which_col_title ); ?>" />
			</p>
			<?php
			for ( $col_num = 1; $col_num <= 3; $col_num++ ) {
				$which = "col{$col}_{$col_num}";
				$which_col_type = "type{$col}_{$col_num}";
				?>
				<p>
					<label for="<?php echo $this->get_field_id( "col{$col}_{$col_num}" ); ?>"><?php _e( "Column {$col}, menu {$col_num}:" ); ?></label><br>
					<select name="<?php echo $this->get_field_name( "col{$col}_{$col_num}" ); ?>" id="<?php echo $this->get_field_id( "col{$col}_{$col_num}" ); ?>" class="menu-select">
						<option></option>
						<?php
						foreach ( $menus as $data ) {
							?>
							<option value='<?php echo $data->slug; ?>' <?php selected( $$which, $data->slug ); ?>><?php echo $data->name; ?></option>
							<?php
						}//end foreach
						?>
					</select>
					<select name="<?php echo $this->get_field_name( "type{$col}_{$col_num}" ); ?>" id="<?php echo $this->get_field_id( "type{$col}_{$col_num}" ); ?>" class="color">
						<option value='' <?php selected( $$which_col_type, '' ); ?>>Gray</option>
						<option value='inverse' <?php selected( $$which_col_type, 'inverse' ); ?>>Black</option>
						<option value='primary' <?php selected( $$which_col_type, 'primary' ); ?>>Blue (dark)</option>
						<option value='info' <?php selected( $$which_col_type, 'info' ); ?>>Blue (light)</option>
						<option value='success' <?php selected( $$which_col_type, 'success' ); ?>>Green</option>
						<option value='warning' <?php selected( $$which_col_type, 'warning' ); ?>>Orange</option>
						<option value='danger' <?php selected( $$which_col_type, 'danger' ); ?>>Red</option>
					</select>
				</p>
				<?php
			}//end for
			?>
			</div>
			<?php
		}//end for
	}//end form

	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']   = isset( $new_instance['title'] ) ? wp_filter_nohtml_kses( $new_instance['title'] ) : '';
		$instance['type']    = isset( $new_instance['type'] ) ? esc_attr( $new_instance['type'] ) : '';
		$instance['menu']    = isset( $new_instance['menu'] ) ? esc_attr( $new_instance['menu'] ) : '';
		$instance['title_1'] = isset( $new_instance['title_1'] ) ? esc_attr( $new_instance['title_1'] ) : '';
		$instance['col1_1']  = isset( $new_instance['col1_1'] ) ? esc_attr( $new_instance['col1_1'] ) : '';
		$instance['col1_2']  = isset( $new_instance['col1_2'] ) ? esc_attr( $new_instance['col1_2'] ) : '';
		$instance['col1_3']  = isset( $new_instance['col1_3'] ) ? esc_attr( $new_instance['col1_3'] ) : '';
		$instance['type1_1'] = isset( $new_instance['type1_1'] ) ? esc_attr( $new_instance['type1_1'] ) : '';
		$instance['type1_2'] = isset( $new_instance['type1_2'] ) ? esc_attr( $new_instance['type1_2'] ) : '';
		$instance['type1_3'] = isset( $new_instance['type1_3'] ) ? esc_attr( $new_instance['type1_3'] ) : '';
		$instance['title_2'] = isset( $new_instance['title_2'] ) ? esc_attr( $new_instance['title_2'] ) : '';
		$instance['col2_1']  = isset( $new_instance['col2_1'] ) ? esc_attr( $new_instance['col2_1'] ) : '';
		$instance['col2_2']  = isset( $new_instance['col2_2'] ) ? esc_attr( $new_instance['col2_2'] ) : '';
		$instance['col2_3']  = isset( $new_instance['col2_3'] ) ? esc_attr( $new_instance['col2_3'] ) : '';
		$instance['type2_1'] = isset( $new_instance['type2_1'] ) ? esc_attr( $new_instance['type2_1'] ) : '';
		$instance['type2_2'] = isset( $new_instance['type2_2'] ) ? esc_attr( $new_instance['type2_2'] ) : '';
		$instance['type2_3'] = isset( $new_instance['type2_3'] ) ? esc_attr( $new_instance['type2_3'] ) : '';

		return $instance;
	}//end update
}//end class
