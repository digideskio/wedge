<?php


class Boldgrid_Framework_Customizer_Effects {

	/**
	 * The BoldGrid Theme Framework configurations.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string     $configs       The BoldGrid Theme Framework configurations.
	 */
	protected $configs;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since     1.0.0
	 * @param     string $configs       The BoldGrid Theme Framework configurations.
	 */
	public function __construct( $configs ) {
		$this->configs = $configs;
	}


	public function enable_configs( $configs ) {
		$slim_scroll = get_theme_mod( 'boldgrid_slim_scroll', $configs['scripts']['options']['nicescroll']['enabled'] );
		$configs['scripts']['options']['nicescroll']['enabled'] = (bool) $slim_scroll;
		return $configs;
	}

	public function add_controls( $wp_customize ) {

		$config = $this->configs['customizer-options']['effects_panel'];
		if ( true === $config ) {

			$wp_customize->add_section(
				'boldgrid_effects',
				array(
					'title' => __( 'Page Effects', 'bgtfw' ),
					'panel' => 'boldgrid_other',
				)
			);

			Kirki::add_field( 'boldgrid_slim_scroll', array(
					'type'        => 'switch',
					'settings'    => 'boldgrid_slim_scroll',
					'label'       => __( 'Slim Scroll Bars', 'bgtfw' ),
					'section'     => 'boldgrid_effects',
					'default'     => get_theme_mod( 'boldgrid_slim_scroll', (int) $this->configs['scripts']['options']['nicescroll']['enabled'] ),
					'priority'    => 10,
					'choices'     => array(
						'on'  => esc_attr__( 'Enable', 'my_textdomain' ),
						'off' => esc_attr__( 'Disable', 'my_textdomain' ),
					),
			) );
		}

	}
}
