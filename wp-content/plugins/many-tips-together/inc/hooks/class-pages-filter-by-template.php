<?php
/**
 * Page Template filter
 *
 * @package    ManyTipsTogether
 * @subpackage MTT_Hook_Post_Listing
 * 
 * @author  t31os
 * http://wordpress.stackexchange.com/a/12492/12615,
 * but latter saw that t31os has a plugin for this
 * http://wordpress.org/extend/plugins/page-template-filter/
 */

class MTT_Page_Template_Filter
{
    private $templates = array();

    static private $class = null;

    public static function init()
    {
        if ( null === self::$class ) 
            self :: $class = new self;

        return self :: $class;
    }

    public function __construct() 
	{
        if ( !is_admin() || !current_user_can( 'edit_pages') )
            return;
        add_action( 'parse_query', array( $this, 'pt_parse_query' ) );
        add_action( 'restrict_manage_posts', array( $this, 'pt_restrict_manage_posts' ) );
    }

    public function pt_parse_query( $query ) 
	{
        global $pagenow, $post_type;

        if ( 'edit.php' != $pagenow )
            return;

        switch ( $post_type ) 
		{
            case 'post':

                break;
            case 'page':
                $this->templates = get_page_templates();

                if (empty( $this->templates ) )
                    return;

                if (!$this->is_set_template() )
                    return;

                $meta_group = array( 
					'key'   => '_wp_page_template',
                    'value' => $this->get_template() 
				);
                set_query_var( 'meta_query', array( $meta_group ) );
                break;
        }
    }

    public function pt_restrict_manage_posts() 
	{
        if ( empty( $this->templates ) )
            return;

        $this->template_dropdown();
    }

    private function get_template() 
	{
        if ( $this->is_set_template() )
            foreach ( $this->templates as $template ) 
			{
                if ( $template != $_GET['page_template'] )
                    continue;
                return $template;
            }
        return '';
    }

    private function is_set_template() 
	{
        return (bool)
			( 
				isset( $_GET['page_template'] ) 
				&& ( in_array( $_GET['page_template'], $this->templates ) )
			);
    }

    private function template_dropdown() 
	{
        ?>
    <select name="page_template" id="page_template">
        <option value=""> - no template -</option>
        <?php foreach( $this->templates as $name => $file ): ?>
        <option
            value="<?php echo $file; ?>"<?php selected( $this->get_template() == $file ); ?>><?php _e( $name ); ?></option>
        <?php endforeach;?>
    </select>
    <?php
    }

	
}