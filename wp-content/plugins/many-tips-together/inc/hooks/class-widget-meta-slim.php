<?php
/**
 * Widget Meta Slim
 *
 * @package    ManyTipsTogether
 * @subpackage MTT_Hook_Widgets
 */

class WP_Widget_Meta_Slim extends WP_Widget
{

    function __construct()
    {
        $widget_ops = array( 
                'classname'   => 'widget_meta', 
                'description' => __( "Log in/out, admin and custom link", 'mtt' ) 
                );
        parent::__construct( 'meta', __( 'Meta Slim', 'mtt' ), $widget_ops );
    }


    function widget( $args, $instance )
    {
        extract( $args );
        $title = apply_filters( 
                'widget_title', 
                empty( $instance['title'] ) 
                    ? __( 'Meta Slim', 'mtt' ) 
                    : $instance['title'], 
                $instance, 
                $this->id_base 
                );
        $link1_title = empty( $instance['link1_title'] ) 
                    ? false 
                    : $instance['link1_title'];
        
        $link1_url = empty( $instance['link1_url'] ) 
                    ? false 
                    : $instance['link1_url'];
        $link1 = ''; 
        if ($link1_title) 
        {
            if($link1_url)
                $link1 = '<li><a href="' . $link1_url . '">' . $link1_title . '</a></li>';
            else
                $link1 = '<li>' . $link1_title . '</li>';
        }
        echo $before_widget;
        if( $title )
            echo $before_title . $title . $after_title;
            ?>
            <ul>
                <?php echo $link1; ?>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        <?php
        echo $after_widget;
    }


    function update( $new_instance, $old_instance )
    {
        $instance          = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['link1_title'] = strip_tags( $new_instance['link1_title'] );
        $instance['link1_url'] = strip_tags( $new_instance['link1_url'] );

        return $instance;
    }


    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'link1_title' => '', 'link1_url' => '' ) );
        $title  = strip_tags( $instance['title'] );
        $link1_title  = strip_tags( $instance['link1_title'] );
        $link1_url  = strip_tags( $instance['link1_url'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php _e( 'Widget title:', 'mtt' ); ?>
            </label> 
            <input 
				class="widefat" 
				id="<?php echo $this->get_field_id( 'title' ); ?>" 
				name="<?php echo $this->get_field_name( 'title' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'link1_title' ); ?>">
                <?php _e( 'Title for extra link:', 'mtt' ); ?>
            </label> 
            <input 
				class="widefat" 
				id="<?php echo $this->get_field_id( 'link1_title' ); ?>" 
				name="<?php echo $this->get_field_name( 'link1_title' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $link1_title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'link1_url' ); ?>">
                <?php _e( 'URL for extra link <br><sup>(leave empty and the previous is just a simple text)</sup>:', 'mtt' ); ?>
            </label> 
            <input 
				class="widefat" 
				id="<?php echo $this->get_field_id( 'link1_url' ); ?>" 
				name="<?php echo $this->get_field_name( 'link1_url' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $link1_url ); ?>" />
        </p>
        <?php
    }

}